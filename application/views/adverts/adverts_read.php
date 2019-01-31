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
                                <?php if ($this->session->userdata('is_admin') == TRUE) { ?>
                                    <li><a href="<?php echo site_url('Admins/dashboard') ?>">Beranda</a></li>
                                <?php }else{ ?>
                                    <li><a href="<?php echo site_url('dashboard') ?>">Beranda</a></li>
                                <?php } ?>
                                <li><a href="<?php echo site_url('adverts') ?>">Iklan</a></li>
                                <li class="active">Detail</li>
                            </ol>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-lg-12 portlets ui-sortable">
                      <div class="panel">
                        <div class="panel-header panel-controls">
                          <h3><i class="icon-bulb"></i> Detail <strong>Iklan</strong></h3>
                        </div>
                        

                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <style type="text/css">
                                        .imgdd{
                                            margin-bottom:15%;
                                        }
                                        .imgdd img{
                                            float: right;
                                            margin-right: 30%;
                                        }
                                    </style>
                                    <div class="imgdd">
                                        <img src="<?php echo base_url('upload/adverts/'. $img);?>" width="50%" height="50%">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <table class="table">
                                	    <tr><td>ID Toko</td><td><?php echo $stores_id; ?></td></tr>
                                        <tr><td>Nama Toko</td><td><?php echo $stores_name; ?></td></tr>
                                	    <tr><td>Dipasang pada Tanggal</td><td><?php echo $date_of_order; ?></td></tr>
                                	    <tr><td>Berakhir pada Tanggal </td><td><?php echo $date_of_com; ?></td></tr>
                                	    <tr><td></td><td><a href="<?php echo site_url('adverts') ?>" class="btn btn-default">Batal</a></td></tr>
                                	</table>
                                </div>
                            </div>
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