# Notes App — Eloquent Relationships Starter (ITE 116)

Laravel 13 · PHP 8.3+ · SQLite · Tailwind CSS 4 + Vite

This lesson is about the **back end**: relationships and faster queries.
The seeder and all the views are ready. A few views have **`STAGE` comments**
marking where you will add a line or two during the code-along.

## What's inside

    database/seeders/DatabaseSeeder.php      2 accounts × 150 notes
    resources/views/components/              layout, alert, input-field, note-card, auth-card
    resources/views/auth/                    login, register
    resources/views/notes/                   index, create, edit, all (new)

## Setup

Start from your Notes app from the Authentication lesson. Unzip this starter
into your Downloads folder, go inside your Notes project, then run ONE of:

    cp -R ~/Downloads/notes-app-relationships-starter/. .                     # Mac
    robocopy %USERPROFILE%\Downloads\notes-app-relationships-starter . /E   # Windows (cmd)

Mac users: do not drag folders in Finder. It replaces folders instead of merging them.

Then rebuild the database with the sample data:

    php artisan migrate:fresh --seed     # WARNING: deletes all existing users and notes
    npm run dev                          # leave running
    php artisan serve                    # second terminal

## Demo accounts

| Name | Email | Password |
|---|---|---|
| Marco Reyes | marco@example.com | password |
| Joy Santos | joy@example.com | password |

Each account has 150 notes.

## Where you'll add front-end code

Search the project for `STAGE` to find every spot.

| File | Comment | Stage |
|---|---|---|
| `components/layout.blade.php` | add the query counter footer | 2 |
| `notes/index.blade.php` | "Showing x–y of z notes" line and page links | 6 |
| `components/layout.blade.php` | "Everyone" nav link | 7 |
| `components/layout.blade.php` | greeting with the note count | 8 |

Everything else you type today is back end: models, controller, routes,
`AppServiceProvider`, and one migration.
