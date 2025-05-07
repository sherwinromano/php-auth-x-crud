<div class="flex flex-col gap-4 h-full">
    <?php include "header.php" ?>
    <div class="h-full flex flex-col gap-4">
        <div class="flex w-fit">
            <ul class="flex gap-4 text-2xl font-bold tracking-tight">
                <li>
                    <a href="tasks.php">Task</a>
                </li>
                <li>></li>
                <li>
                    <a href="edit-task.php?id=<?= $id?>">Edit Task</a>
                </li>
            </ul>
        </div>
        <div class="flex w-1/2 h-full flex-col gap-4">
            <form class="flex flex-col gap-2 w-full" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <label class="text-base" for="title">Title</label>
                <input class="input-style" type="text" name="title" id="title" value="<?= $title?>">
                <?php
                    if($error) {
                        echo "<p class='text-red-500 text-[14px]'>$title_error</p>";
                    }   
                ?>
                <label class="text-base" for="description">Description</label>
                <textarea class="input-style resize-none" rows="8" type="text" name="description" id="description"><?= $description?></textarea>
                <?php
                    if($error) {
                        echo "<p class='text-red-500 text-[14px]'>$description_error</p>";
                    }   
                ?>
                <label for="due_date">Due Date</label>
                <input class="input-style p-2 w-1/2" type="date" name="due_date" id="due_date" value="<?= $due_date?>">
                <?php
                    if($error) {
                        echo "<p class='text-red-500 text-[14px]'>$due_date_error</p>";
                    }   
                ?>
                <input class="p-3 bg-green-500 self-end text-[14px] w-[10rem] rounded-md cursor-pointer text-white mt-8" type="submit" value="Update task">
            </form>
        </div>
    </div>
</div>

