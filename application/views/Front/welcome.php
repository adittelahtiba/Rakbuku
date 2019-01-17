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
<!--===============================================================================================--></head>
<body class="animsition">
<!-- header fixed -->
<header class="header2">
<!-- Header desktop -->
<div class="container-menu-header-v2 p-t-26">
	<div class="topbar2">
		<div class="topbar-social">
			<a href="#"><i class="logo"><img src="<?php echo base_url('')?>assets/front/images/logo/logo-png.png"></i></a>
		</div>
		<div class="topbar-child2">
			<button type="button" class="btn btn-default" id="daftar" aria-haspopup="true" aria-expanded="true">Daftar</button>
			<span class="linedivide1"></span>
			<div class="header-wrapicon2 m-r-13">
				<button type="button" class="btn btn-default header-icon1 js-show-header-dropdown" id="login" aria-haspopup="true" aria-expanded="true">Login</button>
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
		</div>
	</div>
	<div class="wrap_header">
		<!-- Menu -->
		<div class="kata col-lg-6">
			<!--<img src="images/icons/logo.png" alt="IMG-LOGO">-->
			<h4>Mulailah Mencari Ilmu di Rakbuku.com</h4>
			<p>
				 Rakbuku merupakan sebuah website penyedia jasa layanan pencarian toko buku
			</div>
			<div class="wrap_menu col-lg-8">
				<div class="input-group">
					<nav class="menu">
					<ul class="main_menu">
						<li>
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Kategori</button>
							
							<ul class="sub_menu">
								<?php foreach ($kategori as $kateg) { ?>
									<li>
										<a href="#"><?php echo $kateg->categories_name; ?></a>
									</li>
								<?php } ?>
								
							</ul>
						</li>
					</ul>
					</nav>
					<input type="text" class="form-control" placeholder="Cari Buku atau Toko Buku ...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button">
					<i class="fa fa-search"><font face="Poppins-Regular">Cari</font></i>
					</button>
					</span>
				</div>
				<!-- /input-group -->
			</div>
			<!-- Header Icon -->
			<div class="header-icons"></div>
		</div>
	</div>
	</header>
	<!-- Slide1 -->
	<section class="slide1">
	<div class="row">
		<div class="col-1"></div>
		<div class="wrap-slick1 col-sm-10 col-md-8 col-lg-10 m-1-r-auto ">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('')?>assets/front/images/banner-2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<!--<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp"></h2>-->
						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown"></span>
						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!--<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4"></a>-->
						</div>
					</div>
				</div>
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('')?>assets/front/images/banner-2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<!--<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp"></h2>-->
						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown"></span>
						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!--<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4"></a>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
	<div class="container">
		<div class="sec-title t-center p-b-22">
			<h4 class="m-text-4 t-center">Toko Buku Populer</h4>
			<i class="t-center">Kualitas produk terbaik, terpercaya, terlengkap dan paling banyak dicari</i>
		</div>
		<!-- Tab01 -->
		<div class="tab01 t-center">
			<!-- Tab panes -->
			<div class="tab-content p-t-35">
				<!-- - -->
				<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
					<div class="row">
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50 rounded-top">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
									<div class="img-toko">
										<img src="<?php echo base_url('')?>assets/front/images/blog-03.jpg" alt="IMG-PRODUCT">
									</div>
									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button 
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Detail</button>-->
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name t-left dis-block s-text33 p-b-5">Istana Buku</a>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-phone tegak"></p>
									</span>
									+666 1313 1313 </a>
									<br>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-map-marker tegak"></p>
									</span>
									Jl. Setiabudi No. 45 Bandung </a>
									<hr>
									<span class="block2-price m-text6 p-r-8 ">
									<!-- Button -->
									<a href="#" class="size26">Detail</a>
									<!--size25 bg9 bo-rad-23 hov0 s-text0 trans-0-4--></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50 rounded-top">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
									<div class="img-toko">
										<img src="<?php echo base_url('')?>assets/front/images/blog-03.jpg" alt="IMG-PRODUCT">
									</div>
									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button 
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Detail</button>-->
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name t-left dis-block s-text33 p-b-5">Istana Buku</a>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-phone tegak"></p>
									</span>
									+666 1313 1313 </a>
									<br>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-map-marker tegak"></p>
									</span>
									Jl. Setiabudi No. 45 Bandung </a>
									<hr>
									<span class="block2-price m-text6 p-r-8 ">
									<!-- Button -->
									<a href="#" class="size26">Detail</a>
									<!--size25 bg9 bo-rad-23 hov0 s-text0 trans-0-4--></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50 rounded-top">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
									<div class="img-toko">
										<img src="<?php echo base_url('')?>assets/front/images/blog-03.jpg" alt="IMG-PRODUCT">
									</div>
									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button 
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Detail</button>-->
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name t-left dis-block s-text33 p-b-5">Istana Buku</a>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-phone tegak"></p>
									</span>
									+666 1313 1313 </a>
									<br>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-map-marker tegak"></p>
									</span>
									Jl. Setiabudi No. 45 Bandung </a>
									<hr>
									<span class="block2-price m-text6 p-r-8 ">
									<!-- Button -->
									<a href="#" class="size26">Detail</a>
									<!--size25 bg9 bo-rad-23 hov0 s-text0 trans-0-4--></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50 rounded-top">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
									<div class="img-toko">
										<img src="<?php echo base_url('')?>assets/front/images/blog-03.jpg" alt="IMG-PRODUCT">
									</div>
									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button 
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Detail</button>-->
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name t-left dis-block s-text33 p-b-5">Istana Buku</a>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-phone tegak"></p>
									</span>
									+666 1313 1313 </a>
									<br>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-map-marker tegak"></p>
									</span>
									Jl. Setiabudi No. 45 Bandung </a>
									<hr>
									<span class="block2-price m-text6 p-r-8 ">
									<!-- Button -->
									<a href="#" class="size26">Detail</a>
									<!--size25 bg9 bo-rad-23 hov0 s-text0 trans-0-4--></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--  -->
				<!--  --></div>
		</div>
	</div>
	</section>
	<!-- Banner video -->
	<section class="parallax0 parallax100 " style="">
	<div class="overlay0 p-t-190 p-b-200" style="background-image: url(<?php echo base_url('')?>assets/front/images/banner-bottom.jpg);">
		<div class="flex-col-c-m p-l-15 p-r-15 col-lg-7">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-11">
					<span class="m-text9 p-t-45 fs-20-sm ">
					<!--Bantu pembeli untuk menemukan toko anda,<br>dengan bergabung bersama kami--></span>
					<!--<h3 class="l-text1 fs-35-sm">Lookbook</h3>-->
					<p>
						<button class="sekarang s-text4 hov5 cs-pointer p-t-25 bg9" data-toggle="modal" style="">Daftar Sekarang</button>
					</div>
				</div>
			</div>
		</div>
		</section>
		<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<span class="fa fa-check-circle-o fa-2x t-center" aria-hidden="true" style="margin-bottom: 10px;color: #2ecc71;"></span>
				<h4 class="m-text12 t-center">Mudah</h4>
				<a href="#" class="s-text11 t-center">Dapatkan informasi Toko Buku dengan mudah</a>
			</div>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<span class="fa fa-bolt fa-2x t-center" aria-hidden="true" style="margin-bottom: 10px;color: #2ecc71;"></span>
				<h4 class="m-text12 t-center">Cepat</h4>
				<span class="s-text11 t-center">Pencarian informasi dengan cepat</span>
			</div>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<span class="fa fa-thumbs-o-up fa-2x t-center" aria-hidden="true" style="margin-bottom: 10px;color: #2ecc71;"></span>
				<h4 class="m-text12 t-center">Terpercaya</h4>
				<span class="s-text11 t-center">Informasi yang diberikan lebih akurat</span>
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
			</body>
			</html>