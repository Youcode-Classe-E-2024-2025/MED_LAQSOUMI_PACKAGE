<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gdp';

try {
    $conn = @new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
} catch (Exception $e) {
    echo "Database connection error: " . $e->getMessage();
    return null;
}
?>
