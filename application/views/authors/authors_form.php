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
        <h2 style="margin-top:0px">Authors <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Authors Name <?php echo form_error('authors_name') ?></label>
            <input type="text" class="form-control" name="authors_name" id="authors_name" placeholder="Authors Name" value="<?php echo $authors_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp Number <?php echo form_error('telp_number') ?></label>
            <input type="text" class="form-control" name="telp_number" id="telp_number" placeholder="Telp Number" value="<?php echo $telp_number; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <input type="hidden" name="authors_id" value="<?php echo $authors_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('authors') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>