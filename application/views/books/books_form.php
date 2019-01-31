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
                                <li><a href="<?php echo site_url('dashboard') ?>">Beranda</a></li>
                                <li><a href="<?php echo site_url('books') ?>">Buku</a>
                                <li class="active">Buku</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portlets">
                            <div class="panel">
                                <div class="panel-header panel-controls">
                                    <h3><i class="icon-bulb"></i> Form <strong>Buku</strong></h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                    	    <div class="form-group">
                                                <label for="varchar">Judul <?php echo form_error('title') ?></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Cover buku</label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <?php if ($cover !== '') { ?>
                                                        <img src="<?php echo base_url('upload/cover/'. $cover);?>" width="180" height="200" id="preview">
                                                    <?php }else{ ?>
                                                        <img src="<?php echo base_url('upload/cover/Noimage.jpg');?>" width="180" height="200" id="preview">
                                                    <?php } ?>
                                                    
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Ubah...</span>
                                                            <input type="file" name="cover" onchange="tampilkanPreview(this,'preview')">
                                                        </span>    
                                                    
                                                    
                                                </div>
                                            </div>

                                            <?php echo $error; ?>
                                            
                                            <div class="form-group">
                                                <label for="date">Tanggal Rilis <?php echo form_error('Release_date') ?></label>
                                                <input type="text" data-mask="99-99-9999" class="form-control" placeholder="DD-MM-YYYY" name="Release_date" id="Release_date" placeholder="Release Date" value="<?php echo $Release_date; ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label for="date">ISBN <?php echo form_error('ISBN') ?></label>
                                                <input type="number" class="form-control" name="ISBN" id="ISBN" value="<?php echo $ISBN; ?>" />
                                            </div>
                                            
                                    	    <div class="form-group">
                                                <label for="varchar">
                                                    Kategori
                                                </label>
                                                <table class="table table-bordered" id="dynamic_field">
                                                     <tr>
                                                          <th width="30%">Nama categories</th>
                                                          <th width="5%"></th>
                                                     </tr>
                                                     <?php foreach ($categories as $key => $val) {
                                                        if ($val->books_id==$books_id){ 
                                                            $categ_id = $val->categories_id; ?>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" value="<?= $val->categories_id ?>" class="form-control" name="categories_id1[]">
                                                                    <input value="<?= $val->categories_name ?>" type="text" class="form-control" name="categories_name1[]">
                                                                    <?php echo form_error('categories_name') ?> <br>
                                                                </td>
                                                                <td>

                                                                    <button href="#full-colored" data-toggle="modal" type="button" class="btn btn-danger">Hapus</button>
                                                                </td>
                                                            </tr>
                                                        <?php } } ?>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control" name="categories_name[]">
                                                                <?php echo form_error('categories_name') ?> <br>
                                                            </td>
                                                            <td>
                                                                <button type="button" name="add" id="add" class="btn btn-primary">Tambah</button>
                                                            </td>
                                                        </tr>
                                                    </tr>
                                                </table>
                                            </div>

                                    	    <div class="form-group">
                                                <label for="varchar">Penulis <?php echo form_error('authors') ?></label>
                                                <input type="text" class="form-control" name="authors" id="authors" placeholder="Authors" value="<?php echo $authors; ?>" />
                                            </div>
                                    	    <div class="form-group">
                                                <label for="varchar">Penerbit <?php echo form_error('publishers') ?></label>
                                                <input type="text" class="form-control" name="publishers" id="publishers" placeholder="Publishers" value="<?php echo $publishers; ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label for="varchar">Harga <?php echo form_error('price') ?></label>
                                                <input type="number" class="form-control" name="price" id="price" value="<?php echo $price; ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label for="varchar">Stok Buku <?php echo form_error('book_stock') ?></label>
                                                <input type="number" class="form-control" name="book_stock" id="book_stock"  value="<?php echo $book_stock; ?>" />
                                            </div>

                                    	    <input type="hidden" name="books_id" value="<?php echo $books_id; ?>" /> 
                                            <input type="hidden" name="cover1" value="<?php echo $cover; ?>" /> 
                                    	    <button type="submit" class="btn btn-primary"><?php echo 'Ubah' ?></button> 
                                    	    <a href="<?php echo site_url('books') ?>" class="btn btn-default">Batal</a>
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
    <div class="modal fade" id="full-colored" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-primary">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title">Full <strong>Colored</strong></h4>
                </div>
                <div class="modal-body">
                  <p class="m-t-40">Apakah anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-dark" data-dismiss="modal">Delete</button> -->

                    <?php 
                        echo anchor(site_url('categories/delete/'.$categ_id),'Delete</i>',' class="btn btn-dark" ');
                    ?>
                </div>
              </div>
            </div>
          </div>
</body>
</html>

<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"> <td><input type="text" class="form-control" name="categories_name[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Hapus</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });   
 });  
 </script>
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