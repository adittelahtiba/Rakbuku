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
                        <h2>Dashboard <strong>Page</strong></h2>
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
                        <div class="col-xlg-12 col-lg-4 col-sm-4">
                          <div class="panel">
                            <a href="<?php echo site_url('admins')?>">
                            <div class="panel-content widget-small bg-green">
                              <div class="title">
                                <h1>Jumlah Admin <?php echo $admins_data; ?></h1>
                              </div>
                              <div class="content">
                                <div class="col-xlg-6">
                               </div>
                              </div>
                            </div>
                            </a>
                          </div>
                        </div>

                        <div class="col-xlg-12 col-lg-4 col-sm-4">
                          <div class="panel">
                            <a href="<?php echo site_url('owners')?>">
                            <div class="panel-content widget-small bg-green">
                              <div class="title">
                                <h1>Jumlah Pemilik Toko <?php echo $owners_data; ?></h1>
                              </div>
                              <div class="content">
                                <div class="col-xlg-6">
                               </div>
                              </div>
                            </div>
                            </a>
                          </div>
                        </div>

                        <div class="col-xlg-12 col-lg-4 col-sm-4">
                          <div class="panel">
                            <a href="<?php echo site_url('books')?>">
                            <div class="panel-content widget-small bg-green">
                              <div class="title">
                                <h1>Jumlah Buku <?php echo $books_data; ?></h1>
                              </div>
                              <div class="content">
                                <div class="col-xlg-6">
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
                                <h1>Jumlah Iklan <?php echo $adverts_data; ?></h1>
                              </div>
                              <div class="content">
                                <div class="col-xlg-6">
                               </div>
                              </div>
                            </div>
                            </a>
                          </div>
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