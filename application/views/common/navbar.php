<?php
$CI = &get_instance();
$role = $CI->session->userdata('role');
$username = $CI->session->userdata('username');
?>
<img class="cse-flag" src="<?=base_url();?>assets/img/cse-flag.jpg" alt="">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <center><a class="navbar-brand" href="<?=base_url();?>home"><img class="logo" src="<?=base_url();?>assets/img/logo-alumni.png" alt=""></a></center>
        </div>
        <!--nav start-->
        <div id="nav-container">
            <nav>
                <ul>
                    <li>
                        <a href="<?=base_url();?>home"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>

                    <li>
                        <a href="javascript:void(0)"><i class="glyphicon glyphicon-education"></i> Alumni</a>
                        <ul>
                            <li><a href="<?=base_url();?>undergrad_alumni">Undergraduate</a></li>
                            <!--<li><a href="<?/*=base_url();*/?>postgrad_alumni">Post Graduate</a></li>-->
                            <li><a href="<?=base_url();?>news">Alumni News</a></li>
                            <li><a href="<?=base_url();?>events">Alumni Events</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=base_url();?>photo_gallery"><i class="glyphicon glyphicon-picture"></i> Photo Gallery</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>alumni_blog"><i class="glyphicon glyphicon-edit"></i> Alumni Blog</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>contact"><i class="glyphicon glyphicon-envelope"></i> Contact</a>
                        <!--<ul>
                            <li><a href="<?/*=base_url();*/?>about_us">About Us</a></li>
                        </ul>-->
                    </li>
                    <?php if(($role == 'user')||($role == 'admin')){?>
                    <li>
                        <a href="<?=base_url();?>edit_profile"><i class="glyphicon glyphicon-user"></i> <i class="welcome">Welcome</i> <?php echo $username; ?></a>
                        <ul>
                            <li><a href="<?=base_url();?>edit_profile">Edit Profile</a></li>
                            <li><a href="<?=base_url();?>view_profile">View Profile</a></li>
                            <li><a href="<?=base_url();?>post_news">Post News</a></li>
                            <li><a href="<?=base_url();?>post_event">Post Event</a></li>
                            <?php if($role == 'admin'){?>
                                <li><a href="<?=base_url();?>news_list">Edit News</a></li>
                                <li><a href="<?=base_url();?>event_list">Edit Event</a></li>
                            <?php } ?>
                            <li><a href="<?=base_url();?>upload_photo_gallery">Upload Photo</a></li>
                            <li><a href="<?=base_url();?>login/logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if($role == FALSE){?>
                    <li><a href="<?=base_url();?>login"><i class="glyphicon glyphicon-pencil"></i> Log In</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <!--nav end-->
    </div>
</div>