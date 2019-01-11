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

	    <label><?php echo form_error('password') ?>
        	<input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?php echo $password; ?>" />
        </label>
        <input type="hidden" name="owners_id" value="<?php echo $owners_id; ?>" /> 
        <input type="hidden" name="xcode" value="<?php echo $xcode; ?>" /> 
        <button type="submit">
            <span class="bigger-110"><?php echo $button ?></span>
        </button>

	</form>


</body>
</html>