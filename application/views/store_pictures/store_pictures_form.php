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
        <h2 style="margin-top:0px">Store_pictures <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Store Pictures Name <?php echo form_error('store_pictures_name') ?></label>
            <input type="text" class="form-control" name="store_pictures_name" id="store_pictures_name" placeholder="Store Pictures Name" value="<?php echo $store_pictures_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Stores Id <?php echo form_error('stores_id') ?></label>
            <input type="text" class="form-control" name="stores_id" id="stores_id" placeholder="Stores Id" value="<?php echo $stores_id; ?>" />
        </div>
	    <input type="hidden" name="store_pictures_id" value="<?php echo $store_pictures_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('store_pictures') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>