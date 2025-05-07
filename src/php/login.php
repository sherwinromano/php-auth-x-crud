<?php
    include "config.php";

    if(isset($_SESSION['account_id'])) {
        header('location: index.php');
        exit;
    }

    $email = "";
    
    $email_error = "";
    $password_error = "";
    $login_error = "";
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)) {
            $email_error = "Please input email.";
            $error = true;
        }

        if(empty($password)) {
            $password_error = "Please input password.";
            $error = true;
        }

        if(!$error) {
            $stmt = $conn->prepare("SELECT account_id, first_name, last_name, password FROM accounts WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();

            $stmt->bind_result($account_id, $first_name, $last_name, $db_password);

            if($stmt->fetch()) {
                if(password_verify($password, $db_password)) {
                    $_SESSION['account_id'] = $account_id;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;

                    header('location: index.php');
                    exit;
                } else {
                    $login_error = "Invalid email or password.";
                    $error = true;
                }
            }

            $stmt->close();
        }
    }
?>