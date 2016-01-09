<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container paddingT75">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <h2 class="col-lg-12">Edit Event</h2>
                <br>
                <br>
                <form role="form" method="post" action="<?=base_url();?>event_list/update_event/<?=$e_event[0]->id;?>">
                    <div class="form-group col-md-8">
                        <label for="event_heading">Event Heading *</label>
                        <input type="text" class="form-control custom-text" name="event_heading"  maxlength="255" placeholder="Event Heading *" value="<?php echo $e_event[0]->heading;?>" required="">
                    </div>
                    <?php
                    if(($e_event[0]->status)=='active') {
                        $checked_e = 'checked=""';
                    }
                    else{
                        $checked_e='';
                    }
                    ?>
                    <div class="form-group col-md-2 padding0">
                        <label class="per_check" for="status"><input type="checkbox" name="status" <?php echo $checked_e ?> value=""> Active ?</label>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default custom-text">Update</button>
                    </div>
                </form>
            </div>
            <?php if (isset($success_msg)) { echo $success_msg; } ?>
        </div>
    </div>
</div>
<!-- /edit_profile_personal -->
<?php
$this->load->view('common/footer');
?>
