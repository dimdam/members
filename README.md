# Members Suite (2026 Refresh)

Modernized member management and elections system for the Πολιτιστικός & Μορφωτικός Σύλλογος Αγίου Βλασίου Πηλίου.

## What Changed (2026 Refresh)
- Upgraded to Laravel 12 with modern dependency stack
- Full UI/UX refresh (login, navbar, dashboard, datatables, elections, print)
- Membership renewal logic aligned with “previous year” rule
- Elections flow updated (eligibility, scrutineer vs board separation)
- Print ballot layout redesigned
- Build pipeline migrated to Vite

## Requirements
- PHP 8.2+ (tested with 8.4)
- Node 20+
- MySQL/MariaDB

## Setup
1. Install PHP deps:
```
composer install
```

2. Install JS deps:
```
npm install
```

3. Environment:
```
cp .env.example .env
php artisan key:generate
```

4. Database:
```
php artisan migrate
```

5. Build assets:
```
npm run build
```

6. Run:
```
php artisan serve --host 0.0.0.0 --port 8000
```

## Notes
- SMS functionality is deferred for later.
- Active membership is determined by the last renewal year (previous year rule).

## Legacy
If you need the previous version, use the `legacy/old-version` branch.
