<?php
    include_once __DIR__ . "/config.php";

    if(!isset($_SESSION['account_id'])) {
        header('location: /login.php');
        exit;
    } 

    $title = "";
    $description = "";
    $due_date = "";

    $title_error = "";
    $description_error = "";
    $due_date_error = "";
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $due_date = trim($_POST['due_date']);

        if(empty($title)) {
            $title_error = "Title is required";
            $error = true;
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
                $stmt = $conn->prepare("INSERT INTO tasks (title, description, date, task_id) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("sssi", $title, $description, $due_date, $_SESSION['account_id']);
                $stmt->execute();
                $stmt->close();
                
                header('location: tasks.php');
                exit;
        }
    }
?>