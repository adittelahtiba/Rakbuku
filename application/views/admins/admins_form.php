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
                        <h2><strong>Form</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="<?php echo site_url('Admins/dashboard') ?>">Beranda</a></li>
                                <li><a href="<?php echo site_url('Admins') ?>">Admin</a></li>
                                <li class="active">Form</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <h3><i class="icon-bulb"></i> Form <strong>Admin</strong></h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <h2 style="margin-top:0px">Admins <?php echo $button ?></h2> -->
                                            <form action="<?php echo $action; ?>" method="post">
                                    	    <div class="form-group">
                                                <label class="form-label">Username <?php echo form_error('username') ?></label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="varchar">Password <?php echo form_error('password') ?></label>
                                                <input type="Password" class="form-control" name="password" id="password" placeholder="Password" />
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="varchar">Nama <?php echo form_error('name') ?></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="enum">Jenis Kelamin <?php echo form_error('Gender') ?></label>
                                                <select name="Gender" id="Gender" class="form-control form-white" data-style="white">
                                                    <option value=""></option>
                                                    <option <?= $Gender =='M' ? $selected='selected' : $selected=''?> value="<?= $Gender=='M' ? 'M' : 'M' ?>">Pria</option>
                                                    <option <?= $Gender =='W' ? $selected='selected' : $selected=''?> value="<?= $Gender=='W' ? 'W' : 'W' ?>">Wanita</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" name="Gender" id="Gender" placeholder="Gender" value="<?php echo $Gender; ?>" /> -->
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="date">Tanggal Lahir <?php echo form_error('birth_date') ?></label>
                                                <input type="text" class="form-control" name="birth_date" id="birth_date"  data-mask="99-99-9999" class="form-control" placeholder="DD-MM-YYYY" value="<?php echo $birth_date; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="Address">Alamat <?php echo form_error('Address') ?></label>
                                                <textarea class="form-control" rows="3" name="Address" id="Address" placeholder="Address"><?php echo $Address; ?></textarea>
                                            </div>
                                    	    <div class="form-group">
                                                <label class="form-label for="varchar">Nomer Telp <?php echo form_error('telp_number') ?></label>
                                                <input type="text" class="form-control" name="telp_number" id="telp_number" placeholder="Telp Number" value="<?php echo $telp_number; ?>" onkeypress="return isNumberKey(event)" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label for="varchar">Email <?php echo form_error('email') ?></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="ex  :  admin@admin.com" value="<?php echo $email; ?>" />
                                            </div>
                                            <input type="hidden" name="role" value="<?php echo $role='1'; ?>" /> 
                                    	    <input type="hidden" name="admins_id" value="<?php echo $admins_id; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo "Tambah"; ?></button> 
                                    	    <a href="<?php echo site_url('admins') ?>" class="btn btn-default">Batal</a>
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
<script type="text/javascript">
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
    