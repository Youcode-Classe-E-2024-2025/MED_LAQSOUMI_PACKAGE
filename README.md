
# Package Management System

A web application to manage packages, authors, collaborations, and versions with CRUD functionalities.

## Features
- **Create, Read, Update, and Delete (CRUD)** operations for packages, authors, collaborations, and versions.
- Relational database with foreign key constraints.
- Built using PHP and MySQL.

## Prerequisites
Before setting up the project, ensure you have the following installed:
- PHP (Version 7.4 or later)
- MySQL (or MariaDB)
- XAMPP or WAMP (for local development, optional)
- Composer (optional, if PHP dependencies are added)

## Setup Instructions

### Step 1: Clone the Repository
```bash
git clone https://github.com/your-username/package-management-system.git
cd package-management-system
```

### Step 2: Set Up the Database
1. Open your MySQL client (phpMyAdmin, MySQL Workbench, or CLI).
2. Create a new database named `gestion_packages`:
   ```sql
   CREATE DATABASE gestion_packages;
   ```
3. Import the database schema:
   ```bash
   mysql -u [username] -p gestion_packages < database.sql
   ```
   Replace `[username]` with your MySQL username (default: `root`).

### Step 3: Configure the Database Connection
Open the `database.php` file in the project directory and update the database credentials:
```php
$host = 'localhost';
$dbname = 'gestion_packages';
$username = 'root'; // Default for XAMPP/WAMP
$password = '';     // Default for XAMPP/WAMP
```

### Step 4: Start the Development Server
1. If you're using XAMPP/WAMP, move the project to the `htdocs` or `www` folder.
2. Start the server using:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```

### Step 5: Test the Application
1. Access the application in your browser.
2. Test the CRUD functionalities:
   - Add, edit, and delete packages.
   - Manage authors and collaborations.

## Folder Structure
```
package-management-system/
├── src/
│   ├── Add.php           # Handles create operations
│   ├── Edit.php          # Handles update operations
│   ├── Delete.php        # Handles delete operations
│   └── database.php      # Database connection
├── index.php             # Main entry point
├── database.sql          # Database schema
├── README.md             # Project setup instructions
└── .gitignore            # Git ignored files
```

## Contributions
Feel free to fork this repository and submit pull requests to improve or extend the project.
