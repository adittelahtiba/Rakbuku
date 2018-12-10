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
        <h2 style="margin-top:0px">Discounts <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Stores Id <?php echo form_error('stores_id') ?></label>
            <input type="text" class="form-control" name="stores_id" id="stores_id" placeholder="Stores Id" value="<?php echo $stores_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Discount <?php echo form_error('discount') ?></label>
            <input type="text" class="form-control" name="discount" id="discount" placeholder="Discount" value="<?php echo $discount; ?>" />
        </div>
	    <input type="hidden" name="discounts_id" value="<?php echo $discounts_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('discounts') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>