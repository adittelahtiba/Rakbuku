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
                                <li><a href="<?php echo site_url('dashboard') ?>">Beranda</a></li>
                                <li><a href="<?php echo site_url('books') ?>">Buku</a>
                                </li><li class="active">Detail</li>
                            </ol>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-lg-12 portlets ui-sortable">
                      <div class="panel">
                        <div class="panel-header panel-controls">
                          <h3><i class="icon-bulb"></i> Detail <strong>Buku</strong></h3>
                        </div>
                        

                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tr><td>Judul</td><td><?php echo $title; ?></td></tr>
                                        <tr><td>ISBN</td><td><?php echo $ISBN; ?></td></tr>
                                        <tr><td>Tanggal Terbit</td><td><?php echo $Release_date; ?></td></tr>
                                        <tr><td>Penulis</td><td><?php echo $authors; ?></td></tr>
                                        <tr><td>Penerbit</td><td><?php echo $publishers; ?></td></tr>
                                        <tr><td>Harga</td><td><?php echo $price; ?></td></tr>
                                        <tr><td>Stok</td><td><?php echo $book_stock; ?></td></tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>
                                                <?php foreach ($categories as $key=>$value) { ?>
                                                    <p class="label label-primary"><?= $value->categories_name ?></p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr><td></td><td><a href="<?php echo site_url('books') ?>" class="btn btn-default">Kembali</a></td></tr>
                                    </table>
                                        
                                </div>
                                <div class="col-md-6">
                                    <style type="text/css">
                                        .imgdd img{
                                            float: right;
                                            margin-right: 30%;
                                        }
                                    </style>
                                    <div class="imgdd">
                                        <img src="<?php echo base_url('upload/cover/'. $cover);?>" width="50%" height="50%">
                                    </div>
                                    
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