<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Admins <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Gender <?php echo form_error('Gender') ?></label>
            <input type="text" class="form-control" name="Gender" id="Gender" placeholder="Gender" value="<?php echo $Gender; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Birth Date <?php echo form_error('birth_date') ?></label>
            <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birth_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="Address">Address <?php echo form_error('Address') ?></label>
            <textarea class="form-control" rows="3" name="Address" id="Address" placeholder="Address"><?php echo $Address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Telp Number <?php echo form_error('telp_number') ?></label>
            <input type="text" class="form-control" name="telp_number" id="telp_number" placeholder="Telp Number" value="<?php echo $telp_number; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Role <?php echo form_error('role') ?></label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div>
	    <input type="hidden" name="admins_id" value="<?php echo $admins_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admins') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>