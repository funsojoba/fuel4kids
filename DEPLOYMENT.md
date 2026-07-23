# Fuel4Kids — Namecheap cPanel Deployment Guide

A Laravel 11 site with Stripe donations (one-time + monthly, CAD), volunteer/partnership forms (saved to SQLite + emailed to admin), and all pages from the original site rebuilt with a modern design.

The whole app (code, `vendor/`, everything) deploys as **one zip you extract straight into `public_html`** — no copying `public/` out, no editing `index.php` paths. A root-level `.htaccess` routes every request into the app's `public/` folder internally, so `app/`, `vendor/`, `.env`, etc. sit alongside `public_html`'s other files but are never directly reachable over HTTP — only what `public/` itself contains (images, `index.php`) is servable, and everything else funnels through `index.php`.

## What you need
- Namecheap hosting with cPanel, PHP **8.2 or 8.3** (set in cPanel > *Select PHP Version*)
- The `sqlite3` and `pdo_sqlite` PHP extensions enabled (cPanel > *Select PHP Version* > *Extensions* — check both boxes if unchecked; most Namecheap plans ship with them on already)
- A Stripe account (stripe.com) — CAD supported
- 10–20 minutes

Donation and contact-form volume here is low, so the site uses **SQLite** (a single file in `database/database.sqlite`) instead of a cPanel MySQL database — one less thing to create and manage.

---

## First deploy

### Step 0 — Get the images (do this first, while the old site is still up)
On your computer, from the project folder:

```bash
bash download-images.sh
```

This pulls every photo, logo, team portrait, and the intro video from the current live site into `public/images` and `public/videos`. Do it **before** you replace the old site.

### Step 1 — Build the release zip
On your computer (requires PHP 8.2+ and Composer — https://getcomposer.org):

```bash
./build-release.sh
```

This runs `composer install --no-dev` and produces `fuel4kids-release.zip` — everything needed to run, minus `.env`, the live database, and other dev-only files (so re-running it later for updates never overwrites production secrets or donor data — see "Redeploying" below).

### Step 2 — Upload and extract
1. cPanel > **File Manager**, go into `public_html`. If there's placeholder content in there (default cPanel page, old site files), clear it out first — back it up if unsure.
2. Upload `fuel4kids-release.zip` into `public_html`.
3. Select it > **Extract** (extract into `public_html` itself, not a subfolder).
4. Enable "Show Hidden Files" in File Manager settings and confirm `.htaccess` extracted at the top level of `public_html` (next to `app/`, `public/`, `vendor/`, etc.) — this is the file that makes routing work without any manual `index.php` edits.

### Step 3 — Configure `.env` and the database
`.env` wasn't part of the zip. In `public_html`, copy `.env.example` to `.env` and fill in:

- `APP_URL` — your domain
- Leave `DB_CONNECTION=sqlite` and `DB_DATABASE` unset — it defaults to `database/database.sqlite`
- `MAIL_*` — create a mailbox in cPanel > *Email Accounts* (e.g. `noreply@yourdomain`), use `mail.yourdomain` port 465 SSL
- `ORG_EMAIL` — where volunteer/partnership inquiries go
- Stripe keys (Step 5)

Then, in cPanel **Terminal** (or SSH):

```bash
cd ~/public_html
touch database/database.sqlite
php artisan key:generate
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
chmod -R 775 storage bootstrap/cache
chmod 775 database && chmod 664 database/database.sqlite
```

No Terminal? Generate `APP_KEY` locally with `php artisan key:generate --show` and paste it into `.env`; create an empty `database/database.sqlite` locally, run `php artisan migrate --force` against it, then upload that file into `public_html/database/` via File Manager.

**Back it up.** It's one file, so back it up like one — cPanel's *Backup Wizard* covers it automatically since it lives under your home directory, or add a cron job: `cp ~/public_html/database/database.sqlite ~/backups/database-$(date +\%F).sqlite`.

### Step 4 — Test
Visit `https://yourdomain/up` — you should see the health check pass. Then browse the site.

### Step 5 — Stripe setup
1. In the Stripe Dashboard (**Developers > API keys**), copy the **Publishable** and **Secret** keys into `.env` (`STRIPE_KEY`, `STRIPE_SECRET`). Use `pk_test_`/`sk_test_` keys first to test, then switch to live keys.
2. **Developers > Webhooks > Add endpoint**:
   - URL: `https://yourdomain/stripe/webhook`
   - Events: `checkout.session.completed`
   - Copy the **Signing secret** (`whsec_...`) into `STRIPE_WEBHOOK_SECRET`.
3. Re-run `php artisan config:cache` after editing `.env`.
4. Test with card `4242 4242 4242 4242`, any future date/CVC. Check the `donations` table — status should become `paid`:
   ```bash
   sqlite3 ~/public_html/database/database.sqlite "SELECT id, status, amount FROM donations ORDER BY id DESC LIMIT 5;"
   ```

Monthly donations create a Stripe subscription; donors can be cancelled from the Stripe Dashboard (Customers > Subscriptions). Stripe emails receipts automatically if enabled in **Settings > Emails**.

> Note: donation records live in the `donations` DB table and in your Stripe Dashboard (which is the easiest place to see/refund payments).

### Step 6 — Forms
Volunteer and Partnership submissions are stored in the `contact_submissions` table and emailed to `ORG_EMAIL`. If email fails (bad SMTP settings), the submission is still saved — check `storage/logs/laravel.log`.

---

## Redeploying (code updates after the first deploy)

```bash
./build-release.sh
```

Upload the new `fuel4kids-release.zip` into `public_html` and **Extract** again, overwriting existing files. Since the zip never contains `.env` or `database/*.sqlite*`, your live secrets and donor data are untouched — only code changes.

After extracting, re-run in Terminal (new migrations, cache refresh):

```bash
cd ~/public_html
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

---

## Troubleshooting
- **500 error**: check `storage/logs/laravel.log`; usually a wrong `.env` value or missing `storage` permissions (`chmod -R 775 storage bootstrap/cache`).
- **500 error mentioning `database/database.sqlite`**: the file doesn't exist yet, or `pdo_sqlite` isn't enabled — run `touch database/database.sqlite` and check cPanel > *Select PHP Version* > *Extensions*.
- **"database is locked"**: shouldn't happen — `config/database.php` sets WAL mode + a 5s busy timeout for exactly this. If it does, check that `database/database.sqlite-wal` and `-shm` can be created (same permissions as the main file).
- **404 on every page, or the site shows a raw file listing / PHP source**: the root `.htaccess` didn't make it into `public_html`, or your account's Apache config doesn't allow `AllowOverride` (rare on cPanel). Confirm the hidden `.htaccess` sits next to `app/`, `public/`, `vendor/` at the top of `public_html`. If it's genuinely not permitted, fall back to the old split layout: copy `public/`'s contents into `public_html` and edit `public_html/index.php`'s three `__DIR__.'/../...'` paths to point at wherever you put the rest of the app.
- **Blank styles**: the design uses the Tailwind CDN — no build step needed; check the browser console for blocked scripts.
- **"Class not found"**: the zip was built without running `./build-release.sh` (no `vendor/`), or extraction didn't complete.
- **Stripe redirect fails**: `STRIPE_SECRET` missing/typo, or config cache stale (`php artisan config:cache`).
- **Emails not sending**: verify mailbox credentials, host `mail.yourdomain`, port 465 SSL. Namecheap requires the FROM address to be a real mailbox on your domain.
