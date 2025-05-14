<?php
    session_start();

    $servername = getenv('DB_HOST') ?: '127.0.0.1';
    $username   = getenv('DB_USER') ?: 'root';
    $password   = getenv('DB_PASSWORD') ?: 'mysql@root';
    $database   = getenv('DB_NAME') ?: 'task-management-system';
    $port       = getenv('DB_PORT') ?: 3306;

    try {
        $conn = mysqli_connect($servername, $username, $password, $database, $port);

        if (!$conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
    } catch (Exception $e) {
        error_log("Database connection error: " . $e->getMessage());
        http_response_code(500);
        exit("Internal server error");
    }
?>
