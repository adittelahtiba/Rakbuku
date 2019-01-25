<!DOCTYPE html>
<html lang="en">
<head>
<title>Beranda</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url('')?>assets/front/images/icons/favicon.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/css/login.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('')?>assets/front/css/burger.css">
<!--===============================================================================================--></head>
<body class="animsition">

<!-- header menggantung diatas -->
<div class="wrap_header-fixed fixed-header2 trans-0-4 col-lg-12">
	<!-- Logo -->
	<a href="index.html" class="logo-fixed"><img src="<?php echo base_url('')?>assets/front/images/logo/logo-png.png" alt="IMG-LOGO"></a>
	<!-- Menu -->
	<div class="wrap_menu-fixed col-lg-7 offset-lg-1 ">
		<form action="<?php echo site_url('Welcome/book_search'); ?>">
			<div class="input-group">
				<select name="kateg" class="form-control col-lg-2" id="exampleFormControlSelect1">
					<option value="">Semua Kategori</option>
					<?php foreach ($kategori as $kateg) { ?>
		      			<option><?php echo $kateg->categories_name; ?></option>
				    <?php } ?>
			    </select>
				<input type="text" class="form-control col-lg-8 m-l-20" name="q" value="<?php echo $q; ?>" id="cari" placeholder="Cari Buku atau Toko Buku ...">
				<span class="input-group-btn">
				<button class="btn btn-default" type="button" type="submit">
				<i class="fa fa-search"><font face="Poppins-Regular"></font></i> Cari </button>
				</span>
			</div>
		</form>
	</div>
	<div class="topbar-child2-fixed offset-lg-10">
		<?php if ($this->session->userdata('logged') == TRUE){ ?>
				<?php if ($this->session->userdata('is_admin') == TRUE){ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo site_url('admins/dashboard') ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<?php echo anchor(site_url('welcome/logout'),'Logout', 'class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true"'); ?>
				<?php }else{ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo site_url('dashboard') ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<?php echo anchor(site_url('welcome/logout'),'Logout', 'class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true"'); ?>
				<?php } ?>
			<?php }else{ ?>
			<?php echo anchor(site_url('Register'),'Daftar', 'class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true"'); ?>
		<span class="linedivide1"></span>
		<div class="header-wrapicon2 m-r-13">
			<button type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login-fixed" aria-haspopup="true" aria-expanded="true">Masuk</button>
			<?php
				if ($this->uri->segment(2)==='login' || $this->session->userdata('message')) {
					$logclass = "header-cart header-dropdown show-header-dropdown";
				}else{
					$logclass = "header-cart header-dropdown";
				}
			?>
			<div class="<?php echo $logclass ?>">
				<form action="<?php echo $action; ?>" method="post">
					<div style="margin: 8px" id="message">
				        <?php echo $this->session->userdata('message'); ?>
				    </div>
					<div class="form-group">
						<label for="exampleInputEmail1" class="m-text6">Username</label>
						<input type="text" class="form-control m-text6" name="username" id="Username" placeholder="Masukan Username">
						<?php echo form_error('username') ?>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1" class="m-text6">Katasandi</label>
						<input type="password" class="form-control m-text6" name="password" id="katasandi" placeholder="Masukan Katasandi">
						<?php echo form_error('password') ?>
					</div>
					<button type="submit" class="btn btn-primary m-text6" id="masuk">Masuk</button>
					<?php echo anchor(site_url('Reset_password'), 'Lupa Katasandi ?', 'class="fs-11 t-center lupa" style="margin:150px 0px 00px 60px;"'); ?>
				</form>
			</div>
		</div>
		<?php } ?>
	</div>
	
</div>
<!-- akhir header gantung -->


<!-- Header untuk desktop -->

<header class="header2">
<div class="container-menu-header-v2 p-t-26">
	<div class="topbar2">
		<div class="topbar-social">
			<a href="#"><i class="logo"><img src="<?php echo base_url('')?>assets/front/images/logo/logo-png.png"></i></a>
		</div>
		<div class="topbar-child2">
			<?php if ($this->session->userdata('logged') == TRUE){ ?>
				<?php if ($this->session->userdata('is_admin') == TRUE){ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo site_url('admins/dashboard') ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<?php echo anchor(site_url('welcome/logout'),'Logout', 'class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true"'); ?>
				<?php }else{ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo site_url('dashboard') ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<?php echo anchor(site_url('welcome/logout'),'Logout', 'class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true"'); ?>
				<?php } ?>
			<?php }else{ ?>
			<?php echo anchor(site_url('Register'),'Daftar', 'class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true"'); ?>
			<span class="linedivide1"></span>
			<div class="header-wrapicon2 m-r-13">
				<button type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Masuk</button>
				<!-- Header cart noti -->
				<?php
					if ($this->uri->segment(2)==='login' || $this->session->userdata('message')) {
						$logclass = "header-cart header-dropdown show-header-dropdown";
					}else{
						$logclass = "header-cart header-dropdown";
					}
				?>
				<div class="<?php echo $logclass ?>">
					<form action="<?php echo $action; ?>" method="post">
						<div style="margin: 8px" id="message">
					        <?php echo $this->session->userdata('message'); ?>
					    </div>
						<div class="form-group">
							<label for="exampleInputEmail1" class="m-text6">Username</label>
							<input type="text" class="form-control m-text6" name="username" id="Username" placeholder="Masukan Username">
							<?php echo form_error('username') ?>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1" class="m-text6">Katasandi</label>
							<input type="password" class="form-control m-text6" name="password" id="katasandi" placeholder="Masukan Katasandi">
							<?php echo form_error('password') ?>
						</div>

						<button type="submit" class="btn btn-primary m-text6" id="masuk">Masuk</button>
						<?php echo anchor(site_url('Reset_password'), 'Lupa Katasandi ?', 'class="fs-11 t-center lupa" style="margin:150px 0px 00px 60px;"'); ?>
					</form>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="wrap_header">
		<!-- Menu -->
		<div class="kata col-lg-6">
			<!--<img src="<?php echo base_url('')?>assets/front/images/icons/logo.png" alt="IMG-LOGO">-->
			<h4>Mulailah Mencari Ilmu di Rakbuku.com</h4>
			<p>
				 Rakbuku merupakan sebuah website penyedia jasa layanan pencarian toko buku
			</div>
			<div class="wrap_menu col-lg-8">
				<form action="<?php echo site_url('Welcome/book_search'); ?>">
					<div class="input-group">
						<select name="kateg" class="form-control col-lg-2 m-r-10" id="exampleFormControlSelect1">
							<option value="">Semua Kategori</option>
							<?php foreach ($kategori as $kateg) { ?>
				      			<option><?php echo $kateg->categories_name; ?></option>
						    <?php } ?>
						</select>
						<input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari Buku atau Toko Buku ...">
						<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="fa fa-search"><font face="Poppins-Regular"> Cari</font></i>
						</button>
						</span>	
					</div>
				</form>
				<!-- /input-group -->
			</div>
			<!-- Header Icon -->
			<div class="header-icons"></div>
		</div>
	</div>
	</header>


<!-- Header untuk layar hp -->
	<div class="mobile-header fixed-top">
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="#" class="logo-mobile"><img src="<?php echo base_url('')?>assets/front/images/logo/logo-png.png" alt="IMG-LOGO"></a>
			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
					<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>
		<!-- Menu Mobile -->
		<div class="wrap-side-menu">
			<nav class="side-menu">
			<ul class="main-menu">
				<div class="col-lg-6 m-t-10">
					<form action="<?php echo site_url('Welcome/book_search'); ?>">
						<div class="input-group">
							<select name="kateg" class="form-control col-sm-12 m-r-10" id="exampleFormControlSelect1">
							<option value="">Semua Kategori</option>
								<?php foreach ($kategori as $kateg) { ?>
					      			<option><?php echo $kateg->categories_name; ?></option>
							    <?php } ?>
							</select>
							
							<input type="text" class="form-control col-sm-12-8" id="cari" placeholder="Cari Buku atau Toko Buku ..." style=" border: 2px solid #cccccc;">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit" style="width: 50px;">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</div>

				<?php if ($this->session->userdata('logged') == TRUE){ ?>
					<?php if ($this->session->userdata('is_admin') == TRUE){ ?>
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
							<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" style="color: #333333;" onclick="window.location.href='<?php echo site_url('admins/dashboard') ?>'">Dashboard</button>
						</li>
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
							<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" style="color: #333333;"  onclick="window.location.href='<?php echo site_url('welcome/logout') ?>'"  >Logout</button>
						</li>
					<?php }else{ ?>
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" style="color: #333333;" onclick="window.location.href='<?php echo site_url('dashboard') ?>'">Dashboard</button>
						</li>
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
							<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" style="color: #333333;"  onclick="window.location.href='<?php echo site_url('welcome/logout') ?>'"  >Logout</button>
						</li>
					<?php } ?>
					<?php }else{ ?>
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
							<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" style="color: #333333;" onclick="window.location.href='<?php echo site_url('register') ?>'">Daftar</button>
						</li>
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
							<button type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true" style="color: #333333;">Masuk</button>
							<!-- Header cart noti -->
							<?php
								if ($this->uri->segment(2)==='login' || $this->session->userdata('message')) {
									$logclass = "header-cart header-dropdown show-header-dropdown";
								}else{
									$logclass = "header-cart header-dropdown";
								}
							?>
							<div class="<?php echo $logclass ?>">
								<form action="<?php echo $action; ?>" method="post">
									<div style="margin: 8px" id="message">
								        <?php echo $this->session->userdata('message'); ?>
								    </div>
									<div class="form-group">
										<label for="exampleInputEmail1" class="m-text6">Username</label>
										<input type="text" class="form-control m-text6" name="username" id="Username" placeholder="Masukan Username">
										<?php echo form_error('username') ?>
									</div>

									<div class="form-group">
										<label for="exampleInputPassword1" class="m-text6">Katasandi</label>
										<input type="password" class="form-control m-text6" name="password" id="katasandi" placeholder="Masukan Katasandi">
										<?php echo form_error('password') ?>
									</div>

									<button type="submit" class="btn btn-primary m-text6" id="masuk">Masuk</button>
									<?php echo anchor(site_url('Reset_password'), 'Lupa Katasandi ?', 'class="fs-11 t-center lupa" style="margin:150px 0px 00px 60px;"'); ?>
								</form>
							</div>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</div>
<!-- akhir header untuk HP -->
	

	


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<ul class="nav nav-tabs">
					<li><a class="nav-item nav-link" href="<?php echo site_url('Welcome/book_search?q='.$q) ?>">Buku</a></li>
					<li><a class="nav-item nav-link active" data-toggle='tab' href="#toko">Toko</a></li>
				</ul>
				<div class="tab-content">
					<div id="buku" class="tab-pane fade in">
					
					
					</div>
					<div id="Toko" class="tab-pane fade show active">
						<div class="flex-sb-m flex-w p-b-35">
						<!-- <span class="s-text8 p-t-5 p-b-5 t-kanan col-lg-12">Showing 1–12 of 16 results</span> -->
					</div>

					<!-- Product -->
					<div class="row">
						
						<?php foreach ($thedata as $key => $value) {
							$string = strip_tags($value->address);
								if (strlen($string) > 25) {
									$stringCut = substr($string, 0, 25);
									$endPoint = strrpos($stringCut, ' ');
									$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
									$string .= '...';
								}

							?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
									<div class="img-toko">
										<img style="height: 270px; width: 270px;" src="<?php echo base_url('upload/store_pictures/'. $value->store_pictures_name)?>" alt="IMG-PRODUCT">
									</div>
									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="window.location.href='<?php echo base_url('welcome/detail/'.$value->stores_id) ?>'">Detail</button>
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name t-left dis-block s-text33 p-b-5"><?php echo $value->stores_name ?></a>
									<a href="#" class="fs-12">
										<span class="block2-price m-text6 p-r-5">
											<p class="fa fa-phone tegak"></p>
										</span>
										<?php echo $value->contact ?>
									</a>
									<br>
									<a href="#" class="fs-12">
										<span class="block2-price m-text6 p-r-5">
											<p class="fa fa-map-marker tegak"></p>
										</span>
										<?php echo $string;  ?>
									</a>
									<hr>
									
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					</div>
					</div>
					</div>
				</div>

					<!-- Pagination -->
					<?php echo $pagination ?>   
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->




	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('')?>assets/front/js/main.js"></script>

</body>
</html>
