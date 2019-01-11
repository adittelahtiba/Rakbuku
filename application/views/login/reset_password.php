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

	    <label><?php echo form_error('email') ?>
        	<input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" />
        </label>

        <button type="submit">
            <span class="bigger-110"><?php echo $button ?></span>
        </button>

	</form>
	<?php echo anchor(site_url('Auth'),'Kembali'); ?>


</body>
</html>