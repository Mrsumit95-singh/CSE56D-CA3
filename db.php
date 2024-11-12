<?php
// db.php - Database connection and creation script

$servername = "localhost";  // Database host (usually localhost)
$username = "root";         // Database username (usually root for local development)
$password = "";             // Database password (default is empty for local)
$dbname = "ticketing_system"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Database created or already exists
    // Select the database
    mysqli_select_db($conn, $dbname);
} else {
    die("Error creating database: " . $conn->error);
}

// SQL script to create the tickets table if it doesn't exist
$table_sql = "
    CREATE TABLE IF NOT EXISTS tickets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        issue VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        status ENUM('Open', 'In Progress', 'Resolved') DEFAULT 'Open',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
";

// Execute the table creation query
if ($conn->query($table_sql) === TRUE) {
    // Table created or already exists
} else {
    die("Error creating table: " . $conn->error);
}

// Optionally, you can set the character set to avoid issues with special characters.
$conn->set_charset("utf8");
?>
