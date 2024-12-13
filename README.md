<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #444;
            text-align: center;
            margin-bottom: 20px;
        }
        h2, h3 {
            color: #555;
        }
        code {
            background: #eee;
            padding: 2px 4px;
            border-radius: 3px;
            font-family: Consolas, "Courier New", Courier, monospace;
        }
        pre {
            background: #f9f9f9;
            padding: 10px;
            border-left: 5px solid #ccc;
            overflow-x: auto;
        }
        ul {
            margin: 10px 0;
            padding: 0 20px;
            list-style-type: disc;
        }
        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 3px;
            margin-top: 10px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .folder-structure {
            font-family: Consolas, "Courier New", Courier, monospace;
            background: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Package Management System</h1>
        <p>A web application to manage packages, authors, collaborations, and versions with CRUD functionalities.</p>

        <h2>Features</h2>
        <ul>
            <li>Create, Read, Update, and Delete (CRUD) operations for packages, authors, collaborations, and versions.</li>
            <li>Relational database with foreign key constraints.</li>
            <li>Built using PHP and MySQL.</li>
        </ul>

        <h2>Prerequisites</h2>
        <p>Before setting up the project, ensure you have the following installed:</p>
        <ul>
            <li>PHP (Version 7.4 or later)</li>
            <li>MySQL (or MariaDB)</li>
            <li>XAMPP or WAMP (for local development, optional)</li>
            <li>Composer (optional, if PHP dependencies are added)</li>
        </ul>

        <h2>Setup Instructions</h2>
        <h3>Step 1: Clone the Repository</h3>
        <pre>
git clone https://github.com/your-username/package-management-system.git
cd package-management-system
        </pre>

        <h3>Step 2: Set Up the Database</h3>
        <ol>
            <li>Open your MySQL client (phpMyAdmin, MySQL Workbench, or CLI).</li>
            <li>Create a new database named <code>gestion_packages</code>:
                <pre>
CREATE DATABASE gestion_packages;
                </pre>
            </li>
            <li>Import the database schema:
                <pre>
mysql -u [username] -p gestion_packages < database.sql
                </pre>
                Replace <code>[username]</code> with your MySQL username (default: <code>root</code>).
            </li>
        </ol>

        <h3>Step 3: Configure the Database Connection</h3>
        <p>Open the <code>database.php</code> file in the project directory and update the database credentials:</p>
        <pre>
$host = 'localhost';
$dbname = 'gestion_packages';
$username = 'root'; // Default for XAMPP/WAMP
$password = '';     // Default for XAMPP/WAMP
        </pre>

        <h3>Step 4: Start the Development Server</h3>
        <ol>
            <li>If you're using XAMPP/WAMP, move the project to the <code>htdocs</code> or <code>www</code> folder.</li>
            <li>Start the server using:
                <pre>
php -S localhost:8000
                </pre>
            </li>
            <li>Open your browser and navigate to:
                <pre>
http://localhost:8000
                </pre>
            </li>
        </ol>

        <h3>Step 5: Test the Application</h3>
        <ul>
            <li>Access the application in your browser.</li>
            <li>Test the CRUD functionalities:
                <ul>
                    <li>Add, edit, and delete packages.</li>
                    <li>Manage authors and collaborations.</li>
                </ul>
            </li>
        </ul>

        <h2>Folder Structure</h2>
        <div class="folder-structure">
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
        </div>

        <h2>Contributions</h2>
        <p>Feel free to fork this repository and submit pull requests to improve or extend the project.</p>
    </div>
</body>
</html>
