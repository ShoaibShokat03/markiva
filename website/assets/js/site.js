(() => {
  const menuToggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.nav');
  const backdrop = document.querySelector('.nav-backdrop');

  function setMenu(open) {
    document.body.classList.toggle('nav-open', open);
    menuToggle?.setAttribute('aria-expanded', String(open));
    menuToggle?.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
  }

  menuToggle?.addEventListener('click', () => {
    setMenu(!document.body.classList.contains('nav-open'));
  });

  backdrop?.addEventListener('click', () => setMenu(false));

  nav?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenu(false));
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setMenu(false);
  });

  const triggers = document.querySelectorAll('[data-upload-trigger]');
  const inputs = document.querySelectorAll('[data-upload-input]');
  const statuses = document.querySelectorAll('[data-upload-status]');

  triggers.forEach((trigger, index) => {
    const input = inputs[index] || inputs[0];
    trigger.addEventListener('click', () => input && input.click());
  });

  inputs.forEach((input) => {
    input.addEventListener('change', async () => {
      const file = input.files && input.files[0];
      if (!file) {
        statuses.forEach((status) => { status.textContent = 'No Markdown file selected.'; });
        return;
      }

      try {
        const content = await file.text();
        localStorage.setItem('markdown-docs-web-editor-file', JSON.stringify({
          name: file.name,
          content,
          loadedAt: new Date().toISOString()
        }));
        statuses.forEach((status) => { status.textContent = `Opening ${file.name} in the online editor...`; });
        window.location.href = '/editor/';
      } catch (error) {
        statuses.forEach((status) => { status.textContent = `Could not read ${file.name}.`; });
      }
    });
  });

  // Blog search: live client-side filter of article cards.
  const blogSearch = document.getElementById('blogSearch');
  if (blogSearch) {
    const cards = Array.from(document.querySelectorAll('.blog-card'));
    const empty = document.querySelector('[data-blog-empty]');
    const countEl = document.querySelector('[data-blog-count]');
    const clearBtn = document.querySelector('[data-blog-clear]');
    const total = Number(blogSearch.dataset.blogTotal) || cards.length;

    const applyFilter = () => {
      const query = blogSearch.value.trim().toLowerCase();
      let visible = 0;
      cards.forEach((card) => {
        const match = !query || (card.dataset.search || '').includes(query);
        card.hidden = !match;
        if (match) visible += 1;
      });
      if (empty) empty.hidden = visible !== 0;
      if (clearBtn) clearBtn.hidden = query.length === 0;
      if (countEl) {
        countEl.hidden = query.length === 0;
        countEl.textContent = query
          ? `${visible} of ${total} guides match "${blogSearch.value.trim()}"`
          : '';
      }
    };

    blogSearch.addEventListener('input', applyFilter);
    blogSearch.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') { blogSearch.value = ''; applyFilter(); }
    });
    clearBtn?.addEventListener('click', () => {
      blogSearch.value = '';
      applyFilter();
      blogSearch.focus();
    });
  }
})();
