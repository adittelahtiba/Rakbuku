<!DOCTYPE html>
<html class="" lang="en">
    <head>
        <?php $this->load->view('lib/head')?>
    </head>
    <body class="fixed-topbar theme-sdtl fixed-sidebar color-blue bg-light-dark">
        <section>
            <?php $this->load->view('lib/sidebar')?>
            <!-- END MAIN CONTENT -->
            <div class="main-content">
                <?php $this->load->view('lib/topbar')?>
                <div class="page-content">
                    <div class="header">
                        <h2><strong>Detail</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="<?php echo site_url('Admins/dashboard') ?>">Beranda</a></li>
                                <li><a href="<?php echo site_url('owners') ?>">Pemilik Toko</a></li>
                                <li class="active">Detail</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <h3><i class="icon-bulb"></i> Detail <strong>Pemilik Toko</strong></h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 style="margin-top:0px">Owners Read</h2>
                                            <table class="table">
                                        	    <tr><td>Nama</td><td><?php echo $name; ?></td></tr>
                                        	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                                        	    <tr><td>Jenis Kelamin</td><td><?php echo $gender == 'M' ? 'Pria' : 'Wanita' ; ?></td></tr>
                                        	    <tr><td>Tanggal Lahir</td><td><?php echo $birth_date; ?></td></tr>
                                        	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
                                        	    <tr><td>Status</td><td><?php echo $is_verify == '1' ? 'Sudah Registrasi' : 'Belum Registrasi' ; ?></td></tr>
                                                
                                        	    <tr><td>Nama Toko</td><td><?php echo $stores_name; ?></td></tr>
                                                <tr><td>Descripsi</td><td><?php echo $description; ?></td></tr>
                                                <tr><td>Alamat</td><td><?php echo $address; ?></td></tr>
                                                <tr><td>Hari Buku</td><td><?php echo $open; ?></td></tr>
                                                <tr><td>Kontak</td><td><?php echo $contact; ?></td></tr>
                                                <tr><td>Jam Buka</td><td><?php echo $opening_at; ?></td></tr>
                                                <tr><td>Jam Tutup</td><td><?php echo $closing_at; ?></td></tr>
                                        	    <tr><td></td><td><a href="<?php echo site_url('owners') ?>" class="btn btn-default">Kembali</a></td></tr>
                        	               </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header">
                        <h2>Foto <strong>Toko</strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 portlets">
                          <div class="panel panel-transparent">
                            <div class="panel-content">
                              <div class="portfolioContainer grid">
                                <?php
                                    $i = 1;
                                    foreach ($store_p as $key => $value) {
                                    $i++;
                                ?>
                                <figure class="animal effect-zoe magnific" data-mfp-src="<?php echo base_url('upload/store_pictures/'. $value->store_pictures_name);?>">

                                  <img src="<?php echo base_url('upload/store_pictures/'. $value->store_pictures_name);?>" alt="<?= $i ?>"/>
                                  <figcaption>
                                    <h2><?= $stores_name ?> <span><?= $i; ?></span></h2>
                                  </figcaption>
                                </figure>
                                <?php } ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
        
            </section>
        <?php $this->load->view('lib/footer')?>
    
    </body>
</html>
<script src="<?php echo base_url('')?>assets/bootstrap/plugins/magnific/jquery.magnific-popup.min.js"></script>  <!-- Image Popup -->
<script src="<?php echo base_url('')?>assets/bootstrap/plugins/isotope/isotope.pkgd.min.js"></script>  <!-- Filter & sort magical Gallery -->
    <!-- END PAGE SCRIPTS -->
<script>
  $(window).load(function(){
      var $container = $('.portfolioContainer');
      $container.isotope();
      $('.portfolioFilter a').click(function(){
          $('.portfolioFilter .current').removeClass('current');
          $(this).addClass('current');
          var selector = $(this).attr('data-filter');
          $container.isotope({
              filter: selector
           });
           return false;
      }); 
  });
</script>