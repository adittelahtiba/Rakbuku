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
                        <h2>Tables <strong>Dynamic</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="dashboard.html">Make</a></li>
                                <li><a href="tables.html">Tables</a></li>
                                <li class="active">Tables Filter</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <br>
                                    <?php echo anchor(site_url('admins/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-success btn-rounded"'); ?>
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
                                            <?php $no=1; foreach ($admins_data as $admins){ ?>
                                                <tr>
                                                    <td class="center"><?php echo $no++ ?></td>
                                                    <td><?php echo $admins->username ?></td>
                                                    <td><?php echo $admins->name ?></td>
                                                    <td><?php echo $admins->role=='0' ? 'super admin' : 'admin' ?></td>
                                                    <td align="center">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <?php 
                                                                echo anchor(site_url('admins/delete/'.$admins->admins_id),'<i class="ace-icon fa fa-trash-o bigger-130"></i>',' class="red" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                                            ?>
                                                        </div>
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
        <?php $this->load->view('lib/footer')?>
    </body>
</html>        