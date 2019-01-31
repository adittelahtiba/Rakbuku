<!DOCTYPE html>
<html class="" lang="en">
    <head>
        <?php $this->load->view('lib/head')?>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAKcW-QdLtI9yZoKOK1j2V-gZaErXnJNWU&libraries=places"></script>
    </head>
    <body class="fixed-topbar theme-sdtl fixed-sidebar color-blue bg-light-dark">
        <section>
            <?php $this->load->view('lib/sidebar')?>
            <!-- END MAIN CONTENT -->
            <div class="main-content">
                <?php $this->load->view('lib/topbar')?>
                <div class="page-content">
                    <div class="header">
                        <h2> <strong>Profile</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="<?php echo site_url('dashboard') ?>">Beranda</a></li>
                                <li class="active">Toko</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <h3><i class="icon-bulb"></i> Form <strong>Profile</strong></h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                    	    <div class="form-group">
                                                <label for="varchar">Nama Toko <?php echo form_error('stores_name') ?></label>
                                                <input type="text" class="form-control" name="stores_name" id="stores_name" placeholder="Store Name" value="<?php echo $stores_name; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="description">Descripsi <?php echo form_error('description') ?></label>
                                                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="widget-box">
                                                    <h4>Lokasi</h4>
                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            <div>
                                                                <div id="maps" style="width: 100%; height: 320px;" ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if (form_error('lat') or form_error('lang')) { ?>
                                                            <span class="text-danger">Lokasi Harus diisi.</span>
                                                    <?php } ?>
                                                        
                                                    
                                                    
                                                </div>
                                            </div><!-- /.span -->
                                    	    <div class="form-group">
                                                <label for="address">Alamat <?php echo form_error('address') ?></label>
                                                <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden"  name="lat" readonly class="form-control" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="lang" id="lng" placeholder="Lang" value="<?php echo $lang; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Hari buka <?php echo form_error('open') ?></label>
                                                <input type="text" class="form-control" name="open" id="open" placeholder="Open" value="<?php echo $open; ?>" />

                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Kontak <?php echo form_error('contact') ?></label>
                                                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo $contact; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="time">Jam Buka <?php echo form_error('opening_at') ?></label>
                                                <input class="form-control input-sm" type="time" name="opening_at" id="opening_at" placeholder="Opening At" value="<?php echo $opening_at; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="time">Jam Tutup <?php echo form_error('closing_at') ?></label>
                                                <input class="form-control input-sm" type="time" class="form-control" name="closing_at" id="closing_at" placeholder="Closing At" value="<?php echo $closing_at; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Tambah Foto</label>
                                                <input multiple="" name="store_pictures_name[]" type="file" id="id-input-file-3" />
                                                <?php echo form_error('store_pictures_name') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Foto</label>
                                                <table class="table table-bordered">
                                                     <tr>
                                                          <th width="50%">Foto</th>
                                                          <th width="50%"></th>
                                                     </tr>
                                                <?php foreach ($store_p as $key => $value): ?>
                                                    <?php if ($value->stores_id==$stores_id){ ?>
                                                    <tr>
                                                        <td align="center">
                                                            <input type="hidden" name="stores_id[]" value="<?=  $value->stores_id;?>">
                                                            <img src="<?php echo base_url('./upload/store_pictures/'. $value->store_pictures_name);?>" width="180" height="200" id="preview[<?=$key?>]">
                                                        </td>
                                                        <td>
                                                            <?php echo anchor(site_url('store_pictures/delete/'.$value->store_pictures_id),'Hapus', 'class="btn btn-danger", onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?> 
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Ubah...</span>
                                                                <input type="file" name="store_pictures_name1[]" onchange="tampilkanPreview(this,'preview[<?=$key?>]')">
                                                            </span>
                                                        </td>
                                                    
                                                    <?php } ?>
                                                <?php endforeach ?>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php echo $error; ?>
                                    	    <input type="hidden" name="stores_id" value="<?php echo $stores_id; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo 'Ubah' ?></button> 
                                    	    <a href="<?php echo site_url('stores') ?>" class="btn btn-default">Batal</a>
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
    <script src="<?php echo base_url('assets')?>/js/mapwilayah.js"></script>
<script src="<?php echo base_url('assets')?>/js/jquery-1.11.2.min.js"></script>
<!-- <script>

          function initMap() {

            var map = new google.maps.Map(document.getElementById('maps'), {
              zoom: 15,
              center: {lat: <?php echo $lat;  ?>, lng: <?php echo $lang; ?>}
            });

            // Create an array of alphabetical characters used to label the markers.
            var labels = [
                '<?php echo $stores_name ?>',
            ]

            // Add some markers to the map.
            // Note: The code uses the JavaScript Array.prototype.map() method to
            // create an array of markers based on a given "locations" array.
            // The map() method here has nothing to do with the Google Maps API.
            var markers = locations.map(function(location, i) {
              return new google.maps.Marker({
                position: location,
                label: labels[i % labels.length]
              });
            });

            // Add a marker clusterer to manage the markers.
            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
          }
          var locations = [
          
            {lat: <?php echo $lat;  ?>, lng: <?php echo $lang; ?>},
        
          ]
        </script>
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
        </script>

        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW87wcDUt1FFR8Cb8lasBUeh-yqLq9sIg&callback=initMap">
        </script> -->
        
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
 