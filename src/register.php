<?php include "./php/register.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="./styles/output.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/php.png" type="image/x-icon">
</head>
<body>
    <div class="min-h-screen grid place-items-center">
        <div class="flex flex-col bg-[#f5f5f5] p-8 rounded-[18px] w-[40%] border border-[#e5e5e5]">
            <h1 class="font-bold text-2xl mb-4">Register</h1>
            <form class="flex flex-col gap-2" method="post">
                <div class="flex gap-4">
                    <div class="flex flex-col gap-2 basis-full">
                        <label for="first_name" class="tracking-tight">First Name</label>
                        <input class="input-style w-full" type="text" name="first_name" id="first_name" value="<?= $first_name?>">
                        <?php
                            if($error) {
                                echo "<p class='text-red-500 text-[14px]'>$first_name_error</p>";
                            }
                        ?>
                    </div>
                    <div class="flex flex-col gap-2 basis-full">
                        <label for="last_name">Last Name</label>
                        <input class="input-style w-full" type="text" name="last_name" id="last_name" value="<?= $last_name?>">
                        <?php
                            if($error) {
                                echo "<p class='text-red-500 text-[14px]'>$last_name_error</p>";
                            }
                        ?>
                    </div>
                </div>
                <label for="email">Email</label>
                <input class="input-style" type="email" name="email" id="email" value="<?= $email?>">
                <?php
                    if($error) {
                        echo "<p class='text-red-500 text-[14px]'>$email_error</p>";
                    }
                ?>
                <label for="password">Password</label>
                <input class="input-style" type="password" name="password" id="password">
                <?php
                    if($error) {
                        echo "<p class='text-red-500 text-[14px]'>$password_error</p>";
                    }
                ?>
                <label for="confirm_password">Confirm password</label>
                <input class="input-style" type="password" name="confirm_password" id="confirm_password">
                <?php
                    if($error) {
                        echo "<p class='text-red-500 text-[14px]'>$confirm_password_error</p>";
                    }
                ?>
                <button class="bg-black p-2 rounded-md cursor-pointer mt-4 text-white font-medium hover:opacity-90" type="submit">Register</button>
            </form>
            <p class="text-[14px] self-center mt-3">Already have an account? <a class="underline" href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>