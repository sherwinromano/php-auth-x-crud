<?php
    include_once __DIR__ . "/config.php";

    if(!isset($_SESSION['account_id'])) {
        header('location: login.php');
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM tasks WHERE task_id = ?");
    $stmt->bind_param("i", $_SESSION['account_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $tasks = $result->fetch_all(MYSQLI_ASSOC);
    $full_date = date('M j, Y'); 
?>