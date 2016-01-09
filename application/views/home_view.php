<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container paddingT75">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="row>">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="assets/img/slider/slide-1.jpg" alt="...">
                            <div class="carousel-caption">
                                Department of Computer Science and Engineering (CSE), BUET organized an Inter-University Math Olympiad and a National
                                Collegiate Programming Contest (BUET NCPC 2008) as a part of the CSE Festival 2008 on October 24, 2008. About 200 participants
                                from all over the country contested in the Math Olympiad and 52 teams from 30 universities including BUET, Dhaka
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/slider/slide-2.jpg" alt="...">
                            <div class="carousel-caption">
                                Prof. Dr. M. Kaykobad, Professor, Department of CSE, BUET delivered a lecture on “Research and Co-curricular Activities in Computer Science” in a seminar arranged by CSE Department on Tuesday, 17th January 2012.
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/slider/slide-3.jpg" alt="...">
                            <div class="carousel-caption">
                                The Department of Computer Science and Engineering, the first department of its kind, was established in 1982 under the faculty of Electrical and Electronics Engineering. From the very initial days of its establishment, it has been able to attract the very best students of the country.
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-ms-6 col-xs-12">
                    <br>
                    <h3>Collaboration and Connecting With Students</h3>
                    <p class="alumni_message">Universities are using social media to smooth the transition from being a student to becoming an alumni by helping the two groups connect and collaborate with each other.
                        BUET CSE Department created its own Facebook-like social network for alumni and students that includes legal wikis that they can collaborate on for specific practices, said Lisa Farris, associate director of web communications and identity at the Stanford law school. The wikis include overviews of different practices, key skill sets and more information that students and alums can share together. Though there is a lot of alumni-to-alumni conversation that takes place on the network, the collaboration between students and alumni is key in positioning the students for their careers </p>
                </div>
                <div class="col-md-5 col-ms-6 col-xs-12">
                    <br>
                    <h3>Meeting Alumni Where They're At</h3>
                    <p class="alumni_message">Some universities are playing a balancing act between using mainstream social sites (Facebook, Twitter, LinkedIn, etc.) and building their own private networks. Should the resources be focused on creating a private social network for alumni or using big networks already available? And which is more effective? The results are mixed, but it all depends on the goal at hand. </p>
                </div>
            </div>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-4 col-sm-5 sidebar-offcanvas">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Latest Alumni News</strong></div>
                <div class="panel-body">
                    <?php for ($i = 0; $i < count($news); ++$i) { ?>
                        <p><a href="assets/img/news/<?php echo $news[$i]->file_name;?>" target="_blank"><i class="glyphicon glyphicon-pushpin"></i> <?php echo $news[$i]->heading;?> <i class="newsDate"> [<?php echo date('Y-m-d', strtotime($news[$i]->published_date));?>] </i></a></p>
                    <?php } ?>

                    <p>&nbsp;</p>
                    <p><a class="pull-right" target="_blank" href="news">All news</a></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Latest Alumni Events</strong></div>
                <div class="panel-body">
                    <?php for ($i = 0; $i < count($events); ++$i) { ?>

                        <p><a href="assets/img/events/<?php echo $events[$i]->file_name;?>" target="_blank"><i class="glyphicon glyphicon-play"></i> <?php echo $events[$i]->heading;?> <i class="newsDate"> [<?php echo date('Y-m-d', strtotime($events[$i]->published_date));?>] </i></a></p>
                    <?php } ?>

                    <p>&nbsp;</p>
                    <p><a class="pull-right" target="_blank" href="events">All Events</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /home -->
<?php
$this->load->view('common/footer');
?>
