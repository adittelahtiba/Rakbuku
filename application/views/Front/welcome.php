<?php $this->load->view('Front/header')?>
<!-- BANER IKLAN -->
	<section class="slide1">
	<div class="container">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">

				<?php if ($Adverts == null){ ?>
					<div class="carousel-item active">
					    <img class="d-block w-100" src="<?php echo base_url('assets/front/images/bg-banner-01.jpg')?>" alt="First slide">
					</div>		
				<?php }else{ ?>
				<?php $i=0; foreach ($Adverts as $key => $value){ ?>
					<div class="carousel-item <?php echo $i++ =='0' ? 'active' : ''  ?>">
					    <a href="<?php echo site_url('welcome/detail/'. $value->stores_id); ?>">
					        <img class="d-block w-100" src="<?php echo base_url('upload/adverts/'.$value->img); ?>" alt="First slide" style="height:330px; width:1170px;">
						</a>
					</div>
				<?php } } ?>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	</section>
<!-- AKHIR BANER IKLAN -->


<!-- TOKO POPULER -->
	<section class="bgwhite p-t-45 p-b-58">
	<div class="container">
		<div class="sec-title t-center p-b-22">
			<h4 class="m-text-4 t-center">Toko Buku Populer</h4>
			<i class="t-center">Kualitas produk terbaik, terpercaya dan paling terlengkap</i>
		</div>
		<!-- Tab01 -->
		<div class="tab01 t-center">
			<!-- Tab panes -->
			<div class="tab-content p-t-35">
				<!-- - -->
				<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
					<div class="row">
						<?php foreach ($store_limit as $key => $value) {
							$string = strip_tags($value->address);
							if (strlen($string) > 25) {
								$stringCut = substr($string, 0, 25);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
								$string .= '...';
							}
						?>
						<!-- KOTAK GAMABAR TOKO  -->
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50 rounded-top">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative ">
									<div class="img-toko">
										<img style="height: 270px; width: 270px;" src="<?php echo base_url('upload/store_pictures/' .$value->store_pictures_name) ?>" alt="IMG-PRODUCT">
									</div>
									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name t-left dis-block s-text33 p-b-5"><?php echo $value->stores_name ?></a>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-phone tegak"></p>
									</span>
									<?php echo $value->contact ?> </a>
									<br>
									<a href="#" class="fs-12">
									<span class="block2-price m-text6 p-r-5">
									<p class="fa fa-map-marker tegak"></p>
									</span>
									<?php echo $string;  ?></a>
									<hr>
									<span class="block2-price m-text6 p-r-8 ">
									 <a class="size26" href ="<?php echo 'welcome/detail/'. $value->stores_id ?>">Detail</a>
									</span>
								</div>
							</div>
						</div>
						<?php } ?>
						<!-- AKHIR KOTAK GAMABAR TOKO  -->		
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
<!-- AKHIR TOKO POPULER  -->

<!-- AJAKAN MENDAFTAR -->
	<section class="parallax0 parallax100 col-lg-12" style="background-image: url(<?= base_url('assets/front/images/banner-bottom4.jpg') ?>);">
	<div class="container">
		<div class="row ">
			<div class="overlay0 p-b-200 col-lg-12">
				<div class="flex-col-c-m col-lg-12">
					<span class="z-text9 p-t-50 fs-20-sm">
					Bantu pembeli untuk<br>
					 Menemukan toko anda !<br>-</span>
					<button onclick="window.location.href='<?php echo site_url('Register') ?>'" class="btn-play s-text4 hov5 cs-pointer" data-toggle="modal">Daftar Sekarang</button>
				</div>
			</div>
		</div>
	</div>
	</section>
<!--AKHIR  AJAKAN MENDAFTAR -->
<!-- FOOTER TEROOOSS -->
<?php $this->load->view('Front/footer')?>