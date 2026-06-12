import React, { useDeferredValue, useEffect, useMemo, useRef, useState } from 'react';
import { createRoot } from 'react-dom/client';
import MarkdownIt from 'markdown-it';
import {
  AlignLeft,
  Bold,
  Braces,
  CheckSquare,
  Code2,
  Columns2,
  Download,
  Eye,
  FilePlus2,
  FileText,
  FolderOpen,
  Heading1,
  Heading2,
  Heading3,
  Image,
  Italic,
  Link,
  List,
  ListChecks,
  ListOrdered,
  Minus,
  Moon,
  PanelLeftOpen,
  PanelRightOpen,
  Quote,
  Redo2,
  Save,
  ScissorsLineDashed,
  Search,
  Strikethrough,
  Sun,
  Table2,
  Undo2,
  Video
} from 'lucide-react';
import './styles.css';

const starter = '# Welcome to Markiva\n\nOpen a Markdown file, or start writing here.\n\n- Fast editor\n- Live preview\n- Side-by-side and full preview modes\n';

const fallback = {
  NewDocument: async () => ({ name: 'Untitled.md', path: '', content: starter }),
  GetStartupDocument: async () => null,
  OpenMarkdownDialog: async () => ({ name: 'Example.md', path: '', content: starter }),
  OpenMarkdownPath: async (path) => ({ name: path.split(/[\\/]/).pop(), path, content: starter }),
  SaveMarkdown: async (path, content) => ({ name: path.split(/[\\/]/).pop(), path, content }),
  SaveMarkdownAs: async (_path, content) => ({ name: 'Untitled.md', path: '', content })
};

function api() {
  return window.go?.app?.App ?? fallback;
}

const md = new MarkdownIt({
  html: false,
  linkify: true,
  typographer: true,
  breaks: false
});

function escapeAttr(value) {
  return String(value || '')
    .replace(/&/g, '&amp;')
    .replace(/"/g, '&quot;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;');
}

function renderMarkdown(source) {
  const videos = [];
  const prepared = String(source || '').replace(/^::video\[(.*?)\]\((.*?)\)\s*$/gm, (_match, title, url) => {
    const id = `@@MARKIVA_VIDEO_${videos.length}@@`;
    videos.push({
      id,
      html: `<figure class="videoEmbed"><video controls preload="metadata" src="${escapeAttr(url)}"></video><figcaption>${escapeAttr(title || 'Video')}</figcaption></figure>`
    });
    return id;
  });
  let html = md.render(prepared);
  for (const video of videos) {
    html = html.replace(`<p>${video.id}</p>`, video.html);
  }
  return html;
}

function fileName(path, fallbackName = 'Untitled.md') {
  if (!path) return fallbackName;
  return path.split(/[\\/]/).pop() || fallbackName;
}

function fmtCount(content) {
  const words = (content.trim().match(/\S+/g) || []).length;
  const lines = content ? content.split('\n').length : 1;
  return `${words} words / ${lines} lines`;
}

function App() {
  const [doc, setDoc] = useState({ name: 'Untitled.md', path: '', content: starter });
  const [savedContent, setSavedContent] = useState(starter);
  const [mode, setMode] = useState('split');
  const [theme, setTheme] = useState(() => localStorage.getItem('markiva-theme') || 'light');
  const [recent, setRecent] = useState(() => JSON.parse(localStorage.getItem('markiva-recent') || '[]'));
  const [notice, setNotice] = useState('');
  const [query, setQuery] = useState('');
  const [undoStack, setUndoStack] = useState([]);
  const [redoStack, setRedoStack] = useState([]);
  const [editingTitle, setEditingTitle] = useState(false);
  const [titleDraft, setTitleDraft] = useState('');
  const textareaRef = useRef(null);
  const autoSaveTimer = useRef(null);
  const deferredContent = useDeferredValue(doc.content);
  const previewHtml = useMemo(() => renderMarkdown(deferredContent), [deferredContent]);
  const dirty = doc.content !== savedContent;

  useEffect(() => {
    document.documentElement.dataset.theme = theme;
    localStorage.setItem('markiva-theme', theme);
  }, [theme]);

  useEffect(() => {
    api().GetStartupDocument()
      .then((incoming) => {
        if (incoming) {
          loadDoc(incoming);
          return;
        }
        const draft = localStorage.getItem('markiva-draft');
        if (draft) {
          try {
            const parsed = JSON.parse(draft);
            if (parsed?.content) {
              loadDoc({ name: parsed.name || 'Untitled.md', path: '', content: parsed.content }, { notice: 'Restored autosaved draft' });
            }
          } catch {}
        }
      })
      .catch((err) => setNotice(String(err?.message || err)));

    const offOpen = window.runtime?.EventsOn?.('document:opened', (incoming) => loadDoc(incoming));
    const offError = window.runtime?.EventsOn?.('document:error', (message) => setNotice(message));
    return () => {
      if (typeof offOpen === 'function') offOpen();
      if (typeof offError === 'function') offError();
    };
  }, []);

  useEffect(() => {
    const onKey = (event) => {
      if (!event.ctrlKey && !event.metaKey) return;
      const key = event.key.toLowerCase();
      if (key === 's') {
        event.preventDefault();
        save();
      } else if (key === 'z') {
        event.preventDefault();
        undoEdit();
      } else if (key === 'y' || (event.shiftKey && key === 'z')) {
        event.preventDefault();
        redoEdit();
      } else if (key === 'o') {
        event.preventDefault();
        openDialog();
      } else if (key === 'n') {
        event.preventDefault();
        newDocument();
      } else if (key === 'b') {
        event.preventDefault();
        wrapSelection('**', '**', 'bold text');
      } else if (key === 'i') {
        event.preventDefault();
        wrapSelection('_', '_', 'italic text');
      }
    };
    window.addEventListener('keydown', onKey);
    return () => window.removeEventListener('keydown', onKey);
  }, [doc]);

  useEffect(() => {
    if (autoSaveTimer.current) {
      clearTimeout(autoSaveTimer.current);
    }
    if (!dirty && doc.path) return;

    autoSaveTimer.current = setTimeout(async () => {
      if (doc.path) {
        try {
          const incoming = await api().SaveMarkdown(doc.path, doc.content);
          if (incoming?.path === doc.path) {
            setSavedContent(incoming.content);
            setNotice(`Autosaved ${incoming.name}`);
          }
        } catch (err) {
          setNotice(`Autosave failed: ${String(err?.message || err)}`);
        }
        return;
      }

      localStorage.setItem('markiva-draft', JSON.stringify({
        name: doc.name || 'Untitled.md',
        content: doc.content,
        savedAt: new Date().toISOString()
      }));
      setNotice('Draft autosaved locally');
    }, 1400);

    return () => clearTimeout(autoSaveTimer.current);
  }, [doc.content, doc.name, doc.path, dirty]);

  const loadDoc = (incoming, options = {}) => {
    if (!incoming) return;
    const next = {
      name: incoming.name || fileName(incoming.path),
      path: incoming.path || '',
      content: incoming.content || ''
    };
    setDoc(next);
    setSavedContent(next.content);
    setUndoStack([]);
    setRedoStack([]);
    setEditingTitle(false);
    setTitleDraft('');
    setNotice(options.notice ?? (next.path ? `Opened ${next.name}` : ''));
    remember(next.path);
  };

  const remember = (path) => {
    if (!path) return;
    setRecent((items) => {
      const next = [path, ...items.filter((item) => item !== path)].slice(0, 8);
      localStorage.setItem('markiva-recent', JSON.stringify(next));
      return next;
    });
  };

  const newDocument = async () => {
    const incoming = await api().NewDocument();
    localStorage.removeItem('markiva-draft');
    loadDoc(incoming);
    setSavedContent(incoming.content || '');
    setNotice('New document');
  };

  const openDialog = async () => {
    try {
      const incoming = await api().OpenMarkdownDialog();
      if (incoming) loadDoc(incoming);
    } catch (err) {
      setNotice(String(err?.message || err));
    }
  };

  const openRecent = async (path) => {
    try {
      loadDoc(await api().OpenMarkdownPath(path));
    } catch (err) {
      setNotice(String(err?.message || err));
    }
  };

  const save = async () => {
    try {
      const incoming = doc.path
        ? await api().SaveMarkdown(doc.path, doc.content)
        : await api().SaveMarkdownAs(doc.path || doc.name, doc.content);
      if (incoming) {
        loadDoc(incoming);
        localStorage.removeItem('markiva-draft');
        setNotice(`Saved ${incoming.name}`);
      }
    } catch (err) {
      setNotice(String(err?.message || err));
    }
  };

  const saveAs = async () => {
    try {
      const incoming = await api().SaveMarkdownAs(doc.path || doc.name, doc.content);
      if (incoming) {
        loadDoc(incoming);
        localStorage.removeItem('markiva-draft');
        setNotice(`Saved ${incoming.name}`);
      }
    } catch (err) {
      setNotice(String(err?.message || err));
    }
  };

  const setContent = (content, recordHistory = true) => {
    setDoc((current) => {
      if (content === current.content) return current;
      if (recordHistory) {
        setUndoStack((stack) => [...stack.slice(-119), current.content]);
        setRedoStack([]);
      }
      return { ...current, content };
    });
  };

  const undoEdit = () => {
    setUndoStack((stack) => {
      if (stack.length === 0) return stack;
      const previous = stack[stack.length - 1];
      setRedoStack((redo) => [...redo.slice(-119), doc.content]);
      setDoc((current) => ({ ...current, content: previous }));
      requestAnimationFrame(() => textareaRef.current?.focus());
      return stack.slice(0, -1);
    });
  };

  const redoEdit = () => {
    setRedoStack((stack) => {
      if (stack.length === 0) return stack;
      const next = stack[stack.length - 1];
      setUndoStack((undo) => [...undo.slice(-119), doc.content]);
      setDoc((current) => ({ ...current, content: next }));
      requestAnimationFrame(() => textareaRef.current?.focus());
      return stack.slice(0, -1);
    });
  };

  const sanitizeTitle = (value) => {
    const cleaned = String(value || '')
      .replace(/[<>:"/\\|?*\x00-\x1F]/g, '-')
      .replace(/\s+/g, ' ')
      .trim();
    if (!cleaned) return doc.name || 'Untitled.md';
    return /\.(md|markdown|mdown|mkd)$/i.test(cleaned) ? cleaned : `${cleaned}.md`;
  };

  const startTitleEdit = () => {
    setTitleDraft((doc.name || fileName(doc.path)).replace(/\.(md|markdown|mdown|mkd)$/i, ''));
    setEditingTitle(true);
  };

  const commitTitle = () => {
    const nextName = sanitizeTitle(titleDraft);
    setDoc((current) => ({ ...current, name: nextName }));
    setEditingTitle(false);
    setNotice(doc.path ? 'Name updated for the next Save as' : `Renamed to ${nextName}`);
  };

  const wrapSelection = (before, after = before, placeholder = '') => {
    const el = textareaRef.current;
    if (!el) return;
    const start = el.selectionStart;
    const end = el.selectionEnd;
    const selected = doc.content.slice(start, end) || placeholder;
    const next = doc.content.slice(0, start) + before + selected + after + doc.content.slice(end);
    setContent(next);
    requestAnimationFrame(() => {
      el.focus();
      el.setSelectionRange(start + before.length, start + before.length + selected.length);
    });
  };

  const prefixLines = (prefix) => {
    const el = textareaRef.current;
    if (!el) return;
    const start = el.selectionStart;
    const end = el.selectionEnd;
    const lineStart = doc.content.lastIndexOf('\n', Math.max(0, start - 1)) + 1;
    const selected = doc.content.slice(lineStart, end);
    const nextSelected = selected
      .split('\n')
      .map((line) => (line.startsWith(prefix) ? line.slice(prefix.length) : `${prefix}${line}`))
      .join('\n');
    setContent(doc.content.slice(0, lineStart) + nextSelected + doc.content.slice(end));
    requestAnimationFrame(() => el.focus());
  };

  const insertLink = () => wrapSelection('[', '](https://example.com)', 'link text');

  const insertAtCursor = (snippet, selectOffset = 0, selectLength = 0) => {
    const el = textareaRef.current;
    if (!el) return;
    const start = el.selectionStart;
    const end = el.selectionEnd;
    const next = doc.content.slice(0, start) + snippet + doc.content.slice(end);
    setContent(next);
    requestAnimationFrame(() => {
      el.focus();
      const pos = start + selectOffset;
      el.setSelectionRange(pos, pos + selectLength);
    });
  };

  const applyHeading = (level) => {
    if (!level) return;
    prefixLines(`${'#'.repeat(Number(level))} `);
  };

  const insertInlineCode = () => wrapSelection('`', '`', 'code');
  const insertTable = () => insertAtCursor('\n| Column | Column | Column |\n| --- | --- | --- |\n| Value | Value | Value |\n', 3, 6);
  const insertRule = () => insertAtCursor('\n---\n');
  const insertChecklist = () => insertAtCursor('\n- [ ] Task one\n- [ ] Task two\n');
  const insertReference = () => insertAtCursor('\n[ref-name]: https://example.com "Optional title"\n');
  const insertCallout = () => insertAtCursor('\n> **Note:** Write your note here.\n');
  const insertImage = () => {
    const url = window.prompt('Image URL or local path');
    if (!url) return;
    const alt = window.prompt('Alt text', 'Image') || 'Image';
    insertAtCursor(`![${alt}](${url})`);
  };
  const insertVideo = () => {
    const url = window.prompt('Video URL or local path');
    if (!url) return;
    const title = window.prompt('Video title', 'Video') || 'Video';
    insertAtCursor(`\n::video[${title}](${url})\n`);
  };

  const filteredRecent = recent.filter((path) => path.toLowerCase().includes(query.toLowerCase()));

  return (
    <main className="app">
      <aside className="rail">
        <div className="brand">
          <img src="/brand/markiva-logo.svg" alt="" />
          <div>
            <h1>Markiva</h1>
            <span>Editor + preview</span>
          </div>
        </div>

        <div className="sideSection">
          <div className="sectionLabel">File</div>
        <div className="fileActions">
            <button title="New" onClick={newDocument}><FilePlus2 size={17} /><span>New file</span></button>
            <button title="Open" onClick={openDialog}><FolderOpen size={17} /><span>Open file</span></button>
            <button title="Save" onClick={save}><Save size={17} /><span>Save</span></button>
            <button title="Save as" onClick={saveAs}><Download size={17} /><span>Save as</span></button>
          </div>
        </div>

        <div className="sideSection documentCard">
          <div className="sectionLabel">Document</div>
          <strong>{doc.name || fileName(doc.path)}</strong>
          <span>{dirty ? 'Unsaved changes' : 'Saved'}</span>
        </div>

        <div className="sideSection recentSection">
        <div className="recentHead">
          <span>Recent</span>
          <Search size={15} />
        </div>
        <input className="search" value={query} onChange={(e) => setQuery(e.target.value)} placeholder="Filter files" />
        <div className="recentList">
          {filteredRecent.length === 0 && <p>No recent Markdown files yet.</p>}
          {filteredRecent.map((path) => (
            <button key={path} title={path} onClick={() => openRecent(path)}>
              <FileText size={16} />
              <span>{fileName(path)}</span>
            </button>
          ))}
        </div>
        </div>
      </aside>

      <section className="workspace">
        <header className="topbar">
          <div className="docTitle">
            {editingTitle ? (
              <input
                className="titleInput"
                value={titleDraft}
                autoFocus
                onChange={(event) => setTitleDraft(event.target.value)}
                onBlur={commitTitle}
                onKeyDown={(event) => {
                  if (event.key === 'Enter') commitTitle();
                  if (event.key === 'Escape') {
                    setEditingTitle(false);
                    setTitleDraft('');
                  }
                }}
              />
            ) : (
              <button className="titleButton" title="Rename document" onClick={startTitleEdit}>
                {doc.name || fileName(doc.path)}
              </button>
            )}
            <span>{doc.path || 'Not saved yet'}</span>
          </div>
          <div className="topActions">
            <Segmented value={mode} onChange={setMode} />
            <button className="themeToggle" title="Toggle theme" onClick={() => setTheme(theme === 'light' ? 'dark' : 'light')}>
              {theme === 'light' ? <Moon size={18} /> : <Sun size={18} />}
              <span>{theme === 'light' ? 'Dark' : 'Light'}</span>
            </button>
          </div>
        </header>

        <div className="toolbar">
          <div className="toolGroup">
            <select className="headingSelect" title="Heading" value="" onChange={(event) => { applyHeading(event.target.value); event.target.value = ''; }}>
              <option value="">Text</option>
              <option value="1">Heading 1</option>
              <option value="2">Heading 2</option>
              <option value="3">Heading 3</option>
              <option value="4">Heading 4</option>
              <option value="5">Heading 5</option>
              <option value="6">Heading 6</option>
            </select>
            <button title="Heading 1" onClick={() => prefixLines('# ')}><Heading1 size={16} /></button>
            <button title="Heading 2" onClick={() => prefixLines('## ')}><Heading2 size={16} /></button>
            <button title="Heading 3" onClick={() => prefixLines('### ')}><Heading3 size={16} /></button>
          </div>

          <div className="toolGroup">
            <button title="Bold" onClick={() => wrapSelection('**', '**', 'bold text')}><Bold size={16} /></button>
            <button title="Italic" onClick={() => wrapSelection('_', '_', 'italic text')}><Italic size={16} /></button>
            <button title="Strikethrough" onClick={() => wrapSelection('~~', '~~', 'deleted text')}><Strikethrough size={16} /></button>
            <button title="Inline code" onClick={insertInlineCode}><Code2 size={16} /></button>
          </div>

          <div className="toolGroup">
            <button title="Bullet list" onClick={() => prefixLines('- ')}><List size={16} /></button>
            <button title="Numbered list" onClick={() => prefixLines('1. ')}><ListOrdered size={16} /></button>
            <button title="Task item" onClick={() => prefixLines('- [ ] ')}><CheckSquare size={16} /></button>
            <button title="Checklist block" onClick={insertChecklist}><ListChecks size={16} /></button>
          </div>

          <div className="toolGroup">
            <button title="Quote" onClick={() => prefixLines('> ')}><Quote size={16} /></button>
            <button title="Callout" onClick={insertCallout}><Braces size={16} /></button>
            <button title="Code block" onClick={() => wrapSelection('```\n', '\n```', 'code')}><ScissorsLineDashed size={16} /></button>
            <button title="Horizontal rule" onClick={insertRule}><Minus size={16} /></button>
          </div>

          <div className="toolGroup">
            <button title="Link" onClick={insertLink}><Link size={16} /></button>
            <button title="Reference link definition" onClick={insertReference}><FileText size={16} /></button>
            <button title="Image" onClick={insertImage}><Image size={16} /></button>
            <button title="Video" onClick={insertVideo}><Video size={16} /></button>
            <button title="Table" onClick={insertTable}><Table2 size={16} /></button>
          </div>

          <span className="toolbarGap" />
          <div className="toolGroup">
            <button title="Undo" onClick={undoEdit} disabled={undoStack.length === 0}><Undo2 size={16} /></button>
            <button title="Redo" onClick={redoEdit} disabled={redoStack.length === 0}><Redo2 size={16} /></button>
          </div>
        </div>

        <div className={`panes ${mode}`}>
          {mode !== 'preview' && (
            <section className="editorPane" aria-label="Markdown editor">
              <textarea
                ref={textareaRef}
                value={doc.content}
                onChange={(event) => setContent(event.target.value)}
                spellCheck="true"
              />
            </section>
          )}

          {mode !== 'edit' && (
            <section className="previewPane" aria-label="Markdown preview">
              <article className="markdown" dangerouslySetInnerHTML={{ __html: previewHtml }} />
            </section>
          )}
        </div>

        <footer className="statusbar">
          <span>{dirty ? 'Unsaved changes' : 'Saved'}</span>
          <span>{fmtCount(doc.content)}</span>
          {notice && <span className="notice">{notice}</span>}
        </footer>
      </section>
    </main>
  );
}

function Segmented({ value, onChange }) {
  const options = [
    ['edit', AlignLeft, 'Editor'],
    ['split', Columns2, 'Split'],
    ['preview', Eye, 'Preview']
  ];
  return (
    <div className="segmented" role="tablist">
      {options.map(([id, Icon, label]) => (
        <button key={id} className={value === id ? 'active' : ''} title={label} onClick={() => onChange(id)}>
          {id === 'edit' ? <PanelLeftOpen size={17} /> : id === 'preview' ? <PanelRightOpen size={17} /> : <Icon size={17} />}
        </button>
      ))}
    </div>
  );
}

createRoot(document.getElementById('root')).render(<App />);
