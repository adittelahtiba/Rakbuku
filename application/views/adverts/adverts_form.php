<!DOCTYPE html>
<html class="" lang="en">
    <head>
        <?php $this->load->view('lib/head')?>
    </head>
    <body class="fixed-topbar theme-sdtl fixed-sidebar color-blue bg-light-dark">
        <section>
            <?php $this->load->view('lib/sidebar')?>
            <!-- END MAIN CONTENT -->
            <div class="main-content">
                <?php $this->load->view('lib/topbar')?>
                <div class="page-content">
                    <div class="header">
                        <h2><strong>Form</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <?php if ($this->session->userdata('is_admin') == TRUE) { ?>
                                    <li><a href="<?php echo site_url('Admins/dashboard') ?>">Beranda</a></li>
                                <?php }else{ ?>
                                    <li><a href="<?php echo site_url('dashboard') ?>">Beranda</a></li>
                                <?php } ?>
                                <li><a href="<?php echo site_url('adverts') ?>">Iklan</a></li>
                                <li class="active">Form</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <h3><i class="icon-bulb"></i> Input <strong>Masks</strong></h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                    	    <div class="form-group">
                                                <select name="stores_id" class="form-control">
                                                    <option value="">Pilih Toko</option>
                                                    <?php foreach ($get_store as $key => $value) {?>
                                                        <?php if ($stores_id == $value->stores_id) {
                                                            $select='selected';
                                                        }else{
                                                            $select='';
                                                        }
                                                        ?>
                                                            <option <?php echo $select; ?> value="<?php echo $value->stores_id; ?>"><?= $value->stores_name; ?></option>
                                                    <?php }?>
                                                </select>
                                                <?php echo form_error('stores_id') ?>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="date">Tanggal Mulai</label>
                                                <input type="date" class="form-control" name="date_of_order" id="date_of_order" placeholder="Date Of Order" value="<?php echo $date_of_order; ?>" />
                                                <?php echo form_error('date_of_order') ?>
                                            </div>
                                    	    <div class="form-group">
                                                <label for="date">Tanggal Habis</label>
                                                <input type="date" class="form-control" name="date_of_com" id="date_of_com" placeholder="Date Of Com" value="<?php echo $date_of_com; ?>" />
                                                <?php echo form_error('date_of_com') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Gambar</label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <?php if ($img !== '') { ?>
                                                        <img name="img" src="<?php echo base_url('upload/adverts/'. $img);?>" width="180" height="200" id="preview">
                                                        <input type="hidden" name="imgname" value="<?php echo $img ?>">
                                                    <?php }else{ ?>
                                                        <img name="img" src="<?php echo base_url('upload/adverts/Noimage.jpg');?>" width="180" height="200" id="preview">
                                                    <?php } ?>
                                                    
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Upload</span>
                                                            <input type="file" name="img" onchange="tampilkanPreview(this,'preview')">
                                                        </span>    
                                                  </div>
                                                <?php echo $error; ?>
                                            </div>
                                            <input type="hidden" name="adverts_id" value="<?php echo $adverts_id; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo 'Tambah' ?></button> 
                                    	    <a href="<?php echo site_url('adverts') ?>" class="btn btn-default">Batal</a>
                                    	</form>
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <?php $this->load->view('lib/footer')?>
</body>
</html>
<script type="text/javascript">
    function tampilkanPreview(gambar,idpreview){
    var gb = gambar.files;
    for (var i = 0; i < gb.length; i++){

        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview=document.getElementById(idpreview);            
        var reader = new FileReader();
        
        if (gbPreview.type.match(imageType)) {

            preview.file = gbPreview;
            reader.onload = (function(element) { 
                return function(e) { 
                    element.src = e.target.result; 
                }; 
            })(preview);


            reader.readAsDataURL(gbPreview);
        }else{

            alert("Type file tidak sesuai. Khusus image.");
        }
       
    }    
}
</script>