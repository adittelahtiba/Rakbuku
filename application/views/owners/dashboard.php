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
                    <!-- <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <br>
                                    <?php echo anchor(site_url('books/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-success btn-rounded"'); ?>
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="panel-content">
                                    <table class="table table-hover table-dynamic filter-head">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th width="200px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($books_data as $books){ ?>
                                                <tr>
                                                    <td class="center"><?php echo $no++ ?></td>
                                                    <td><?php echo $books->username ?></td>
                                                    <td><?php echo $books->name ?></td>
                                                    <td><?php echo $books->role=='0' ? 'super admin' : 'admin' ?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <button href="#full-colored" data-toggle="modal" type="button" class="btn btn-sm btn-icon btn-rounded btn-danger"><i class="ace-icon fa fa-trash-o bigger-130"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                     <!-- END PAGE CONTENT -->
                </div>
                <!-- END MAIN CONTENT -->
            </div>
          <!-- END MODALS -->
       </section>
       <?php $this->load->view('lib/footer')?>
    </body>
</html>        