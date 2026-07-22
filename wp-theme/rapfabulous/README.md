# rapfabulous — WordPress theme

Classic PHP theme ported from the static site. No build step — Tailwind loads from
its CDN at runtime and the theme's own `style.css` holds the hand-written brand CSS,
same as the static pages did.

## Install

1. Zip this `rapfabulous` folder (the folder itself, not its contents at the top level).
2. In wp-admin: **Appearance → Themes → Add New → Upload Theme**, upload the zip, then **Activate**.
   (Or copy the folder to `wp-content/themes/` over SFTP if you'd rather skip the zip step.)
3. **Settings → Permalinks** → choose **Post name**. Required — the header/footer nav
   links to `/shows/`, `/about/`, etc. as clean paths.
4. No homepage configuration needed. `front-page.php` is used automatically at the
   site root regardless of the Reading setting.

## Create the pages

Create each of these as a regular WordPress **Page**, and assign the matching
**Template** in the Page Attributes panel (right sidebar of the block editor). The
**slug must match exactly** — header.php, footer.php, and the mobile menu link to
these paths directly:

| Page title | Slug | Template |
|---|---|---|
| About | `about` | About |
| Replay Radio | `shows` | Replay Radio |
| Affiliate Demo | `demo` | Affiliate Demo |
| CONVOS Takeover Info | `convos` | CONVOS Takeover Info |
| DJ Mix Weekends | `djmix` | DJ Mix Weekends |

The content on all five is hardcoded in the template file (matching how the static
site worked) — edit the copy by editing the template's PHP/HTML directly, not through
the block editor. The page's own editor content is unused; the page just exists so
WordPress has a slug + template to route through.

Demo, CONVOS, and DJ Mix Weekends automatically get `noindex, nofollow` (handled in
`functions.php`) — they're not meant to show up in search, same as before.

## Adding content that's meant to be edited without touching code

Two custom post types back the parts of the site that grow over time. Both are
hidden from the public REST/front end on purpose — they only exist to feed the page
templates above, not to generate their own URLs.

**Replay Episodes** (wp-admin sidebar → *Replay Episodes*) — feeds the Replay Radio
page, and (by label match) the two embeds on the Affiliate Demo page.
- **Title** — the episode's display name.
- **Episode label** — e.g. `EP 65`. To appear on the Demo page, an episode's label
  must be exactly `EP 55` or `EP 30`.
- **Mixcloud feed path** — from Mixcloud's embed code, the `feed=` parameter,
  url-*decoded* — e.g. `/rapfabulous/ep-65-buckshot-convos-takeover/`.
- **Order** (Page Attributes box) — controls position on the Replay Radio page,
  lowest first.

**CONVOS Videos** (wp-admin sidebar → *CONVOS Videos*) — feeds the homepage CONVOS
section.
- **Title**, **Featured Image** (thumbnail; falls back to the YouTube auto-thumbnail
  if left blank), **YouTube URL** (any share/watch link works).
- **Order** — lowest number becomes the large featured video; up to two more fill
  the row underneath it. Only the first 3 by Order are shown.

If you don't add any posts to either type yet, both pages fall back to the original
launch content that shipped with the theme, so nothing looks broken while you're
setting things up.

## "Stories" (optional blog)

Regular WordPress **Posts** render through `single.php`, a full article layout
(byline, featured image, related-posts grid) ported from the CONVOS article
mockup built earlier in this project. To get the full effect on a post:
- Set a **Featured Image**.
- Set an **Excerpt** — used as the subtitle under the headline.
- Under **Users → Profile**, fill in the author's **Biographical Info** — it
  renders as the author card at the end of the article.

The archive/search fallback (`index.php`) is intentionally plain — a simple grid of
cards. `/stories/` doesn't route anywhere automatically; link to
`get_post_type_archive_link()` / your posts page from wherever you want a "Stories"
entry point.

## What's still hardcoded on purpose

The radio market schedule (city, station, on-air time, stream link) lives in
`inc/template-tags.php` → `rf_markets()`, a plain PHP array — not a post type. It's
short and rarely changes; editing it is a one-file code change, not a wp-admin task.
Same goes for all the surrounding page copy (hero text, About paragraph, DJ Mix
programming rules, etc.) — edit those directly in the relevant template file.

## Assets

Everything the templates reference — brand marks, photos, the compressed hero video,
the affiliate demo mp3, the press kit PDFs — is already bundled under `assets/`, so
the site works immediately after activation without re-uploading anything through
the Media Library.
