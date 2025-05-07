<div class="flex flex-col gap-4 h-full">
    <?php 
        include "header.php";
    ?>  
    <div class="h-full flex flex-col gap-2">
        <div class="flex w-fit">
            <ul class="flex gap-2 text-2xl font-bold tracking-tight">
                <li>
                    <a href="tasks.php">Task</a>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-3 grid-rows-2 h-full gap-2">
            <?php
                if($tasks) {
                    foreach($tasks as $task) {
                        $task_date = date('M j, Y', strtotime($task['date']));
                        $display_date = $task_date == $full_date ? "Today" : $task_date;

                        echo "
                            <a href='task.php?id={$task['id']}' class=
                            '". ($task['completed'] === 'true' ? 'bg-none' : 'bg-[hsl(0,0%,90%)]') . " rounded-lg p-4 flex'
                            >
                                <div class='flex flex-col gap-4 h-full w-full'>
                                    <h2 class='hidden'>{$task['id']}</h2>
                                    <div class='flex flex-col justify-between h-full'>
                                        <div>
                                            <h1 class='font-bold text-[1.3rem]'>{$task['title']}</h1>
                                            <p class='text-base mt-4'>{$task['description']}</p>
                                        </div>
                                        
                                        <div class='flex justify-between items-center'>
                                            <p class='text-[14px]'>Due Date: {$display_date}</p>
                                            <form action='php/update.php' method='POST' class='flex items-center gap-2'>
                                                <input type='hidden' name='id' value='{$task['id']}'>
                                                <button type='submit' 
                                                    class='". ($task['completed'] === 'true' ? 
                                                        'bg-green-500' : 'bg-black') . " rounded-lg p-2 text-white cursor-pointer text-[14px]'>
                                                    ". ($task['completed'] === 'true' ? 
                                                        'Completed' : 'Mark as done') . "
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>                        
                        ";
                        
                    }
                    echo "
                        <a href='new-task.php' class='bg-[hsl(0,0%,90%)] rounded-lg p-2 grid place-items-center'>
                            <div class='flex flex-col items-center gap-4'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-[2.5rem]'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                                </svg>
                                <p>Add new task</p>
                            </div>
                        </a>
                    ";
                } else {
                    echo "
                        <a href='new-task.php' class='bg-[hsl(0,0%,90%)] rounded-lg p-2 grid place-items-center'>
                            <div class='flex flex-col items-center gap-4'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-[2.5rem]'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                                </svg>
                                <p>Add new task</p>
                            </div>
                        </a>
                    ";
                }
            ?>
        </div>
    </div>
</div>

