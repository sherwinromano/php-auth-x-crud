<div class="flex flex-col gap-4 h-full">
    <?php include "header.php" ?>
    <div class="h-full flex flex-col gap-2">
        <h3 class="text-2xl font-bold tracking-tight">Task for today.</h3>
        <div class="grid grid-cols-3 grid-rows-2 h-full gap-2">
        <?php
            if($tasks) {
                $hasTasksForToday = false;
                $today = date('Y-m-d');

                foreach($tasks as $task) {
                    if($task['date'] == $today && $task['completed'] == 'false') {
                        $hasTasksForToday = true;
                        echo "
                        <a href='task.php?id={$task['id']}' class='bg-[hsl(0,0%,90%)] rounded-lg p-4 flex'>
                            <div class='flex flex-col gap-4 h-full w-full'>
                                <h2 class='hidden'>{$task['id']}</h2>
                                <div class='flex flex-col justify-between h-full'>
                                    <div>
                                        <h1 class='font-bold text-[1.3rem]'>{$task['title']}</h1>
                                        <p class='text-base mt-4'>{$task['description']}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class='text-[14px]'>Deadline: Today</p>
                                </div>
                            </div>
                        </a>";
                    }
                }
                
                if(!$hasTasksForToday) {
                    echo "<div class='flex flex-col justify-center items-center w-full'>
                            <p class='text-gray-500 text-lg'>No tasks scheduled for today</p>
                          </div>" . 
                          "
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
            } else {
                echo "<div class='flex flex-col justify-center items-center w-full'>
                            <p class='text-gray-500 text-lg'>No tasks scheduled for today</p>
                          </div>" . 
                          "
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