<?php
session_start();

// Initialize connection variables
$external_url = getenv('MYSQL_URL');
$conn = null;

if ($external_url) {
    // Parse Render.com's database URL
    $url = parse_url($external_url);
    if ($url === false) {
        error_log("Failed to parse MYSQL_URL");
        die("Database configuration error");
    }

    // Extract connection details from URL
    $servername = $url['host'];
    $username = $url['user'];
    $password = $url['pass'];
    $database = substr($url['path'], 1);
    
    // Add port if specified
    if (isset($url['port'])) {
        $servername .= ':' . $url['port'];
    }
} else {
    // Local development settings
    $servername = getenv('DB_HOST') ?: 'db';
    $username = getenv('DB_USER') ?: 'taskuser';
    $password = getenv('DB_PASSWORD') ?: 'taskpass';
    $database = getenv('DB_NAME') ?: 'task-management-system';
}

try {
    // Create connection with error handling
    $conn = mysqli_init();
    
    // Set connection timeout
    if (!mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 10)) {
        throw new Exception("Setting MYSQLI_OPT_CONNECT_TIMEOUT failed");
    }

    // Attempt to connect
    if (!mysqli_real_connect($conn, $servername, $username, $password, $database)) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }

    // Set UTF-8 charset
    if (!mysqli_set_charset($conn, 'utf8mb4')) {
        throw new Exception("Error setting charset: " . mysqli_error($conn));
    }

} catch (Exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    die("Database connection failed: Please try again later.");
}
?>