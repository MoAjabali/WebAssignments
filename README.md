# webAssignments

This repository contains a set of small PHP demonstration scripts used for university web programming assignments. Each file demonstrates a focused concept or common PHP task (dates, strings & arrays, file I/O, and a simple database connection).

**Contents**
- `date_time.php`: Examples of working with dates and times (formatting, creating dates, adding intervals, and computing differences).
- `strings_arrays.php`: String functions and basic array operations (length, reverse, replace, sort, push, map/filter examples).
- `file_handling.php`: Simple file input/output examples — creating/writing `test.txt`, reading its contents, appending, and iterating lines.
- `db_connect.php`: Minimal MySQL connection example using `mysqli_connect`. Demonstrates connecting and closing a connection (credentials are local placeholders).

**Requirements**
- PHP 7.x or 8.x installed locally.
- (Optional) MySQL server if you want to run `db_connect.php` — update credentials before use.

**Usage**
- Open a terminal (PowerShell) and run the built-in PHP web server from the repository root:

	`php -S localhost:8000`

- Then open a browser and navigate to `http://localhost:8000/<filename>.php` (for example `http://localhost:8000/date_time.php`).

- For `db_connect.php`, replace the placeholder credentials with valid values for your MySQL instance before running.

- `file_handling.php` will create a `test.txt` file in the repository directory when executed; check or remove it as needed.

**Notes & Safety**
- Do not commit real database credentials to the repo. Use environment variables or a separate config file for sensitive settings.
- The examples are intentionally minimal and designed for learning; they do not include production-level error handling or security hardening.

If you'd like, I can also:
- Add a short walkthrough for each file with expected output.
- Convert these examples into runnable unit tests or web pages with a simple index.
