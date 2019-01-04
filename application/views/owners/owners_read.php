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
        <h2 style="margin-top:0px">Owners Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
	    <tr><td>Birth Date</td><td><?php echo $birth_date; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Is Verify</td><td><?php echo $is_verify; ?></td></tr>
	    <tr><td>Stores Id</td><td><?php echo $stores_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('owners') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>