<?php
    include __DIR__ . "config.php";

    if(!isset($_SESSION['account_id'])) {
        header('location: login.php');
        exit;
    }

    $id = "";
    $title = "";
    $description = "";
    $due_date = "";

    $title_error = "";
    $description_error = "";
    $due_date_error = "";
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!isset($_GET['id'])) {
            header('location: tasks.php');
            exit;
        }

        $id = $_GET['id'];
        $stmt = $conn->prepare('SELECT * FROM tasks WHERE id = ? AND task_id = ?');
        $stmt->bind_param('ii', $id, $_SESSION['account_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $task = $result->fetch_assoc();
        $stmt->close();

        if($task) {
            $title = $task['title'];
            $description = $task['description'];
            $due_date = $task['date'];
        } 
        
    } else {
        $id = $_POST['id'];
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $due_date = $_POST['due_date'];

        if(empty($title)) {
            $error = true;
            $title_error = "Title is required";
        }

        if(empty($description)) {
            $description_error = "Description is required";
            $error = true;
        }

        if(empty($due_date)) {
            $due_date_error = "Due date is required";
            $error = true;
        }

        if(!$error) {
            $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, date = ? WHERE id = ? AND task_id = ?");
            $stmt->bind_param("sssii", $title, $description, $due_date, $id, $_SESSION['account_id']);
            $stmt->execute();
            $stmt->close();
            
            header('location: tasks.php');
            exit;
        }
    }

?>