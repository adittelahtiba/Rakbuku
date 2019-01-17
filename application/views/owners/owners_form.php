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
                        <h2>Tables <strong>Admin</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="tables.html">Home</a></li>
                                <li class="active">Admin</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <h3><i class="icon-bulb"></i> Input <strong>Masks</strong></h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="<?php echo $action; ?>" method="post">
                                    	    <div class="form-group">
                                                <label for="varchar">Nama <?php echo form_error('name') ?></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Email <?php echo form_error('email') ?></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="enum">Jenis Kelamin <?php echo form_error('gender') ?></label>
                                                <select name="gender" id="gender" class="form-control form-white" data-style="white">
                                                    <option value=""></option>
                                                    <option <?= $gender =='M' ? $selected='selected' : $selected=''?> value="<?= $gender=='M' ? 'M' : 'M' ?>">Pria</option>
                                                    <option <?= $gender =='W' ? $selected='selected' : $selected=''?> value="<?= $gender=='W' ? 'W' : 'W' ?>">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Tanggal Rilis <?php echo form_error('birth_date') ?></label>
                                                <input type="text" data-mask="99-99-9999" class="form-control" placeholder="DD-MM-YYYY" name="birth_date" id="birth_date" placeholder="Release Date" value="<?php echo $birth_date; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Username <?php echo form_error('username') ?></label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Password <?php echo form_error('password') ?></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                            </div>
                                    	    <input type="hidden" name="owners_id" value="<?php echo $owners_id; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                    	    <a href="<?php echo site_url('owners') ?>" class="btn btn-default">Cancel</a>
                                        </form>
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