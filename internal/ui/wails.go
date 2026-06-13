package ui

import (
	"ignore/internal/app"

	"github.com/wailsapp/wails/v2"
	"github.com/wailsapp/wails/v2/pkg/options"
	"github.com/wailsapp/wails/v2/pkg/options/assetserver"
)

func Run(a *app.App) error {
	return wails.Run(&options.App{
		Title:     "Markdown Docs",
		Width:     1180,
		Height:    760,
		MinWidth:  820,
		MinHeight: 560,
		SingleInstanceLock: &options.SingleInstanceLock{
			UniqueId: "Markdown Docs-Markdown-Editor-Viewer-9ad7f2b4",
			OnSecondInstanceLaunch: func(data options.SecondInstanceData) {
				a.OpenFromArgs(data.Args)
			},
		},
		AssetServer: &assetserver.Options{
			Assets: a.Assets(),
		},
		BackgroundColour: &options.RGBA{R: 18, G: 22, B: 28, A: 1},
		OnStartup:        a.Startup,
		OnShutdown:       a.Shutdown,
		Bind: []interface{}{
			a,
		},
	})
}
