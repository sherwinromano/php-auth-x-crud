<?php
    include "config.php";

    if(!isset($_SESSION['account_id'])) {
        header('location: login.php');
        exit;
    }

    $title = "";
    $description = "";
    $due_date = "";
    $completed = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        

        $stmt = $conn->prepare('SELECT * FROM tasks WHERE id = ? AND task_id = ?');
        $stmt->bind_param('ii', $id, $_SESSION['account_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $task = $result->fetch_assoc();

        if($task) {
            $title = $task['title'];
            $description = $task['description'];
            $due_date = $task['date'];
            $completed = $task['completed'];
        } else {
            header('location: tasks.php');
            exit;
        }
    }

?>