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
        <h2 style="margin-top:0px">Owners <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Gender <?php echo form_error('gender') ?></label>
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Birth Date <?php echo form_error('birth_date') ?></label>
            <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birth_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Is Verify <?php echo form_error('is_verify') ?></label>
            <input type="text" class="form-control" name="is_verify" id="is_verify" placeholder="Is Verify" value="<?php echo $is_verify; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Stores Id <?php echo form_error('stores_id') ?></label>
            <input type="text" class="form-control" name="stores_id" id="stores_id" placeholder="Stores Id" value="<?php echo $stores_id; ?>" />
        </div>
	    <input type="hidden" name="owners_id" value="<?php echo $owners_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('owners') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>