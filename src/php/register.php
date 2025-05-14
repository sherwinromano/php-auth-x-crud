<?php
    include_once __DIR__ . "/config.php";

    if(isset($_SESSION['account_id'])) {
        header('location: index.php');
        exit;
    }

    // Holds input values
    $first_name = "";
    $last_name = "";
    $email = "";

    $first_name_error = "";
    $last_name_error = "";
    $email_error = "";
    $password_error = "";
    $confirm_password_error = "";
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if(empty($first_name)) {
            $first_name_error = "First name is required";
            $error = true;
        }

        if(empty($last_name)) {
            $last_name_error = "Last name is required";
            $error = true;
        }

        if(empty($email)) {
            $email_error = "Email is required";
            $error = true;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
            $error = true;
        }

        if(empty($password)) {
            $password_error = "Password is required";
            $error = true;
        } else if (strlen($password) < 8) {
            $password_error = "Password must be at least 8 characters";
            $error = true;
        }

        if(empty($confirm_password)) {
            $confirm_password_error = "Password confirmation is required";
            $error = true;
        } else if ($confirm_password !== $password) {
            $confirm_password_error = "Password didn't match";
            $error = true;
        }

        if(!$error) {
            $get_email = $conn->prepare("SELECT email FROM accounts WHERE email = ?");
            $get_email->bind_param('s', $email);
            $get_email->execute();
            $result = $get_email->get_result();

            if($result->num_rows > 0) {
                $email_error = "Email address is already taken.";
                $error = true;
                $get_email->close();
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $created_at = date('Y-m-d H:i:s');

                $stmt = $conn->prepare("INSERT INTO accounts (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)");
                $stmt->bind_param("sssss", $first_name, $last_name, $email, $password, $created_at);

                $stmt->execute();
                $stmt->close();

                header("location: login.php");
                exit;
            }
        }
    }
?>