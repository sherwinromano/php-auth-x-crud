<?php
include "config.php";

if(!isset($_SESSION['account_id'])) {
    header('location: ../login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $task_id = $_POST['id'];
    
    $stmt = $conn->prepare("UPDATE tasks SET completed = 'true' WHERE id = ? AND task_id = ?");
    $stmt->bind_param("ii", $task_id, $_SESSION['account_id']);
    $stmt->execute();
    $stmt->close();
}

header('location: ../tasks.php');
exit;
?>