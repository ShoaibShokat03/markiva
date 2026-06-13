(() => {
  const textarea = document.getElementById('markdownInput');
  const preview = document.getElementById('markdownPreview');
  const title = document.getElementById('editorTitle');
  const titleInput = document.getElementById('editorTitleInput');
  const shell = document.querySelector('.web-editor-shell');
  const status = document.querySelector('[data-web-status]');
  const count = document.querySelector('[data-web-count]');
  const modeLabel = document.querySelector('[data-web-mode-label]');
  const openButton = document.querySelector('[data-web-open]');
  const downloadButton = document.querySelector('[data-web-download]');
  const fileInput = document.querySelector('[data-web-file]');
  let filename = 'Untitled.md';
  let saveTimer = null;
  const mobileQuery = window.matchMedia('(max-width: 620px)');

  const starter = '# Untitled\n\nStart writing Markdown here.\n';

  const escapeHtml = (value) => String(value)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');

  const inline = (value) => escapeHtml(value)
    .replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1">')
    .replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" target="_blank" rel="noreferrer">$1</a>')
    .replace(/`([^`]+)`/g, '<code>$1</code>')
    .replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>')
    .replace(/_([^_]+)_/g, '<em>$1</em>')
    .replace(/~~([^~]+)~~/g, '<del>$1</del>');

  const render = (source) => {
    const lines = source.replace(/\r\n/g, '\n').split('\n');
    let html = '';
    let list = null;
    let inCode = false;
    let code = [];

    const closeList = () => {
      if (list) {
        html += `</${list}>`;
        list = null;
      }
    };

    for (const line of lines) {
      if (line.startsWith('```')) {
        if (inCode) {
          html += `<pre><code>${escapeHtml(code.join('\n'))}</code></pre>`;
          code = [];
          inCode = false;
        } else {
          closeList();
          inCode = true;
        }
        continue;
      }
      if (inCode) {
        code.push(line);
        continue;
      }

      const video = line.match(/^::video\[(.*?)\]\((.*?)\)\s*$/);
      if (video) {
        closeList();
        html += `<figure class="videoEmbed"><video controls preload="metadata" src="${escapeHtml(video[2])}"></video><figcaption>${escapeHtml(video[1] || 'Video')}</figcaption></figure>`;
        continue;
      }

      if (/^\|.*\|$/.test(line)) {
        closeList();
        const cells = line.split('|').slice(1, -1).map((cell) => `<td>${inline(cell.trim())}</td>`).join('');
        if (!/^\|\s*:?-+/.test(line)) html += `<table><tbody><tr>${cells}</tr></tbody></table>`;
        continue;
      }

      const heading = line.match(/^(#{1,6})\s+(.+)$/);
      if (heading) {
        closeList();
        html += `<h${heading[1].length}>${inline(heading[2])}</h${heading[1].length}>`;
        continue;
      }

      if (/^\s*[-*]\s+/.test(line) || /^\s*-\s+\[[ x]\]\s+/i.test(line)) {
        if (list !== 'ul') {
          closeList();
          list = 'ul';
          html += '<ul>';
        }
        html += `<li>${inline(line.replace(/^\s*[-*]\s+/, '').replace(/^\[[ x]\]\s+/i, ''))}</li>`;
        continue;
      }

      if (/^\s*\d+\.\s+/.test(line)) {
        if (list !== 'ol') {
          closeList();
          list = 'ol';
          html += '<ol>';
        }
        html += `<li>${inline(line.replace(/^\s*\d+\.\s+/, ''))}</li>`;
        continue;
      }

      closeList();
      if (/^---+$/.test(line.trim())) html += '<hr>';
      else if (/^>\s?/.test(line)) html += `<blockquote>${inline(line.replace(/^>\s?/, ''))}</blockquote>`;
      else if (line.trim()) html += `<p>${inline(line)}</p>`;
    }
    closeList();
    return html;
  };

  const update = () => {
    const value = textarea.value;
    preview.innerHTML = render(value);
    const words = (value.trim().match(/\S+/g) || []).length;
    const lines = value ? value.split('\n').length : 1;
    count.textContent = `${words} words / ${lines} line${lines === 1 ? '' : 's'}`;
    clearTimeout(saveTimer);
    saveTimer = setTimeout(() => {
      localStorage.setItem('markdown-docs-web-editor-draft', JSON.stringify({ name: filename, content: value }));
      status.textContent = 'Draft saved locally';
    }, 500);
  };

  const setFile = (name, content) => {
    filename = /\.(md|markdown|mdown|mkd)$/i.test(name) ? name : `${name || 'Untitled'}.md`;
    title.textContent = filename;
    titleInput.value = filename.replace(/\.(md|markdown|mdown|mkd)$/i, '');
    textarea.value = content || starter;
    status.textContent = `Loaded ${filename}`;
    update();
  };

  const cleanName = (value) => {
    const base = String(value || 'Untitled')
      .replace(/[<>:"/\\|?*\x00-\x1F]/g, '-')
      .replace(/\s+/g, ' ')
      .trim() || 'Untitled';
    return /\.(md|markdown|mdown|mkd)$/i.test(base) ? base : `${base}.md`;
  };

  const startRename = () => {
    title.classList.add('hidden-title');
    titleInput.classList.add('active');
    titleInput.focus();
    titleInput.select();
  };

  const finishRename = () => {
    filename = cleanName(titleInput.value);
    title.textContent = filename;
    titleInput.value = filename.replace(/\.(md|markdown|mdown|mkd)$/i, '');
    title.classList.remove('hidden-title');
    titleInput.classList.remove('active');
    status.textContent = `Renamed to ${filename}`;
    update();
  };

  const setMode = (mode) => {
    if (mobileQuery.matches && (mode === 'split' || mode === 'fullscreen')) {
      mode = 'edit';
    }
    shell.dataset.mode = mode;
    document.querySelectorAll('[data-view-mode]').forEach((button) => {
      button.classList.toggle('active', button.dataset.viewMode === mode);
    });
    const labels = {
      edit: 'Editor only',
      split: 'Split editor and preview',
      preview: 'Preview only',
      fullscreen: 'Fullscreen preview'
    };
    modeLabel.textContent = labels[mode] || labels.split;
    if (mode === 'fullscreen') {
      preview.focus?.();
    } else {
      textarea.focus();
    }
  };

  const wrapSelection = (before, after, fallback = 'text') => {
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selected = textarea.value.slice(start, end) || fallback;
    textarea.setRangeText(`${before}${selected}${after}`, start, end, 'select');
    update();
    textarea.focus();
  };

  const insertText = (text) => {
    textarea.setRangeText(text, textarea.selectionStart, textarea.selectionEnd, 'end');
    update();
    textarea.focus();
  };

  const prefixLines = (prefix) => {
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const lineStart = textarea.value.lastIndexOf('\n', Math.max(0, start - 1)) + 1;
    const selected = textarea.value.slice(lineStart, end);
    const next = selected.split('\n').map((line) => `${prefix}${line}`).join('\n');
    textarea.setRangeText(next, lineStart, end, 'end');
    update();
    textarea.focus();
  };

  document.querySelectorAll('[data-wrap]').forEach((button) => {
    button.addEventListener('click', () => {
      const [before, after] = button.dataset.wrap.split('|');
      wrapSelection(before, after, 'text');
    });
  });
  document.querySelectorAll('[data-prefix]').forEach((button) => button.addEventListener('click', () => prefixLines(button.dataset.prefix)));
  document.querySelectorAll('[data-insert]').forEach((button) => button.addEventListener('click', () => insertText(button.dataset.insert.replaceAll('\\n', '\n'))));
  document.querySelector('[data-md-heading]').addEventListener('change', (event) => {
    if (event.target.value) prefixLines(event.target.value);
    event.target.value = '';
  });
  document.querySelector('[data-link]').addEventListener('click', () => wrapSelection('[', '](https://example.com)', 'link text'));
  document.querySelector('[data-image]').addEventListener('click', () => insertText(`![Image](https://example.com/image.png)`));
  document.querySelector('[data-video]').addEventListener('click', () => insertText(`\n::video[Video](video.mp4)\n`));
  document.querySelector('[data-table]').addEventListener('click', () => insertText(`\n| Column | Column | Column |\n| --- | --- | --- |\n| Value | Value | Value |\n`));

  textarea.addEventListener('input', update);
  title.addEventListener('click', startRename);
  titleInput.addEventListener('blur', finishRename);
  titleInput.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') finishRename();
    if (event.key === 'Escape') {
      titleInput.value = filename.replace(/\.(md|markdown|mdown|mkd)$/i, '');
      title.classList.remove('hidden-title');
      titleInput.classList.remove('active');
    }
  });
  document.querySelectorAll('[data-view-mode]').forEach((button) => {
    button.addEventListener('click', () => setMode(button.dataset.viewMode));
  });
  mobileQuery.addEventListener?.('change', () => {
    if (mobileQuery.matches && (shell.dataset.mode === 'split' || shell.dataset.mode === 'fullscreen')) {
      setMode('edit');
    }
  });
  openButton.addEventListener('click', () => fileInput.click());
  fileInput.addEventListener('change', async () => {
    const file = fileInput.files && fileInput.files[0];
    if (!file) return;
    setFile(file.name, await file.text());
  });
  downloadButton.addEventListener('click', () => {
    const blob = new Blob([textarea.value], { type: 'text/markdown;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = filename;
    link.click();
    URL.revokeObjectURL(url);
  });

  const uploaded = localStorage.getItem('markdown-docs-web-editor-file');
  const draft = localStorage.getItem('markdown-docs-web-editor-draft');
  if (uploaded) {
    localStorage.removeItem('markdown-docs-web-editor-file');
    const parsed = JSON.parse(uploaded);
    setFile(parsed.name, parsed.content);
  } else if (draft) {
    const parsed = JSON.parse(draft);
    setFile(parsed.name, parsed.content);
  } else {
    setFile('Untitled.md', starter);
  }
  setMode(mobileQuery.matches ? 'edit' : 'split');
})();
