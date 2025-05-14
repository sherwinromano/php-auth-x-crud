<?php
session_start();

$external_url = getenv('MYSQL_URL');

if ($external_url) {
    $url = parse_url($external_url);
    $servername = $url['host'];
    $username = $url['user'];
    $password = $url['pass'];
    $database = substr($url['path'], 1);
} else {
    $servername = getenv('DB_HOST') ?: 'localhost';
    $username = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'mysql@root';
    $database = getenv('DB_NAME') ?: 'task-management-system';
}

try {
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Database connection failed: " . $e->getMessage());
}
?>