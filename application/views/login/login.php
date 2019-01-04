<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo $action; ?>" method="post">
		<div style="margin: 8px" id="message">
	        <?php echo $this->session->userdata('message'); ?>
	    </div>

	    <label><?php echo form_error('username') ?>
        	<input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo $username; ?>" />
        </label>

        <label><?php echo form_error('password') ?>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </label>
        <button type="submit">
            <span class="bigger-110"><?php echo $button ?></span>
        </button>

	</form>
	<?php echo anchor(site_url('Register'),'Daftar'); ?>
	<?php echo anchor(site_url('owners/forgpass'),'Lupa password'); ?>

</body>
</html>