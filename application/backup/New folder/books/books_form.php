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
        <h2 style="margin-top:0px">Books <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Books Id <?php echo form_error('books_id') ?></label>
            <input type="text" class="form-control" name="books_id" id="books_id" placeholder="Books Id" value="<?php echo $books_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Release Date <?php echo form_error('Release_date') ?></label>
            <input type="text" class="form-control" name="Release_date" id="Release_date" placeholder="Release Date" value="<?php echo $Release_date; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('books') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>