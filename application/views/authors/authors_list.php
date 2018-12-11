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
                        <h2>Tables <strong>Authors</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="tables.html">Home</a></li>
                                <li class="active">Authors</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <br>
                                    <?php echo anchor(site_url('authors/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-success btn-rounded"'); ?>
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="panel-content">
                                    <table class="table table-hover table-dynamic filter-head">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                        		<th>Authors Name</th>
                                        		<th>Telp Number</th>
                                        		<th>Email</th>
                                        		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($authors_data as $authors){ ?>
                                                <tr>
                                        			<td width="80px"><?php echo ++$start ?></td>
                                        			<td><?php echo $authors->authors_name ?></td>
                                        			<td><?php echo $authors->telp_number ?></td>
                                        			<td><?php echo $authors->email ?></td>
                                        			<td style="text-align:center" width="200px">
                                        				<?php 
                                        				echo anchor(site_url('authors/read/'.$authors->authors_id),'Read'); 
                                        				echo ' | '; 
                                        				echo anchor(site_url('authors/update/'.$authors->authors_id),'Update'); 
                                        				echo ' | '; 
                                        				echo anchor(site_url('authors/delete/'.$authors->authors_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        				?>
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