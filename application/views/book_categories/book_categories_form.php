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
        <h2 style="margin-top:0px">Book_categories <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Books Id <?php echo form_error('books_id') ?></label>
            <input type="text" class="form-control" name="books_id" id="books_id" placeholder="Books Id" value="<?php echo $books_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Categories Id <?php echo form_error('categories_id') ?></label>
            <input type="text" class="form-control" name="categories_id" id="categories_id" placeholder="Categories Id" value="<?php echo $categories_id; ?>" />
        </div>
	    <input type="hidden" name="book_categories_id" value="<?php echo $book_categories_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('book_categories') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>