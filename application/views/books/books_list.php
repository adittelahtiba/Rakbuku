<!DOCTYPE html>
<html class="" lang="en">
    <head>
        <?php $this->load->view('lib/head')?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    </head>
    <body class="fixed-topbar theme-sdtl fixed-sidebar color-blue bg-light-dark">
        <section>
            <?php $this->load->view('lib/sidebar')?>
            <!-- END MAIN CONTENT -->
            <div class="main-content">
                <?php $this->load->view('lib/topbar')?>
                <div class="page-content">
                    <div class="header">
                        <h2>Tables <strong>books</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="tables.html">Home</a></li>
                                <li class="active">books</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <br>
                                    <?php if($this->session->userdata('is_admin') == false) { ?>
                                    <?php echo anchor(site_url('books/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-success btn-rounded"'); ?>
                                    <a href="#full-colored2" class="btn btn-success btn-rounded" data-toggle="modal"><i class="fa fa-plus"></i>Import</a>
                                    <?php } ?>
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="panel-content">
                                    <table class="table table-hover table-dynamic">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                            <th>Title</th>
                                            <th>Release Date</th>
                                            <th>Publishers</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($books_data as $books){ ?>
                                                <tr>
                                              <td width="80px"><?php echo $no++ ?></td>
                                              <td><?php echo $books->title ?></td>
                                              <td><?php echo $books->Release_date ?></td>
                                              <td><?php echo $books->publishers ?></td>
                                              <td style="text-align:center">

                                                        <?php
                                                        echo anchor(site_url('books/read/'.$books->books_id),'Read'); 
                                                        
                                                            if ($this->session->userdata('is_admin') == false) {
                                                                echo ' | '; 
                                                                echo anchor(site_url('books/update/'.$books->books_id),'Update'); 
                                                                echo ' | '; ?>
                                                            <a href="#full-colored" data-toggle="modal">Delete</a> |
                                                            <a href="#full-share" data-toggle="modal">Share</a>
                                                <?php } ?>
                                              </td>
                                               </tr>
                                            <?php } ?>
                                        </tbody>
                                     </table>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- END PAGE CONTENT -->
                </div>
                <!-- END MAIN CONTENT -->
            </div>
       </section>
       <div class="modal fade" id="full-colored" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-primary">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title">Full <strong>Colored</strong></h4>
                </div>
                <div class="modal-body">
                  <p class="m-t-40">Apakah anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-dark" data-dismiss="modal">Delete</button> -->
                    <?php 
                        echo anchor(site_url('books/delete/'.$books->books_id),'Delete',' class="btn btn-dark" '); 
                    ?>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="full-colored2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-primary">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title">Import <strong>Excel</strong></h4>
                </div>
                <form action="<?php echo base_url();?>books/form/" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <p class="m-t-40">
                            Untuk melakukan import data dari excel diwajibkan untuk mengikuti format
                            yang sudah disediakan olah Rakbuku, silahkan download contoh format import
                            dibawah ini :
                        </p>
                        <a href="https://drive.google.com/open?id=12kJu7IuoG6SYGp5QC6GyfVYWB5t8n4Gk">Download</a>
                    </div>
                    <div class="modal-footer">
                        <input type="file" name="filename"/> 
                        <button type="submit" class="btn btn-dark ladda-button"><i class="icon-cloud-upload"></i> Import</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>

          <div class="modal fade" id="full-share" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-primary">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title">Share <strong>Buku</strong></h4>
                </div>
                <div class="modal-body">
                    <p class="m-t-40"></p>
                    <div class="fb-share-button" data-href="<?php echo site_url('welcome/bookdetail/'.$books->books_id) ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <?php 
                        //echo anchor(site_url('books/upload/'),'Import',' class="btn btn-dark" '); 
                    ?>
                </div>
              </div>
            </div>
          </div>

        <?php $this->load->view('lib/footer')?>
    </body>
</html>    
