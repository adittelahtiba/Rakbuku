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
        <h2 style="margin-top:0px">Stores <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Store Name <?php echo form_error('store_name') ?></label>
            <input type="text" class="form-control" name="store_name" id="store_name" placeholder="Store Name" value="<?php echo $store_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lang <?php echo form_error('lang') ?></label>
            <input type="text" class="form-control" name="lang" id="lang" placeholder="Lang" value="<?php echo $lang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Open <?php echo form_error('open') ?></label>
            <input type="text" class="form-control" name="open" id="open" placeholder="Open" value="<?php echo $open; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contact <?php echo form_error('contact') ?></label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo $contact; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Owners Id <?php echo form_error('owners_id') ?></label>
            <input type="text" class="form-control" name="owners_id" id="owners_id" placeholder="Owners Id" value="<?php echo $owners_id; ?>" />
        </div>
	    <input type="hidden" name="stores_id" value="<?php echo $stores_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stores') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>