<!DOCTYPE html>
<?php header('Content-type: text/html; charset=UTF-8'); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>FreeMyTime - <?php
if (isset($page_title)) {
    echo $page_title;
} else {
    echo 'Ease your life, outsource your tasks';
}
?></title> 
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-2" />
        <meta name="description" content="FreeMyTime - a portal dedicated to outsourcing tasks, tasks, personal projects, post a chore available to individuals or business" />
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/assets/' ?>images/favicon.ico" type="image/x-icon">
            <link rel="stylesheet" href="<?php echo base_url() . 'application/assets/' ?>css/reset.css" type="text/css" media="all">
                <link rel="stylesheet" href="<?php echo base_url() . 'application/assets/' ?>css/layout.css" type="text/css" media="all">
                    <link rel="stylesheet" href="<?php echo base_url() . 'application/assets/' ?>css/style.css" type="text/css" media="all">
                        <?php
                        if (isset($show_map) AND $show_map == TRUE) {
                            echo '<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=true">
    google.setOnLoadCallback(initialize_map);
</script>';
                        }
                        ?>
                        </head>

                        <body


                            <?php
                            if (isset($page_id)) {
                                echo 'id="' . $page_id . '"';
                            }
                            if (isset($show_map) AND $show_map == TRUE) {
                                echo 'onload="initialize_map()"';
                            }
                            ?> >
                            <div class="body1">
                                <div class="body2">
                                    <div class="main">
                                        <!--header -->
                                        <header>
                                            <div class="wrapper">
                                                <h1><a href="<?php echo base_url(); ?>" id="logo" alt="<?php echo base_url(); ?>">FreeMyTime.ro</a><span id="slogan">Ease your life, outsource your tasks</span></h1>
                                                <nav style="float:right">
                                                    <br/>
                                                    <div class="my-account">
                                                        <?php
                                                        if (null) {
                                                            echo '<b>Hi, Razvan</b>' . '&nbsp;.&nbsp;<a href="' . base_url() . 'index.php/my-account">my Account</a>&nbsp;.&nbsp;<a href="' . base_url() . 'index.php/logout">Logout</a>';
                                                        } else {
                                                            echo '<a href="' . base_url() . 'index.php/sign-in">Login</a>&nbsp;.&nbsp;<a href="' . base_url() . 'index.php/sign-up">Register</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                </nav>
                                            </div>
                                            <div class="wrapper">
                                                <nav>
                                                    <ul id="menu">
                                                        <li class="nav1" <?php
                                                        if ($this->uri->segment(1) == 'home') {
                                                            echo 'id="menu_active"';
                                                        }
                                                        ?> ><a href="<?php echo base_url() . 'index.php/home'; ?>">Home </a></li>
                                                        <li class="nav2" <?php
                                                            if ($this->uri->segment(1) == 'browse-tasks') {
                                                                echo ' id="menu_active"';
                                                            }
                                                        ?> ><a href="<?php echo base_url() . 'index.php/browse-tasks'; ?>">Browse tasks </a></li>
                                                        <li class="nav3" <?php
                                                            if ($this->uri->segment(1) == 'add-new-task') {
                                                                echo ' id="menu_active"';
                                                            }
                                                        ?> ><a href="<?php echo base_url() . 'index.php/add-new-task'; ?>">Add new task </a></li>
                                                        <li class="nav4" <?php
                                                            if ($this->uri->segment(1) == 'sign-up') {
                                                                echo ' id="menu_active"';
                                                            }
                                                        ?> ><a href="<?php echo base_url() . 'index.php/sign-up'; ?>">Register </a></li>
                                                        <li class="nav5" <?php
                                                            if ($this->uri->segment(1) == 'about') {
                                                                echo ' id="menu_active"';
                                                            }
                                                        ?> ><a href="<?php echo base_url() . 'index.php/about'; ?>">About us </a></li>
                                                        <li class="nav6" <?php
                                                            if ($this->uri->segment(1) == 'contact') {
                                                                echo ' id="menu_active"';
                                                            }
                                                        ?> ><a href="<?php echo base_url() . 'index.php/contact'; ?>">Contact </a></li>
                                                    </ul>
                                                </nav>
                                                <nav>

                                                    <?php
                                                    if (!isset($show_map) OR $show_map == FALSE) {
                                                        echo '<ul class="boxes">
                                    <li class="nav2"><a href="' . base_url() . 'index.php/add-new-task"><span class="text1">Add new task </span> <span class="text2">Give someone a job</span> </a></li>
                                    <li class="nav3"><a href="#"><span class="text1">Pick a provider </span> <span class="text2">Create win-win relation</span> </a></li>
                                    <li class="nav1"><a href="#"><span class="text1">Ease you life</span> <span class="text2">Have more free time. Enjoy!</span> </a></li>
                                    </ul>';
                                                    }
                                                    ?>

                                                </nav>
                                                <?php
                                                if (isset($show_map) AND $show_map == TRUE) {
                                                    echo '<div id="map_canvas" class="right"></div>';
                                                }
                                                if (isset($show_fb) AND $show_fb == TRUE) {
                                                    echo '<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/FreeMyTime/165170090211530" width="350" height="267" show_faces="true" stream="false" header="false" style="margin-top: 28px" class="right"></fb:like-box>';
                                                }
                                                ?>
                                            </div>
                                        </header>
                                        <!--header end-->