<br><br><br>
<section id="content">
    <article class="col1 pad_left1">
        <h2>We can find just the right assistant for you!</h2>
        <p>Let individuals and companies help you complete your tasks. See how simple is:</p>

        <ul class="list1 pad_bot1">
            <li><a href="<?php echo base_url() . 'index.php/add-new-task' ?>">Add your task</a></li>
            <li><a href="<?php echo base_url() . 'index.php/add-new-task' ?>">Select an assistant</a></li>
            <li><a href="<?php echo base_url() . 'index.php/add-new-task' ?>">Get your work done</a></li>
        </ul>
    </article>

    <article class="col2 pad_left2">
        <div class="box1">
            <div class="inner">
                <div class="pad">
                    <div class="wrapper">
                        <figure class="right pad_left1"><img src="<?php echo base_url() . 'application/assets/images/get_paid.png'; ?>" alt="Get paid"></figure>
                        <p class="font1">Get paid</p>
                    </div>
                    <p class="font2 pad_bot2">How can I make some money?</p>	
                    <p class="pad_bot2">Don't you wish to create your own schedule, work from home 
                        and do what do you like to do?
                        FreeMyTime is the right place. There are hundreds of tasks, jobs from entire world where you can start on and get paid even without having to get out from your home.
                        Are you skilled in technical writing, a good programmer, maybe a plumber or a babysitter? Here you can find any type of activity.</p>
                    <?php
                    if (isset($available_task_counter) && $available_task_counter > 0) {
                        echo '
                    <a href="' . base_url() . 'index.php/browse-tasks" class="link1">Show me available tasks</a>
                    </div>
                    <div class = "box2">
                    <a href = "#">Total awaiting tasks: ' . $available_task_counter . '</a>
                        <br>
            </div> ';
                    } else {
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
    </article>
</section>