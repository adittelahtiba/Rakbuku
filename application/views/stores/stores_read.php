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
        <h2 style="margin-top:0px">Stores Read</h2>
        <table class="table">
	    <tr><td>Store Name</td><td><?php echo $store_name; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Open</td><td><?php echo $open; ?></td></tr>
	    <tr><td>Contact</td><td><?php echo $contact; ?></td></tr>
	    <tr><td>Opening At</td><td><?php echo $opening_at; ?></td></tr>
	    <tr><td>Closing At</td><td><?php echo $closing_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stores') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>