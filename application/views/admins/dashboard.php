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
                        <h2>Dashboard <strong>Page</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <!-- <li><a href="dashboard.html">Make</a></li> -->
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        
                     <!-- END PAGE CONTENT -->
                    </div>
                <!-- END MAIN CONTENT -->
                </div>
            </div>
          <!-- END MODALS -->
       </section>
       <?php $this->load->view('lib/footer')?>
    </body>
</html>        