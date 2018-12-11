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
                        <h2>Tables <strong>Authors</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li><a href="tables.html">Home</a></li>
                                <li class="active">Authors</li>
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
                                            <!-- <h2 style="margin-top:0px">Authors <?php echo $button ?></h2> -->
                                            <form action="<?php echo $action; ?>" method="post">
                                        	    <div class="form-group">
                                                    <label class="form-label" for="varchar">Authors Name <?php echo form_error('authors_name') ?></label>
                                                    <input type="text" class="form-control" name="authors_name" id="authors_name" placeholder="Authors Name" value="<?php echo $authors_name; ?>" />
                                                </div>
                                        	    <div class="form-group">
                                                    <label class="form-label" for="varchar">Telp Number <?php echo form_error('telp_number') ?></label>
                                                    <input type="text" class="form-control" name="telp_number" id="telp_number" placeholder="Telp Number" onkeypress="return isNumberKey(event)" value="<?php echo $telp_number; ?>" />
                                                </div>
                                        	    <div class="form-group">
                                                    <label class="form-label" for="varchar">Email <?php echo form_error('email') ?></label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                                </div>
                                        	    <input type="hidden" name="authors_id" value="<?php echo $authors_id; ?>" /> 
                                        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        	    <a href="<?php echo site_url('authors') ?>" class="btn btn-default">Cancel</a>
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
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
            