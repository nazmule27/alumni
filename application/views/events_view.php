<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container paddingT75">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <h3>Alumni Events</h3>
                    <hr>
                    <?php for ($i = 0; $i < count($all_events); ++$i) { ?>

                        <p><a href="assets/img/events/<?php echo $all_events[$i]->file_name;?>" target="_blank"><i class="glyphicon glyphicon-play"></i> <?php echo $all_events[$i]->heading;?> <i class="newsDate"> [<?php echo date('Y-m-d', strtotime($all_events[$i]->published_date));?>] </i></a></p>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /events -->

<?php
$this->load->view('common/footer');
?>
