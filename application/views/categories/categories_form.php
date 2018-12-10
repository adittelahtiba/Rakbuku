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
        <h2 style="margin-top:0px">Categories <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Categories Name <?php echo form_error('categories_name') ?></label>
            <input type="text" class="form-control" name="categories_name" id="categories_name" placeholder="Categories Name" value="<?php echo $categories_name; ?>" />
        </div>
	    <input type="hidden" name="categories_id" value="<?php echo $categories_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('categories') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>