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
        <h2 style="margin-top:0px">Admins Read</h2>
        <table class="table">
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Gender</td><td><?php echo $Gender; ?></td></tr>
	    <tr><td>Birth Date</td><td><?php echo $birth_date; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $Address; ?></td></tr>
	    <tr><td>Telp Number</td><td><?php echo $telp_number; ?></td></tr>
	    <tr><td>Role</td><td><?php echo $role; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admins') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>