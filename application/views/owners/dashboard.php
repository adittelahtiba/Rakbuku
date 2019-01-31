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
                        <h2>Halaman <strong>Dashboard</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                        <div class="col-md-4">
                          <div class="panel">
                            <div class="panel-header bg-blue">
                              <h3>Pasang <strong>Iklan</strong></h3>
                            </div>
                            <div class="panel-content">
                              <p>Ingin memasang iklan di halaman depan rakbuku? berikut tatacara untuk memasang iklan:</p>
                              <p>1. siapkan gambar banner iklan anda dengan panjang dan lebar</p>
                              <p>2. kirim gambar tersebut ke alamat email wisatabandungdotcom@gmail.com</p>
                              <p>dengan subjek "pasang iklan" untuk isi dari email masukan ID toko "<?php echo $this->session->userdata('stores_id'); ?>" buku,</p>
                              <p>username anda dan berapa lama iklan anda akan di pasang</p>
                              <p>3. Tunggu konfirmasi dari admin rakbuku ke email anda untuk keterangan lebih lanjut</p>
                              <div class="p-t-20 m-b-20 p-l-40">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xlg-12 col-lg-4 col-sm-4">
                          <div class="panel">
                            <a href="<?php echo site_url('books')?>">
                            <div class="panel-content widget-small bg-green">
                              <div class="title">
                                <h1>Jumlah Buku <?php echo $books_data_total; ?></h1>
                              </div>
                              <div class="content">
                                <div class="col-xlg-6">
                                    <?php foreach ($books_data as $key => $value) { ?>
                                        <p><i class="glyphicon glyphicon-bookmark"></i> <?php echo $value->title; ?></p>
                                    <?php } ?>  
                               </div>
                              </div>
                            </div>
                            </a>
                          </div>
                        </div>
                        <div class="col-xlg-12 col-lg-4 col-sm-4">
                          <div class="panel">
                            <a href="<?php echo site_url('adverts')?>">
                            <div class="panel-content widget-small bg-green">
                              <div class="title">
                                <h1>Jumlah Iklan <?php echo $Adverts_data_total; ?></h1>
                              </div>
                              <div class="content">
                                <div class="col-xlg-6">
                                    <?php
                                        if ($Adverts_data_total<1) {
                                            echo "Anda tidak memiliki iklan yang aktif";
                                        }else{
                                            foreach ($Adverts_data as $key => $value) { ?>
                                            <p><i class="glyphicon glyphicon-bookmark"></i>Berakhir pada tanggal: <?php echo $value->date_of_com; ?></p>
                                    <?php } } ?>  
                               </div>
                              </div>
                            </div>
                          </div>
                            </a>
                        </div>
                    </div>
                     <!-- END PAGE CONTENT -->
                </div>
                <!-- END MAIN CONTENT -->
            </div>
          <!-- END MODALS -->
       </section>
       <?php $this->load->view('lib/footer')?>
    </body>
</html>        