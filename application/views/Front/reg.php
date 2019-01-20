<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="admin-themes-lab">
        <meta name="author" content="themes-lab">
        <link rel="shortcut icon" href="<?php echo base_url('')?>assets/bootstrap/images/favicon.png" type="image/png">
        <title>Make Admin Template &amp; Builder</title>
        <link href="<?php echo base_url('')?>assets/bootstrap/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('')?>assets/bootstrap/css/theme.css" rel="stylesheet">
        <link href="<?php echo base_url('')?>assets/bootstrap/css/ui.css" rel="stylesheet">
        <script src="<?php echo base_url('')?>assets/bootstrap/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- BEGIN PAGE STYLE -->
        <link href="<?php echo base_url('')?>assets/bootstrap/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAKcW-QdLtI9yZoKOK1j2V-gZaErXnJNWU&libraries=places"></script>
        
        <style>
            body{
                padding: 100px;
                padding-top: 10px;
                background-color: #004ec1;
            }
        </style>
    </head>

    <body class="fixed-topbar fixed-sidebar theme-sdtl">
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content shopping-cart">
          <div class="header">
            <img src="<?php echo base_url('')?>assets/front/images/logo/logo-png.png">
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel">
                <div class="panel-content">
                  <p class="m-t-10 m-b-20 f-16">Please verify all information and complete form below in order to validate your purchase.</p>
                  <form class="wizard-validation" data-style="sky" role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <fieldset class="cart-summary">
                      <legend>Cart Summary</legend>
                      <div class="row">
                        <div class="col-md-8" style="margin-left: 15%">
                            <div class="form-group">
                                <label for="username" class="required">Username</label>
                                <input type="text" class="form-control form-white" name="username" id="username" placeholder="Masukan Username Anda" value="<?php echo $username; ?>" />
                                <?php echo form_error('username') ?>
                            </div>
                            <div class="form-group">
                                <label for="name" class="required">Nama</label>
                                <input type="text" class="form-control form-white" name="name" id="name" placeholder="Masukan Nama Anda" value="<?php echo $name; ?>" />
                                <?php echo form_error('name') ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class="required">Email</label>
                                <input type="email" class="form-control form-white" name="email" id="email" placeholder="Masukan Email Anda" value="<?php echo $email; ?>" />
                                <?php echo form_error('email') ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="required">Password</label>
                                <input type="password" class="form-control form-white" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                                <?php echo form_error('password') ?>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="required">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control form-white">
                                    <option value="">Pilih</option>
                                    <option <?= $gender =='M' ? $selected='selected' : $selected=''?> value="<?= $gender=='M' ? 'M' : 'M' ?>">Pria</option>
                                    <option <?= $gender =='W' ? $selected='selected' : $selected=''?> value="<?= $gender=='W' ? 'W' : 'W' ?>">Wanita</option>
                                </select>
                                <?php echo form_error('gender') ?>
                            </div>
                            <div class="form-group">
                                <label for="birth_date" class="required">Tanggal Lahir</label>
                                <input type="date" class="form-control form-white" name="birth_date" id="birth_date" placeholder="Tanggal Lahir" value="<?php echo $birth_date; ?>" />
                                <?php echo form_error('birth_date') ?>
                            </div>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Shipping Info</legend>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>General Info</h3>
                              <p>We need to know more about you!</p>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                    <label for="varchar">Store Name <?php echo form_error('stores_name') ?></label>
                                    <input type="text" class="form-control form-white" name="stores_name" id="stores_name" placeholder="Store Name" value="<?php echo $stores_name; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="description">Description <?php echo form_error('description') ?></label>
                                    <textarea class="form-control form-white" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
                                </div>
                              
                            <div class="form-group">
                                    <label for="address">Address <?php echo form_error('address') ?></label>
                                    <textarea class="form-control form-white" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Hari buka <?php echo form_error('open') ?></label>
                                    <input type="text" class="form-control form-white" name="open" id="open" placeholder="Open" value="<?php echo $open; ?>" />

                                </div>
                                <div class="form-group">
                                    <label for="varchar">Contact <?php echo form_error('contact') ?></label>
                                    <input type="text" class="form-control form-white" name="contact" id="contact" placeholder="Contact" value="<?php echo $contact; ?>" />
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Opening At <?php echo form_error('opening_at') ?></label>
                                    <input class="form-control form-white input-sm" type="time" name="opening_at" id="opening_at" placeholder="Opening At" value="<?php echo $opening_at; ?>" />
                                </div>
                                <input type="hidden"  name="lat" readonly class="form-control form-white" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />

                                <input type="hidden"  name="stores_id" readonly class="form-control form-white" id="stores_id" placeholder="stores_id" value="<?php echo $stores_id; ?>" />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Closing At <?php echo form_error('closing_at') ?></label>
                                    <input class="form-control form-white input-sm" type="time" class="form-control form-white" name="closing_at" id="closing_at" placeholder="Closing At" value="<?php echo $closing_at; ?>" />
                                </div>
                                <input type="hidden" class="form-control form-white" name="lang" id="lng" placeholder="Lang" value="<?php echo $lang; ?>" />
                            </div>
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>Peta</h3>
                              <p>Masukan Koordinat Toko Anda di Peta.</p>
                            </div>
                            <div class="col-md-12">
                              <div>
                                <div id="maps" style="width: 100%; height: 320px;" ></div>
                            </div>
                            <h3><strong>Foto</strong> Toko</h3>
                            <p>Masukan Foto Toko Minimal 3 Buah Foto.</p>
                            <div class="fallback">
                              <input name="store_pictures_name[]" type="file" multiple />
                            </div>
                      
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
        </div>
        
        <!-- END LOCKSCREEN BOX -->
    <script src="<?php echo base_url('assets')?>/js/mapwilayah.js"></script>
    <script src="<?php echo base_url('assets')?>/js/jquery-1.11.2.min.js"></script>
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/translate/jqueryTranslator.min.js"></script> <!-- Translate Plugin with JSON data -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/charts-chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url('')?>assets/bootstrap/js/builder.js"></script> <!-- Theme Builder -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/quickview.js"></script> <!-- Chat Script -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/pages/search.js"></script> <!-- Search Script -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/application.js"></script> <!-- Main Application Script -->

    <!-- BEGIN PAGE SCRIPT -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script> <!-- Step Form Validation - OPTIONAL -->
    <script src="<?php echo base_url('')?>assets/bootstrap/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="<?php echo base_url('')?>assets/bootstrap/js/pages/ecommerce.js"></script>
    </body>
</html>