<?php
    require 'config.php';

    if(!isset($_SESSION['account_id'])) {
        header('location: login.php');
        exit;
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $conn->prepare('DELETE FROM tasks WHERE id = ? AND task_id = ?');
        $stmt->bind_param('ii', $id, $_SESSION['account_id']);
        $stmt->execute();
        $stmt->close();

        header('location: ../tasks.php');
        exit;
    }
    

?>