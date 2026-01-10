# Mini Bank System

A simple, secure, and modern banking system built with PHP (PDO) and MySQL.

## Features
- **User Authentication**: Secure registration and login.
- **Money Transfer**: Transfer money between users with ACID transaction compliance.
- **Transaction History**: View sent and received transactions.
- **Modern UI**: Clean, single-color minimalist design.

## Setup Instructions

1. **Database Setup**:
   - Create a database named `bank_db`.
   - Import the `database.sql` file into your MySQL database.
   
2. **Configuration**:
   - Open `config.php`.
   - Update the `$host`, `$username`, and `$password` variables to match your database credentials.

3. **Run**:
   - Place the project folder in your local server directory (e.g., htdocs).
   - Access the project via browser (e.g., `http://localhost/bank`).

## Technical Details
- **Backend**: PHP (Procedural style, PDO for database interactions).
- **Database**: MySQL.
- **Security**: 
    - `password_hash` for password storage.
    - Prepared statements to prevent SQL injection.
    - `htmlspecialchars` to prevent XSS.
    - Transactions (`beginTransaction`, `commit`, `rollBack`) for data integrity.
