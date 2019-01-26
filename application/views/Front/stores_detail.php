<!DOCTYPE html>
<html lang="en">
<head>
<title>Beranda</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133230430-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133230430-1');
</script>
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url('assets/front/images/icons/favicon.png')?>" >
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/login.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/fonts/themify/themify-icons.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/fonts/elegant-font/html-css/style.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/slick/slick.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/vendor/lightbox2/css/lightbox.min.css'); ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/util.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/main.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/burger.css'); ?>">
<!--===============================================================================================--></head>
<body class="animsition">
<!-- header menggantung diatas -->
<div class="wrap_header-fixed fixed-header2 trans-0-4 col-lg-12">
	<!-- Logo -->
	<a href="<?= site_url('welcome') ?>" class="logo-fixed"><img src="<?php echo base_url('assets/front/images/logo/logo-png.png')?>" alt="IMG-LOGO"></a>
	<!-- Menu -->
	<div class="wrap_menu-fixed col-lg-7 offset-lg-1 ">
		<form action="<?php echo base_url('welcome/book_search'); ?>">
			<div class="input-group">
				<select name="kateg" class="form-control col-lg-2" >
					<option value="">Semua Kategori</option>
					<?php foreach ($kategori as $rush) { 
						if ($rush->categories_name == $kateg) {
							$select = 'selected';
						}else{
							$select = '';
						}
					?>
		      			<option <?php echo $select ?>><?php echo $rush->categories_name; ?></option>
				    <?php } ?>
				</select>
				<input type="text" class="form-control col-lg-8 m-l-20" name="q" value="<?php echo $q; ?>"  placeholder="Cari Buku atau Toko Buku ...">
				<span class="input-group-btn">
				<button class="btn btn-default" type="submit" type="submit">
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
					<a class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" href="<?php echo site_url('welcome/logout') ?>">Logout</a>
				<?php }else{ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo site_url('dashboard') ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<a href="<?php echo site_url('welcome/logout') ?>" class="btn btn-default" aria-haspopup="true" aria-expanded="true">Logout</a>
				<?php } ?>
			<?php }else{ ?>
			<a href="<?php echo site_url('Register') ?>" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true">Daftar</a>
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
						<input type="text" class="form-control m-text6" name="username"  placeholder="Masukan Username">
						<?php echo form_error('username') ?>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1" class="m-text6">Katasandi</label>
						<input type="password" class="form-control m-text6" name="password"  placeholder="Masukan Katasandi">
						<?php echo form_error('password') ?>
					</div>
					<button type="submit" class="btn btn-primary m-text6" >Masuk</button>
					<a href="<?php echo site_url('Reset_password') ?>" class="fs-11 t-center lupa" style="margin:150px 0px 00px 60px;">Lupa Katasandi ?</a>
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
			<a href="<?= site_url('welcome') ?>"><i class="logo"><img src="<?php echo base_url('assets/front/images/logo/logo-png.png')?>"></i></a>
		</div>
		<div class="topbar-child2">
			<?php if ($this->session->userdata('logged') == TRUE){ ?>
				<?php if ($this->session->userdata('is_admin') == TRUE){ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo 'admins/dashboard' ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<a class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" href="<?php echo site_url('welcome/logout') ?>">Logout</a>
				<?php }else{ ?>
					<button style="width: 120px" onclick="window.location.href='<?php echo site_url('dashboard') ?>'" type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Dashboard</button>
					<span class="linedivide1"></span>
					<a class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" href="<?php echo site_url('welcome/logout') ?>">Logout</a>
				<?php } ?>
			<?php }else{ ?>
			<a class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" href="<?php echo site_url('Register') ?>">Daftar</a>
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
							<input type="text" class="form-control m-text6" name="username"  placeholder="Masukan Username">
							<?php echo form_error('username') ?>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1" class="m-text6">Katasandi</label>
							<input type="password" class="form-control m-text6" name="password"  placeholder="Masukan Katasandi">
							<?php echo form_error('password') ?>
						</div>

						<button type="submit" class="btn btn-primary m-text6" >Masuk</button>
						<a href="<?php echo site_url('Reset_password') ?>" class="fs-11 t-center lupa" style="margin:150px 0px 00px 60px;">Lupa Katasandi ?</a>
						
					</form>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="wrap_header">
		<!-- Menu -->
		<div class="kata col-lg-6">
			<!--<img src="<?php echo base_url('assets/front/images/icons/logo.png')?>" alt="IMG-LOGO">-->
			<h4>Mulailah Mencari Ilmu di Rakbuku.com</h4>
			<p>
				 Rakbuku merupakan sebuah website penyedia jasa layanan pencarian toko buku
			</div>
			<div class="wrap_menu col-lg-8">
				<form action="<?php echo base_url('welcome/book_search'); ?>">
					<div class="input-group">
						<select name="kateg" class="form-control col-lg-2 m-r-10" >
							<option value="">Semua Kategori</option>
							<?php foreach ($kategori as $rush) { 
								if ($rush->categories_name == $kateg) {
									$select = 'selected';
								}else{
									$select = '';
								}
							?>
				      			<option <?php echo $select ?>><?php echo $rush->categories_name; ?></option>
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
			<a href="<?= site_url('welcome') ?>" class="logo-mobile"><img src="<?php echo base_url('assets/front/images/logo/logo-png.png')?>" alt="IMG-LOGO"></a>
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
					<form action="<?php echo base_url('welcome/book_search'); ?>">
						<div class="input-group">
							<select name="kateg" class="form-control col-lg-2 m-r-10" >
								<option value="">Semua Kategori</option>
								<?php foreach ($kategori as $rush) { 
									if ($rush->categories_name == $kateg) {
										$select = 'selected';
									}else{
										$select = '';
									}
								?>
					      			<option <?php echo $select ?>><?php echo $rush->categories_name; ?></option>
							    <?php } ?>
							</select>
							
							<input type="text" class="form-control col-sm-12-8"  placeholder="Cari Buku atau Toko Buku ..." style=" border: 2px solid #cccccc;">
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
							<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true" style="color: #333333;" onclick="window.location.href='<?php echo site_url('Register') ?>'">Daftar</button>
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
										<input type="text" class="form-control m-text6" name="username"  placeholder="Masukan Username">
										<?php echo form_error('username') ?>
									</div>

									<div class="form-group">
										<label for="exampleInputPassword1" class="m-text6">Katasandi</label>
										<input type="password" class="form-control m-text6" name="password"  placeholder="Masukan Katasandi">
										<?php echo form_error('password') ?>
									</div>

									<button type="submit" class="btn btn-primary m-text6" >Masuk</button>
									<a href="<?php echo site_url('Reset_password') ?>" class="fs-11 t-center lupa" style="margin:150px 0px 00px 60px;">Lupa Katasandi ?</a>
								</form>
							</div>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</div>
<!-- akhir header untuk HP -->
<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">
				<div class="wrap-slick3-dots"></div>
				<div class="slick3">
					<?php foreach ($gambartoko as $key => $value) { ?>
					<div class="item-slick3" data-thumb="<?php echo base_url('upload/store_pictures/'. $value->store_pictures_name)?>">
						<div class="wrap-pic-w">
							<img style="height: 270px; width: 270px;" src="<?php echo base_url('upload/store_pictures/'. $value->store_pictures_name)?>" alt="IMG-PRODUCT">
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="w-size14 p-t-30 respon5">
			<h4 class="product-detail-name m-text16 p-b-13"><?= $stores_name ?></h4>
			<span class="m-text17"></span>
			<div class="p-t-20 p-b-10">
				<a href="#" class="fs-12">
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-phone tegak"></p>
				</span>
				<?= $contact ?> </a>
				<br>
				<a href="#" class="fs-12">
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-calendar-check-o tegak"></p>
				</span>
				<?= $open ?> </a>
				<br>
				<div>
					
				</div>
				<a href="<?php echo 'http://www.google.com/maps/place/'.$lat.','.$lang ?>" class="fs-12">
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-map-marker tegak"></p>
				</span>
				<?= $address ?> </a>
				<hr></div>
			<p class="s-text88 p-t-5">
				<?= $description ?>
			</p>
			<!--  -->
			<!--  --></div>
	</div>
</div>
<!-- Relate Product -->
<section class="bgwhite p-t-30 p-b-65">
<div class="container">
	<div class="sec-title p-b-60">
		<h3 class="m-text-4 t-center">Rak Buku Toko</h3>
		
		
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<h4 class="m-text-4 p-b-25 m-t-15">
				Kategori
				<hr style="border: 1px solid #E6E6E6;width: 100px;" class="m-t-17"></h4>
				<ul class="p-b-54">
					<li class="p-t-4">
						<?php echo anchor(site_url('welcome/detail/'.$stores_id), "Semua Kategori"); ?>
					</li>
					<?php foreach ($kateggroupbyname as $key=>$value) { ?>
						<li class="p-t-4">
							<?php echo anchor(site_url('welcome/detail/'.$stores_id. '?q='.$value->categories_id), $value->categories_name); ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
			<div class="flex-sb-m flex-w p-b-35">
				<!--<div class="flex-w">
					<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
						<select class="selection-2" name="sorting">
							<option>Default Sorting</option>
							<option>Popularity</option>
							<option>Price: low to high</option>
							<option>Price: high to low</option>
						</select>
					</div>
					<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
						<select class="selection-2" name="sorting">
							<option>Price</option>
							<option>$0.00 - $50.00</option>
							<option>$50.00 - $100.00</option>
							<option>$100.00 - $150.00</option>
							<option>$150.00 - $200.00</option>
							<option>$200.00+</option>
						</select>
					</div>
				</div>-->
				<!-- <span class="s-text8 p-t-5 p-b-5 t-kanan col-lg-12">Showing 1–12 of 16 results</span> -->
			</div>
			<!-- Product -->
			<div class="row">
				<?php foreach ($thedata as $theke) { ?>
				<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
							<div class="img-toko">
								<img src="<?php echo base_url('upload/cover/'. $theke->cover)?>" alt="IMG-PRODUCT">
							</div>
							<div class="block2-overlay trans-0-4"></div>
						</div>
						<div class="block2-txt p-t-20">
							<a href="<?php echo site_url('welcome/bookdetail/'. $theke->books_id) ?>" class="block2-name t-left dis-block s-text33 p-b-5"><?= $theke->title ?></a>
							<table class="fs-666">
							<tr>
								<td>Penulis</td>
								<td width="20px;" class="t-center">:</td>
								<td><?= $theke->authors ?></td>
							</tr>
							<tr>
								<td>Penerbit</td>
								<td width="20px;" class="t-center">:</td>
								<td>Anak Hebat Indonesia</td>
							</tr>
							<tr>
								<td>Tahun Terbit</td>
								<td width="20px;" class="t-center">:</td>
								<td><?= $theke->Release_date ?></td>
							</tr>
							<tr>
								<td>Kategori</td>
								<td width="20px;" class="t-center">:</td>
								<td>
									<?php foreach ($kategori as $key=>$value) { ?>
									<?php if ($value->books_id == $theke->books_id) { ?>
	                                    <ul>
	                                    	<li>> <?= $value->categories_name ?></li>
	                                    </ul>
	                                <?php } } ?>
								</td>
							</tr>
							<tr>
								<td>Stok</td>
								<td width="20px;" class="t-center">:</td>
								<td style="color: #004ec1;"><?= $theke->book_stock ?></td>
							</tr>
							</table>
							<hr>
							<span class="block2-price m-text6 p-r-8">
							Harga<span class="harga fs-14"><?= "Rp ". number_format($theke->price,2,',','.') ?></span>
							</span>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- Pagination -->
			<?php echo $pagination ?>   
		</div>
	</div>
</div>
</section>
<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
<div class="flex-w p-b-90">
	<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
		<h3 class="s-text12 p-b-30">RakBuku</h3>
		<div>
			<p class="s-text7 w-size27">
				<ul class="p-b-9">
					<li class="s-text7">hello@rakbuku.com</li>
					<li class="s-text7">+666 6666 6666</li>
					<li class="s-text7">+666 1313 1313</li>
				</ul>
			</p>
			<br>
			<p class="s-text7 w-size27">
				<ul class="s-text7">
					<li>
						<p class="s-text7">
							Jl. Dipatiukur 114 Bandung<br>Jawa Barat, Indonesia</li>
					</ul>
				</p>
				<!--<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>-->
			</div>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">Navigasi</h4>
			<ul>
				<li class="p-b-9">
					<a href="index.html" class="s-text7">Beranda</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">Kategori</a>
				</li>
				<li class="p-b-9">
					<a href="about.html" class="s-text7">Tentang</a>
				</li>
				<li class="p-b-9">
					<a href="contact.html" class="s-text7">Kontak</a>
				</li>
			</ul>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">FOLLOW</h4>
			<ul>
				<li class="p-b-9">
					<a href="#" class="s-text7">Facebook</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">Instagram</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">Twitter</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">Youtube</a>
				</li>
			</ul>
		</div>
		<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">Info Promo</h4>
			<form>
				<div class="effect1 w-size9">
					<input class="s-text7 bg6 w-full p-b-5 form-control" type="text" name="email" placeholder="email@example.com">
					<span class="effect1-line"></span>
				</div>
				<div class="w-size2 p-t-20">
					<!-- Button -->
					<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">Subscribe</button>
				</div>
			</form>
		</div>
	</div>
	</footer>
	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>
	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>
			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0">
					<img src="<?php echo base_url('')?>assets/front/images/icons/video-16-9.jpg" alt="IMG">
				</div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen>
					</iframe>
				</div>
			</div>
		</div>
	</div>
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
	</script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/slick/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('')?>assets/front/js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/lightbox2/js/lightbox.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/sweetalert/sweetalert.min.js"></script>
		<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('')?>assets/front/vendor/parallax100/parallax100.js"></script>
		<script type="text/javascript">$('.parallax100').parallax100();</script>
		<!--===============================================================================================-->
		<script src="<?php echo base_url('')?>assets/front/js/main.js"></script>
		<script>
				/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}
			</script>
		</body>
		</html>