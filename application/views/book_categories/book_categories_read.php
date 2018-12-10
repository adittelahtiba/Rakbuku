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
        <h2 style="margin-top:0px">Book_categories Read</h2>
        <table class="table">
	    <tr><td>Books Id</td><td><?php echo $books_id; ?></td></tr>
	    <tr><td>Categories Id</td><td><?php echo $categories_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('book_categories') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>