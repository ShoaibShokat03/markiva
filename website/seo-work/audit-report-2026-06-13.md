# Markdown Docs - SEO Audit + Implementation Report (2026-06-13)

Site: https://markdowndocs.online  (migrated from typo domain makrdowndocs.online)
Access tier: T3 (full execution) - local project + live browser bridge.
Server used for verification: local PHP 8.2 dev server. All 19 pages return HTTP 200, zero PHP errors.

## Headline result

Brand-new site, not yet indexed (clean slate). Every change below is now live in the local
project and ready to deploy. No em dash characters used anywhere (verified across all file types).

## 1. CRITICAL: domain migration (done)

The whole site pointed to the misspelled `makrdowndocs.online`, and `.htaccess` even 301-redirected
the correct spelling away to the typo. Since `markdowndocs.online` was registered fresh, all
references were migrated:

- `includes/config.php` - url + domain
- `.htaccess` - reversed redirect (typo + www now 301 to markdowndocs.online); added gzip + cache headers
- `sitemap.xml`, `robots.txt`, `llms.txt`, `llms.text` - all URLs (BOM stripped from xml/txt)
- `index.php` schema - removed typo from alternateName
- BOM-free, valid XML confirmed.

## 2. Meta titles + descriptions (done)

Before: 9 titles >60 chars (truncated in SERP); 2 descriptions >160; 2 descriptions <120.
After: every title <=60, every description in the 126-159 band. Examples:

| Page | Title before | Title after |
|---|---|---|
| Home | 62 | 48 |
| Features | 75 | 55 |
| Blog index | 74 | 53 |
| best-markdown-editor | 66 | 48 |
| how-to-open | 67 | 56 |
| what-is-readme | 64 | 51 |
| what-is-agents | 66 | 53 |
| what-is-claude | 63 | 53 |

Descriptions: home 166->145, features 171->137, editor 115->140, privacy 111->156.

## 3. Content expansion (done)

Thin pages were expanded with semantic keywords (CommonMark, GFM, fenced code blocks, frontmatter,
task lists, table alignment, open-with, autosave, draft recovery) and examples:

| Page | Words before | Words after |
|---|---|---|
| download | 57 | 240 |
| about | 82 | 178 |
| features | 103 | 256 |
| faq | 115 | 228 (5 -> 8 Q&As) |
| what-is-readme-md | 314 | 625 |
| what-is-agents-md | 330 | 563 |
| what-is-claude-md | 307 | 474 |
| what-is-design-md | 294 | 461 |
| common-md (pillar) | 372 | 505 |

Each expanded cluster post now includes a real code example, comparison tables, and best-practice
lists. The AI .md cluster (README/AGENTS/CLAUDE/DESIGN.md) is the site's differentiated moat:
low competition, rising interest.

## 4. New pages (done) - fill the biggest gaps

1. `/blog/markdown-cheat-sheet/` (613 words) - huge evergreen volume; copy-ready syntax tables for
   headings, emphasis, lists, links, code, tables, task lists, GFM. Top-of-funnel that feeds /editor/.
2. `/blog/what-is-llms-txt/` (720 words) - hot, low-competition, perfect AI-docs cluster fit; strong
   AEO/GEO play. Registered in blog-data, sitemap, and llms.txt.

## 5. Schema + technical (done)

- Sitewide Organization + WebSite JSON-LD added to header (every page) for knowledge-graph signals.
- BreadcrumbList schema + visible breadcrumb nav added to all blog posts (template-level).
- Fixed invalid `PrivacyPolicy` schema type -> `WebPage`.
- sitemap.xml: added lastmod dates + the 2 new posts.
- .htaccess: added DEFLATE compression + Expires caching for css/js/svg/png.
- Verified: 0 broken internal links across the site; all JSON-LD valid.

## 6. Internal linking (done)

Already strong via nav/footer (17-30 links/page). Added contextual links: homepage learning hub ->
cheat sheet; pillar (common-md) <-> llms.txt and cluster posts; download/features/about -> blog
cluster. Pillar-cluster interlinking now bidirectional.

## Remaining opportunities (recommended next, not yet done)

P2 (this week):
- Add converter-intent pages routed to /editor/: markdown to PDF, markdown to Word, markdown to HTML.
- New posts: "what is a .md file", "how to make tables in markdown", "AGENTS.md vs CLAUDE.md vs README.md".
- Honest reading-time labels (several posts still show inflated 6-9 min; real values are 3-6 min).

P3 (this month):
- Expand editor page supporting copy (still 109 words around the tool).
- GitHub Flavored Markdown reference page.
- Real OG image (current og:image is an SVG; many platforms prefer PNG/JPG 1200x630).
- After deploy: submit sitemap in Google Search Console + Bing; request indexing.

## Phase 2 addendum - AI agent files cluster (done)

Expanded the differentiated moat into a full topical cluster on AI/agent Markdown files. Added a
pillar hub plus 5 tool-specific detail posts, all interlinked with the existing cluster.

| New page | Words | Topic |
|---|---|---|
| /blog/ai-agent-instruction-files-explained/ | 1010 | Pillar hub: master comparison table + why/purpose/benefits, links to all |
| /blog/what-is-gemini-md/ | 591 | Google Gemini CLI context file, hierarchical loading |
| /blog/what-is-copilot-instructions-md/ | 486 | GitHub Copilot repo + path-specific instructions |
| /blog/what-are-cursor-rules/ | 532 | .cursorrules legacy vs modern .cursor/rules .mdc system |
| /blog/what-are-windsurf-rules/ | 472 | Windsurf Cascade global vs workspace rules |
| /blog/what-is-conventions-md/ | 530 | Aider CONVENTIONS.md, cross-tool coding standards |

All facts sourced from official docs (Gemini CLI, GitHub, Aider) and 2026 references. Registered in
blog-data.php, sitemap.xml, llms.txt. Reverse links added from AGENTS.md, CLAUDE.md, common-md
pillar, and the homepage learning hub. Verified: all titles <=60, descriptions 142-158, no em dash,
all HTTP 200 / 0 PHP errors, 0 broken internal links, full BlogPosting + BreadcrumbList + FAQPage
schema on every post. Blog now has 19 posts total.

The AI agent files cluster is now the strongest, most complete section on the site and the primary
GEO/AEO asset: it answers "what is X.md / what are X rules" for every major AI coding tool.

## Phase 3 addendum - SKILL.md + skipped project files (done)

Completed the cluster by adding the files the common-md table listed but did not link, plus SKILL.md.

| New page | Words | Topic |
|---|---|---|
| /blog/what-is-skill-md/ | 690 | Claude Agent Skills: SKILL.md frontmatter + progressive disclosure |
| /blog/what-is-changelog-md/ | 466 | Keep a Changelog format, version history |
| /blog/what-is-contributing-md/ | 433 | Contributor guide, GitHub community health file |
| /blog/what-is-todo-md/ | 427 | Markdown task lists / backlog |
| /blog/what-is-prompts-md/ | 404 | Reusable AI prompts file |
| /blog/what-is-api-md/ | 413 | Lightweight Markdown API docs vs OpenAPI |

Internal-linking fix: the table on /blog/common-md-files-for-ai-projects/ had 5 unlinked files
(CHANGELOG, TODO, PROMPTS, API, CONTRIBUTING). All are now linked, plus SKILL.md and CONVENTIONS.md
rows were added. Every file in that table now points to a real internal post (verified: 17 links on
the page, 0 broken). SKILL.md and the supporting files were also added to the agent-files pillar hub.

Registered in blog-data.php, sitemap.xml, llms.txt. Verified: all titles <=60, descriptions 146-159,
no em dash, all HTTP 200 / 0 PHP errors, full schema on each. Blog now has 25 posts total, and a
full-site sweep found 0 broken links across 36 unique URLs.

## Phase 4 addendum - SKILL.md how-to + SECURITY.md (done)

- /blog/what-is-security-md/ (community health file, security policy + vuln reporting).
- /blog/how-to-create-a-skill-md-file/ (~1200 words): step-by-step tutorial covering folder
  structure, skill locations (~/.claude/skills vs .claude/skills), naming rules (lowercase
  hyphen-case, 64 chars, folder must match name field), YAML frontmatter (name + description as the
  trigger, allowed-tools), writing the body, supporting files (scripts/references/templates/assets),
  a full working example, naming guidance, description-writing, and common mistakes. Facts sourced
  from Anthropic skill authoring docs + Claude Code skills docs.

Cross-linked from /blog/what-is-skill-md/. Registered in blog-data.php, sitemap.xml, llms.txt.
Verified: title 45, desc 153, no em dash, HTTP 200 / 0 errors, full schema. Blog now has 27 posts;
full-site sweep 0 broken links across 38 URLs.

## Phase 5 addendum - AdSense readiness + CLAUDE.md (done)

Added the pages Google AdSense reviewers expect and a project memory file.

- **/contact/** - new Contact page with the published email (contact@markdowndocs.online, stored in
  config as `contact_email`), ContactPage schema, breadcrumbs.
- **/terms/** - new Terms of Service page (10 sections incl. third-party ads disclosure), breadcrumbs.
- **/privacy/** - rewritten into a full Privacy Policy that discloses cookies, Google Analytics
  (G-NRDJ1ZFD40), and Google AdSense / third-party advertising cookies, with opt-out links
  (Google Ads Settings, aboutads.info, GA opt-out add-on). This is the key AdSense requirement the
  old "files stay local" page did not meet.
- Footer nav now lists About, Contact, Privacy, Terms. Added all to sitemap.xml + llms.txt.
- **CLAUDE.md** added at the website root: architecture, conventions (no em dash, meta limits),
  how to add a blog post, SEO file sync, AdSense pages, and deploy notes, for future agents.

Verified: contact/terms/privacy all 200, titles 32-47, descriptions 145-154, no em dash, schema
present, 0 broken links across 40 URLs sitewide.

### Still needed by the user for AdSense
1. Site must be live on markdowndocs.online (DNS, in progress) with valid HTTPS.
2. After approval, add `ads.txt` at the root: `google.com, pub-XXXX, DIRECT, f08c47fec0942fa0`.
3. For EEA/UK traffic, enable a Google-certified consent management platform (Google offers one in
   the AdSense UI). The privacy policy already references a consent mechanism.

## Deploy checklist

1. Point markdowndocs.online DNS at this hosting (in progress, ~2h).
2. Upload the project (the makrdowndocs.online -> markdowndocs.online 301 in .htaccess handles the old domain).
3. Confirm HTTPS cert covers markdowndocs.online and www.
4. Submit https://markdowndocs.online/sitemap.xml to Search Console; verify llms.txt loads.
