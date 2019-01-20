<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Themes Lab - Creative Laborator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url('')?>assets/bootstrap/img/favicon.png">
        <link href="<?php echo base_url('')?>assets/bootstrap/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('')?>assets/bootstrap/css/ui.css" rel="stylesheet">
        <link href="<?php echo base_url('')?>assets/bootstrap/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    </head>
    <body class="account" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <i class="user-img icons-faces-users-03"></i>
                        <form action="<?php echo $action; ?>" method="post" class="form-password" role="form" style="display: block;">
                        	<div style="margin: 8px" id="message">
						        <?php echo $this->session->userdata('message'); ?>
						    </div>
                            <div class="append-icon m-b-20">
                                <input type="text" class="form-control form-white email" name="email" id="email" placeholder="Masukan Email Anda Saat Mendaftar" value="<?php echo $email; ?>" />
                                <i class="icon-lock"></i>
                            </div>
                            <?php echo form_error('email') ?>
                            <button type="submit" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Send Password Reset Link</button>
                            <div class="clearfix">
                            	
                                <p class="pull-left m-t-20"><?php echo anchor(site_url('Welcome'),'Kembali'); ?></p>
                                <p class="pull-right m-t-20"><?php echo anchor(site_url('Register'),'Belum Punya Akun? Daftar disini'); ?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright © 2015 </span><span>THEMES LAB</span>.<span>All rights reserved.</span>
            </p>
        </div>
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/gsap/main-gsap.min.js"></script>
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/backstretch/backstretch.min.js"></script>
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="<?php echo base_url('')?>assets/bootstrap/js/pages/login-v1.js"></script>
    </body>
</html>
	