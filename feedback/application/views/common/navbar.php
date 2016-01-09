<?php
$CI = &get_instance();
$role_feedback = $CI->session->userdata('role');
$username = $CI->session->userdata('username');
?>
<img class="cse-flag" src="<?=base_url();?>assets/img/cse-flag.jpg" alt="">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <center><a class="navbar-brand" href="<?=base_url();?>home">Student Feedback</a></center>
        </div>
        <!--nav start-->
        <div id="nav-container">
            <nav>
                <ul>
                    <?php if($role_feedback == 'student'){?>
                    <li>
                        <a href="<?=base_url();?>home"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <?php } ?>

                    <?php if($role_feedback == 'teacher'){?>
                        <li>
                            <a href="<?=base_url();?>instructor_home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                    <?php } ?>

                    <?php if($role_feedback == 'admin'){?>
                        <li>
                            <a href="<?=base_url();?>admin_home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                    <?php } ?>

                    <?php if($role_feedback == 'superadmin'){?>
                        <li>
                            <a href="<?=base_url();?>super_admin_home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                    <?php } ?>

                    <!--<li>
                        <a href="javascript:void(0)"><i class="glyphicon glyphicon-edit"></i> Feedback</a>
                        <ul>
                            <li><a href="<?/*=base_url();*/?>#news">Feedback News</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="<?=base_url();?>contact"><i class="glyphicon glyphicon-envelope"></i> Contact</a>
                    </li>
                    <?php if(($role_feedback == 'student')||($role_feedback == 'admin')||($role_feedback == 'teacher')||($role_feedback == 'superadmin')){?>
                    <li>
                        <a href="<?=base_url();?>edit_profile"><i class="glyphicon glyphicon-user"></i> <i class="welcome">Welcome</i> <?php echo $username; ?></a>
                        <ul>
                            <?php if(($role_feedback == 'admin')||($role_feedback == 'superadmin')){?>
                                <li><a href="<?=base_url();?>#manage_news">News List</a></li>
                                <li><a href="<?=base_url();?>#manage_news/post_news">Post News</a></li>
                                <?php if(($role_feedback == 'superadmin')){?>
                                    <li><a href="<?=base_url();?>manage_user">User Management</a></li>
                                <?php } ?>
                            <?php } ?>
                            <li><a href="<?=base_url();?>login/logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if($role_feedback == FALSE){?>
                    <li><a href="<?=base_url();?>login"><i class="glyphicon glyphicon-pencil"></i> Log In</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <!--nav end-->
    </div>
</div>