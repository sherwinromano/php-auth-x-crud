<?php include "./php/login.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./styles/output.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/php.png" type="image/x-icon">
</head>
<body>
    <div class="flex min-h-screen justify-center items-center">
        <div class="flex flex-col p-8 rounded-[18px] bg-[#f5f5f5] border border-[#e5e5e5] sm:w-[60%] md:w-[50%] lg:w-[30%]">
            <h1 class="font-bold text-2xl mb-4">Login</h1>
            <form class="flex flex-col gap-2" method="post">
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
                    if ($login_error) {
                        echo "<p class='text-red-500 text-[14px]'>$login_error</p>";
                    }
                ?>
                <button class="bg-black p-2 rounded-md cursor-pointer mt-4 text-white font-medium hover:opacity-90" type="submit">Login</button>
            </form>
            <p class="text-[14px] self-center mt-3">Don't have an account? <a class="underline" href="register.php">Register</a></p>
        </div>
    </div>
</body>
</html>