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
        <h2 style="margin-top:0px">Adverts Read</h2>
        <table class="table">
	    <tr><td>Adverts Name</td><td><?php echo $adverts_name; ?></td></tr>
	    <tr><td>Stores Id</td><td><?php echo $stores_id; ?></td></tr>
	    <tr><td>Date Of Order</td><td><?php echo $date_of_order; ?></td></tr>
	    <tr><td>Date Of Com</td><td><?php echo $date_of_com; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('adverts') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>