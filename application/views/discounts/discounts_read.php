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
        <h2 style="margin-top:0px">Discounts Read</h2>
        <table class="table">
	    <tr><td>Stores Id</td><td><?php echo $stores_id; ?></td></tr>
	    <tr><td>Discount</td><td><?php echo $discount; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('discounts') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>