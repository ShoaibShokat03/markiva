package app

import (
	"context"
	"embed"
	"errors"
	"io/fs"
	"os"
	"path/filepath"
	"strings"
	"sync"
	"time"

	"github.com/wailsapp/wails/v2/pkg/runtime"
)

type App struct {
	ctx         context.Context
	assets      fs.FS
	mu          sync.RWMutex
	startupFile string
}

type Document struct {
	Path       string `json:"path"`
	Name       string `json:"name"`
	Content    string `json:"content"`
	ModifiedAt string `json:"modifiedAt"`
	Size       int64  `json:"size"`
}

func New(assets embed.FS) (*App, error) {
	assetRoot, err := resolveAssets(assets)
	if err != nil {
		return nil, err
	}
	return &App{
		assets:      assetRoot,
		startupFile: firstMarkdownArg(os.Args[1:]),
	}, nil
}

func (a *App) Assets() fs.FS {
	return a.assets
}

func (a *App) Startup(ctx context.Context) {
	a.ctx = ctx
}

func (a *App) Shutdown(context.Context) {}

func (a *App) ShowWindow() {
	if a.ctx == nil {
		return
	}
	runtime.WindowShow(a.ctx)
	runtime.WindowUnminimise(a.ctx)
}

func (a *App) OpenFromArgs(args []string) {
	path := firstMarkdownArg(args)
	if path == "" {
		a.ShowWindow()
		return
	}
	doc, err := a.OpenMarkdownPath(path)
	if err != nil {
		a.emit("document:error", err.Error())
		a.ShowWindow()
		return
	}
	a.emit("document:opened", doc)
	a.ShowWindow()
}

func (a *App) GetStartupDocument() (*Document, error) {
	a.mu.Lock()
	path := a.startupFile
	a.startupFile = ""
	a.mu.Unlock()
	if path == "" {
		return nil, nil
	}
	doc, err := a.OpenMarkdownPath(path)
	if err != nil {
		return nil, err
	}
	return &doc, nil
}

func (a *App) NewDocument() Document {
	return Document{
		Name:    "Untitled.md",
		Content: "# Untitled\n\nStart writing Markdown here.\n",
	}
}

func (a *App) OpenMarkdownDialog() (*Document, error) {
	if a.ctx == nil {
		return nil, errors.New("application is not ready")
	}
	path, err := runtime.OpenFileDialog(a.ctx, runtime.OpenDialogOptions{
		Title:   "Open Markdown File",
		Filters: markdownFilters(),
	})
	if err != nil {
		return nil, err
	}
	if strings.TrimSpace(path) == "" {
		return nil, nil
	}
	doc, err := a.OpenMarkdownPath(path)
	if err != nil {
		return nil, err
	}
	return &doc, nil
}

func (a *App) OpenMarkdownPath(path string) (Document, error) {
	cleanPath, err := normalizePath(path)
	if err != nil {
		return Document{}, err
	}
	if !isMarkdownPath(cleanPath) {
		return Document{}, errors.New("please choose a Markdown file (.md, .markdown, .mdown, .mkd)")
	}
	info, err := os.Stat(cleanPath)
	if err != nil {
		return Document{}, err
	}
	if info.IsDir() {
		return Document{}, errors.New("folders cannot be opened as Markdown documents")
	}
	content, err := os.ReadFile(cleanPath)
	if err != nil {
		return Document{}, err
	}
	return Document{
		Path:       cleanPath,
		Name:       filepath.Base(cleanPath),
		Content:    string(content),
		ModifiedAt: info.ModTime().Format(time.RFC3339),
		Size:       info.Size(),
	}, nil
}

func (a *App) SaveMarkdown(path string, content string) (Document, error) {
	cleanPath, err := normalizePath(path)
	if err != nil {
		return Document{}, err
	}
	if !isMarkdownPath(cleanPath) {
		cleanPath += ".md"
	}
	if err := os.MkdirAll(filepath.Dir(cleanPath), 0o755); err != nil {
		return Document{}, err
	}
	if err := os.WriteFile(cleanPath, []byte(content), 0o644); err != nil {
		return Document{}, err
	}
	return a.OpenMarkdownPath(cleanPath)
}

func (a *App) SaveMarkdownAs(defaultPath string, content string) (*Document, error) {
	if a.ctx == nil {
		return nil, errors.New("application is not ready")
	}
	defaultDir := ""
	defaultName := "Untitled.md"
	if strings.TrimSpace(defaultPath) != "" {
		if cleanPath, err := normalizePath(defaultPath); err == nil {
			defaultDir = filepath.Dir(cleanPath)
			defaultName = filepath.Base(cleanPath)
		}
	}
	path, err := runtime.SaveFileDialog(a.ctx, runtime.SaveDialogOptions{
		Title:            "Save Markdown File",
		DefaultDirectory: defaultDir,
		DefaultFilename:  defaultName,
		Filters:          markdownFilters(),
	})
	if err != nil {
		return nil, err
	}
	if strings.TrimSpace(path) == "" {
		return nil, nil
	}
	doc, err := a.SaveMarkdown(path, content)
	if err != nil {
		return nil, err
	}
	return &doc, nil
}

func (a *App) Quit() {
	if a.ctx != nil {
		runtime.Quit(a.ctx)
	}
}

func resolveAssets(assets embed.FS) (fs.FS, error) {
	for _, dir := range []string{"ui/dist", "cmd/ignore/ui/dist"} {
		sub, err := fs.Sub(assets, dir)
		if err != nil {
			continue
		}
		if _, err := fs.Stat(sub, "index.html"); err == nil {
			return sub, nil
		}
	}
	return nil, errors.New("embedded UI assets not found")
}

func firstMarkdownArg(args []string) string {
	for _, arg := range args {
		arg = strings.Trim(strings.TrimSpace(arg), `"`)
		if arg == "" || strings.HasPrefix(arg, "-") || strings.HasPrefix(arg, "/") {
			continue
		}
		if isMarkdownPath(arg) {
			return arg
		}
	}
	return ""
}

func normalizePath(path string) (string, error) {
	path = strings.Trim(strings.TrimSpace(path), `"`)
	if path == "" {
		return "", errors.New("no file path was provided")
	}
	if !filepath.IsAbs(path) {
		abs, err := filepath.Abs(path)
		if err != nil {
			return "", err
		}
		path = abs
	}
	return filepath.Clean(path), nil
}

func isMarkdownPath(path string) bool {
	switch strings.ToLower(filepath.Ext(path)) {
	case ".md", ".markdown", ".mdown", ".mkd":
		return true
	default:
		return false
	}
}

func markdownFilters() []runtime.FileFilter {
	return []runtime.FileFilter{
		{DisplayName: "Markdown Files (*.md;*.markdown;*.mdown;*.mkd)", Pattern: "*.md;*.markdown;*.mdown;*.mkd"},
		{DisplayName: "All Files (*.*)", Pattern: "*.*"},
	}
}

func (a *App) emit(name string, data any) {
	if a.ctx != nil {
		runtime.EventsEmit(a.ctx, name, data)
	}
}
