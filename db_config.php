<?php
// Database credentials
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

// Set up the Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options for PDO error handling and fetching
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     // Create the PDO instance
     $pdo = new PDO($dsn, $user, $pass, $options);
     // echo "Connection successful!"; 
} catch (\PDOException $e) {
     // If connection fails, stop the script and show the error
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>