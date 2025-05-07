<div class="flex flex-col gap-4 h-full">
    <?php 
        include "header.php";
    ?>  
    <div class="h-full flex flex-col gap-4">
        <div class="flex w-fit">
            <ul class="flex gap-4 text-2xl font-bold tracking-tight">
                <li>
                    <a href="tasks.php">Task</a>
                </li>
                <li>></li>
                <li>
                    <a href="task.php?id=<?= $id?>"><?= $title?></a>
                </li>
            </ul>
        </div>
        <div class="mt-4 bg-[hsl(0,0%,90%)] rounded-lg p-4 w-1/2 flex flex-col gap-4">
            <div>
                <h1 class="font-bold text-base">Task title</h1>
                <h2 class="text-2xl mt-2"><?= $title?></h2>
            </div>
            <div>
                <h1 class="font-bold text-base">Description</h1>
                <h2 class="text-2xl mt-2"><?= $description?></h2>
            </div>
            <div class="mt-4 self-end flex w-1/2 text-white text-[14px] gap-2">
                <a href="edit-task.php?id=<?= $id?>" class='<?php
                    if($completed === 'true') {
                        echo "hidden";
                    } else {
                        echo "bg-green-500 flex justify-center w-full p-2 cursor-pointer rounded-md hover:opacity-90";
                    }
                ?>'>Edit</a>
                <a href="php/delete.php?id=<?= $id ?>" class="bg-red-500 flex justify-center w-full p-2 cursor-pointer rounded-md hover:opacity-90">Delete</a>
            </div>
        </div>
    </div>
</div>

