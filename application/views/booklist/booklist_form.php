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
        <h2 style="margin-top:0px">Booklist <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Stores Id <?php echo form_error('stores_id') ?></label>
            <input type="text" class="form-control" name="stores_id" id="stores_id" placeholder="Stores Id" value="<?php echo $stores_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Books Id <?php echo form_error('books_id') ?></label>
            <input type="text" class="form-control" name="books_id" id="books_id" placeholder="Books Id" value="<?php echo $books_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Book Stock <?php echo form_error('book_stock') ?></label>
            <input type="text" class="form-control" name="book_stock" id="book_stock" placeholder="Book Stock" value="<?php echo $book_stock; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Price <?php echo form_error('price') ?></label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </div>
	    <input type="hidden" name="booklist_id" value="<?php echo $booklist_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('booklist') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>