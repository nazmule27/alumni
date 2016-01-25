<?php
$this->load->view('common/header');

?>
<div class="container paddingT75">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">Forgot password</h2>
            <br>
            <div class="account-wall">
                <div class="col-md-12 login_error"><?php echo $this->session->flashdata('flash_data'); ?></div>
                <form method="post" action="<?=base_url();?>forgot">
                    <div class="form-group col-md-12">
                        <input type="text" name="student_id" id="student_id" class="form-control custom-text" maxlength="10" placeholder="Your buet student id *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" name="email" id="email" class="form-control custom-text" placeholder="Give your email to get password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-default col-md-12 custom-text" value="Submit Request">
                    </div>
                    <center><a href="<?=base_url();?>login" class="need-help">Already has password go to login</a><span class="clearfix"></span></center>
                </form>
            </div>
            <div class="request-bottom"></div>
        </div>
    </div>
</div>
<!-- /sign_in -->

<?php
$this->load->view('common/footer');
?>
