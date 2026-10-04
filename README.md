# Taskline

Taskline is a focused task management system built with **CodeIgniter 4**, PHP, and MySQL. It separates today's work from the full schedule and presents both in a clean, responsive interface.

## Pages

- `/` — shows only tasks whose `task_date` is today
- `/tasks` — shows every task, ordered and grouped by date
- `/profile` — shows the single demo user
- `/about` — describes the product and identifies OpenAI Codex as the developer

## Requirements

- PHP 8.2 or newer
- Composer 2
- MySQL 8 or MariaDB
- PHP extensions: `intl`, `mbstring`, `mysqli`, and `json`

## Run locally

1. Install dependencies:

   ```bash
   composer install
   ```

2. Copy `.env.example` to `.env` and replace the `DB_*` values with your MySQL credentials.

3. Create an empty database named `tasks_today_db`, then create and populate its tables:

   ```bash
   php spark migrate
   php spark db:seed TasklineSeeder
   ```

4. Start the development server:

   ```bash
   php spark serve
   ```

5. Visit `http://localhost:8080`.

You may instead import `database/schema.sql` followed by `database/seed.sql`.

## Clever Cloud database

Open phpMyAdmin from the Clever Cloud MySQL add-on, click the database name in the left sidebar, open **Import**, and upload `database/clever-cloud.sql`. Selecting the database first prevents MySQL error `#1046 - No database selected`. The script creates the two tables and inserts eight date-relative tasks plus exactly one demo user.

Copy the Clever Cloud connection values into the corresponding Render environment variables:

| Render variable | Clever Cloud value |
| --- | --- |
| `DB_HOST` | Host |
| `DB_PORT` | Port |
| `DB_NAME` | Database |
| `DB_USER` | User |
| `DB_PASSWORD` | Password |

`DB_PORT` is the MySQL connection port. It is unrelated to the web server port. Do not add a `PORT` variable in Render; Render supplies its web port automatically, and this Docker image listens on Render's default port `10000`.

## Deploy on Render

1. Push this repository to GitHub.
2. In Render, create a **Blueprint** and select the repository. Render detects `render.yaml` and uses the Dockerfile.
3. Enter the five `DB_*` values requested during setup.
4. Deploy the service and confirm the health check at `/` succeeds.

The application image includes Apache, PHP 8.3, the required PHP extensions, and production Composer dependencies. Apache serves only the `public` directory.

## Database design

The schema follows the project specification exactly:

- `tasks`: id, title, status, task date, and creation time
- `users`: id, unique username, full name, email, and creation time

CodeIgniter migrations live in `app/Database/Migrations`, while reusable sample data is in `app/Database/Seeds/TasklineSeeder.php`.

## Test

```bash
composer test
```

The feature tests use an in-memory SQLite database and verify the page routes, today's-date filtering, full task retrieval, profile, and About page. GitHub Actions runs the suite on PHP 8.2 and 8.4.
