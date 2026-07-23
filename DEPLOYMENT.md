# Fuel4Kids — Namecheap cPanel Deployment Guide

A Laravel 11 site with Stripe donations (one-time + monthly, CAD), volunteer/partnership forms (saved to MySQL + emailed to admin), and all pages from the original site rebuilt with a modern design.

## What you need
- Namecheap hosting with cPanel, PHP **8.2 or 8.3** (set in cPanel > *Select PHP Version*)
- A MySQL database (cPanel > *MySQL Databases*)
- A Stripe account (stripe.com) — CAD supported
- 10–20 minutes

---

## Step 0 — Get the images (do this first, while the old site is still up)
On your computer (Mac/Linux/Git Bash on Windows), from the project folder:

```bash
bash download-images.sh
```

This pulls every photo, logo, team portrait, and the intro video from the current live site into `public/images` and `public/videos`. Do it **before** you replace the old site.

## Step 1 — Install dependencies (one time)
On your computer (requires PHP 8.2+ and Composer — https://getcomposer.org):

```bash
composer install --no-dev --optimize-autoloader
```

This creates the `vendor/` folder. (Alternative: Namecheap's cPanel **Terminal** usually has PHP + Composer — you can upload without `vendor/` and run the same command server-side from the project folder.)

## Step 2 — Upload to the server
Recommended layout (keeps app code out of the web root):

1. Zip the whole project folder (including `vendor/`).
2. cPanel > **File Manager** > upload the zip to your **home directory** (e.g. `/home/youruser/`), extract, and rename the folder to `fuel4kids` → you get `/home/youruser/fuel4kids`.
3. Copy **the contents of** `fuel4kids/public/` into `public_html/` (including the hidden `.htaccess` — enable "Show Hidden Files" in File Manager settings).
4. Edit `public_html/index.php` and change the three paths to point at the app folder:

```php
if (file_exists($maintenance = __DIR__.'/../fuel4kids/storage/framework/maintenance.php')) {
    require $maintenance;
}
require __DIR__.'/../fuel4kids/vendor/autoload.php';
$app = require_once __DIR__.'/../fuel4kids/bootstrap/app.php';
```

## Step 3 — Configure `.env`
In `/home/youruser/fuel4kids`, copy `.env.example` to `.env` and fill in:

- `APP_URL` — your domain
- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` — from cPanel > *MySQL Databases* (create a DB + user, add user to DB with ALL PRIVILEGES)
- `MAIL_*` — create a mailbox in cPanel > *Email Accounts* (e.g. `noreply@yourdomain`), use `mail.yourdomain` port 465 SSL
- `ORG_EMAIL` — where volunteer/partnership inquiries go
- Stripe keys (Step 5)

Then, in cPanel **Terminal** (or SSH):

```bash
cd ~/fuel4kids
php artisan key:generate
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
chmod -R 775 storage bootstrap/cache
```

No Terminal? Generate `APP_KEY` locally with `php artisan key:generate --show` and paste it into `.env`; run `php artisan migrate --force` locally against the remote DB (enable Remote MySQL) or import a SQL dump via phpMyAdmin.

## Step 4 — Point Laravel at the DB and test
Visit `https://yourdomain/up` — you should see the health check pass. Then browse the site.

## Step 5 — Stripe setup
1. In the Stripe Dashboard (**Developers > API keys**), copy the **Publishable** and **Secret** keys into `.env` (`STRIPE_KEY`, `STRIPE_SECRET`). Use `pk_test_`/`sk_test_` keys first to test, then switch to live keys.
2. **Developers > Webhooks > Add endpoint**:
   - URL: `https://yourdomain/stripe/webhook`
   - Events: `checkout.session.completed`
   - Copy the **Signing secret** (`whsec_...`) into `STRIPE_WEBHOOK_SECRET`.
3. Re-run `php artisan config:cache` after editing `.env`.
4. Test with card `4242 4242 4242 4242`, any future date/CVC. Check the `donations` table (phpMyAdmin) — status should become `paid`.

Monthly donations create a Stripe subscription; donors can be cancelled from the Stripe Dashboard (Customers > Subscriptions). Stripe emails receipts automatically if enabled in **Settings > Emails**.

> Note: donation records live in the `donations` DB table and in your Stripe Dashboard (which is the easiest place to see/refund payments).

## Step 6 — Forms
Volunteer and Partnership submissions are stored in the `contact_submissions` table and emailed to `ORG_EMAIL`. If email fails (bad SMTP settings), the submission is still saved — check `storage/logs/laravel.log`.

## Troubleshooting
- **500 error**: check `storage/logs/laravel.log`; usually a wrong `.env` value or missing `storage` permissions (`chmod -R 775 storage bootstrap/cache`).
- **Blank styles**: the design uses the Tailwind CDN — no build step needed; check the browser console for blocked scripts.
- **"Class not found"**: `composer install` wasn't run, or `index.php` paths (Step 2.4) are wrong.
- **Stripe redirect fails**: `STRIPE_SECRET` missing/typo, or config cache stale (`php artisan config:cache`).
- **Emails not sending**: verify mailbox credentials, host `mail.yourdomain`, port 465 SSL. Namecheap requires the FROM address to be a real mailbox on your domain.
