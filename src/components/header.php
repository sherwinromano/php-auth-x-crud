<?php
    $name = ucfirst($_SESSION['first_name']);
    
    $mydate = getdate(date("U"));
    $current_date = "$mydate[month] $mydate[mday], $mydate[year]";
    
?>

<div class="flex justify-between items-center gap-3 w-full">
    <div class="flex items-center gap-3">
        <span class="text-3xl">👋</span>
        <h1 class="text-2xl font-bold tracking-tighter">Hello, <?= "$name"?></h1>
    </div>
    <h2 class="text-[14px]"><?= $current_date?></h2>
</div>