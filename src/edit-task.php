<?php include "php/edit-task.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task | <?= $title?></title>
    <link href="./styles/output.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/php.png" type="image/x-icon">
</head>
<body>
    <main class="min-h-screen flex gap-4 p-[14px]">
        <section class="sm:hidden lg:flex bg-[#f5f5f5] basis-[30%] rounded-[14px] border border-[#e5e5e5] flex-col justify-between">
            <?php include "./components/sidebar.php"?>
        </section>
        <section class="bg-[#f5f5f5] basis-full rounded-[14px] p-6 border border-[#e5e5e5]">
            <?php include "./components/edit-task.php"?>
        </section>
    </main>
</body>
</html>