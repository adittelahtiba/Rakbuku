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
        <h2 style="margin-top:0px">Owners <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" enctype="multipart/form-data" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label class="form-label for="enum">Jenis Kelamin <?php echo form_error('gender') ?></label>
            <select name="gender" id="gender" class="form-control form-white" data-style="white">
                <option value=""></option>
                <option <?= $gender =='M' ? $selected='selected' : $selected=''?> value="<?= $gender=='M' ? 'M' : 'M' ?>">Men</option>
                <option <?= $gender =='W' ? $selected='selected' : $selected=''?> value="<?= $gender=='W' ? 'W' : 'W' ?>">Women</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('birth_date') ?></label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birth_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <hr>

        <div class="form-group">
            <label for="varchar">Nama Toko <?php echo form_error('store_name') ?></label>
            <input type="text" class="form-control" name="store_name" id="store_name" placeholder="Store Name" value="<?php echo $store_name; ?>" />
        </div>
        <div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="address">Alamat Toko <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
        <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Lang <?php echo form_error('lang') ?></label>
            <input type="text" class="form-control" name="lang" id="lang" placeholder="Lang" value="<?php echo $lang; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Hari buka <?php echo form_error('open') ?></label>
            <input type="text" class="form-control" name="open" id="open" placeholder="Open" value="<?php echo $open; ?>" />
        </div>
        
        <div class="form-group">
            <label for="varchar">Contact <?php echo form_error('contact') ?></label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo $contact; ?>" />
        </div>

        <div class="col-xs-12">
            <input multiple="" name="store_pictures_name[]" type="file"/>
        </div>
        <?php echo $error; ?>

        <input type="hidden" name="stores_id" value="<?php echo $stores_id; ?>" /> 
	    <input type="hidden" name="owners_id" value="<?php echo $owners_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('owners') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>