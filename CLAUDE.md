# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Full dev environment (server + queue + logs + Vite hot reload)
composer dev

# Build frontend assets
npm run build
npm run dev

# Run tests
composer test
# Single test
php artisan test --filter TestName

# Code style
./vendor/bin/pint

# Fresh setup from scratch
composer setup
```

## Architecture

**Single-page portfolio** with one secondary page (`/sobre`). No database models are used in practice — the app is purely presentational.

**Routing** (`routes/web.php`): two route patterns handle locale-prefixed paths (`/` vs `/en`, `/sobre` vs `/en/sobre`) plus a bare `/sobre` fallback that reads locale from session. Locale is set via `App::setLocale()` and stored in session.

**Views structure**:
- `welcome.blade.php` — home page (full HTML document, includes partials)
- `sobre.blade.php` — about page (full HTML document, includes partials)
- `partials/` — navbar, hero, projects, processes, contact, footer, stacks, experiencia

There is **no shared Blade layout** (`layouts/app.blade.php`). Both pages are standalone documents that duplicate `<head>`, background orb markup, cursor HTML, and cursor JavaScript.

**i18n**: All user-facing strings live in `lang/pt/site.php` and `lang/en/site.php`. Use `__('site.key')` for translations. The `app()->getLocale()` call appears directly in a few partials — prefer translation keys instead.

**Frontend build**: Vite + `@tailwindcss/vite`. Entry points are `resources/css/app.css` and `resources/js/app.js`. **However, both pages currently load Tailwind via CDN** (`<script src="https://cdn.tailwindcss.com">`) instead of `@vite(...)` — the compiled asset pipeline is wired up but not connected to the views.

**JavaScript**: All JS is inlined inside Blade `<script>` blocks. `resources/js/app.js` is empty. Logic includes: custom cursor + parallax (`welcome.blade.php`, `sobre.blade.php`), mobile menu + scroll spy + nav marker (`navbar.blade.php`), project modal + Swiper carousel (`projects.blade.php`), and scroll-reveal IntersectionObservers (duplicated in `processes.blade.php`, `contact.blade.php`, `stacks.blade.php`, `experiencia.blade.php`).

**CSS**: Each partial has its own `<style>` block. The `.glass-effect` class is defined in `welcome.blade.php` but consumed by `navbar.blade.php`.

**External CDN dependencies**:
- `cdn.tailwindcss.com` — should use compiled Vite output
- `cdn.jsdelivr.net/npm/swiper@11` — could be an npm package
- Google Fonts (Plus Jakarta Sans, Space Mono, Orbitron) — Orbitron is loaded redundantly via `@import` inside `<style>` blocks in at least four partials

## Known issues to fix before adding new features

- **Tailwind CDN**: Both pages use the CDN script instead of `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
- **Font redundancy**: Orbitron is loaded 4+ times across partials. All Google Fonts should load once in a shared layout.
- **Duplicated scroll-reveal logic**: The same IntersectionObserver pattern is copy-pasted into `processes.blade.php`, `contact.blade.php`, `stacks.blade.php`, and `experiencia.blade.php`.
- **Cursor duplication**: Custom cursor logic exists separately in `welcome.blade.php` and `sobre.blade.php`; `sobre.blade.php` also skips the `prefers-reduced-motion` check.
- **`<div onclick>` on project cards**: Not keyboard-accessible. Should use `<button>` or add `role="button" tabindex="0"`.
- **Mobile menu accessibility**: Lacks `aria-modal`, `role="dialog"`, and focus trapping.
- **Inline `style="font-family: 'Orbitron'"` repeated ~20 times**: Should be a Tailwind utility (e.g. `font-orbitron`) configured in `tailwind.config.js`.

## Project constraints

- Do not change the visual identity (dark theme, purple/indigo palette, Orbitron font).
- Do not alter the routing structure.
- Do not break responsiveness or animations.
- Ask before making visual or layout changes.
- The `Orbitron` font is intentional for headings; `Plus Jakarta Sans` is the body font.
