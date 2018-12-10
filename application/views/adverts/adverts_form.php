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
        <h2 style="margin-top:0px">Adverts <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Adverts Name <?php echo form_error('adverts_name') ?></label>
            <input type="text" class="form-control" name="adverts_name" id="adverts_name" placeholder="Adverts Name" value="<?php echo $adverts_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Stores Id <?php echo form_error('stores_id') ?></label>
            <input type="text" class="form-control" name="stores_id" id="stores_id" placeholder="Stores Id" value="<?php echo $stores_id; ?>" />
        </div>
	    <input type="hidden" name="adverts_id" value="<?php echo $adverts_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('adverts') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>