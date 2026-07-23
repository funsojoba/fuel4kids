#!/usr/bin/env bash
# Builds fuel4kids-release.zip — unzip it straight into cPanel's public_html
# and the site works, no manual file moves or index.php edits needed.
#
# First deploy only, do once on the server after unzipping:
#   cp .env.example .env   (then fill in real values)
#   touch database/database.sqlite
#   php artisan key:generate
#   php artisan migrate --force
#   chmod -R 775 storage bootstrap/cache
#   chmod 775 database && chmod 664 database/database.sqlite
#
# Every redeploy after that: just re-run this script and re-upload/unzip.
# .env and the live database are intentionally left out of the zip below,
# so unzipping over the existing site never touches secrets or donor data.

set -euo pipefail
cd "$(dirname "$0")"

echo "==> Installing production dependencies..."
composer install --no-dev --optimize-autoloader

ZIP_NAME="fuel4kids-release.zip"
rm -f "$ZIP_NAME"

echo "==> Zipping release..."
zip -r -q "$ZIP_NAME" . \
    -x ".git/*" \
    -x ".claude/*" \
    -x "node_modules/*" \
    -x ".env" \
    -x "database/*.sqlite" \
    -x "database/*.sqlite-*" \
    -x "storage/logs/*" \
    -x "storage/framework/cache/data/*" \
    -x "storage/framework/sessions/*" \
    -x "storage/framework/views/*" \
    -x "*.DS_Store" \
    -x "$ZIP_NAME"

echo "==> Done: $ZIP_NAME ($(du -h "$ZIP_NAME" | cut -f1))"
echo "    Upload it into public_html via cPanel File Manager and Extract there."

echo "==> Restoring dev dependencies for local work..."
composer install --quiet
