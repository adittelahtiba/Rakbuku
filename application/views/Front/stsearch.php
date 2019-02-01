<?php $this->load->view('Front/header')?>
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
						<?php if (!$thedata or $q=="" or $q==strpos($q, ' ')) { ?>
							<div style="margin-left: 40%;">
								<h2>Oops, Toko tidak ditemukan :(</h2>	
								<p>Hasil pencarian untuk "<?php echo $q; ?>" tidak ditemukan. Coba keyword lain?</p>
							</div>
						<?php
						}else{
						foreach ($thedata as $key => $value) {
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
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="window.location.href='<?php echo site_url('welcome/detail/'.$value->stores_id) ?>'">Detail</button>
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="<?php echo site_url('welcome/detail/'.$value->stores_id); ?>" class="block2-name t-left dis-block s-text33 p-b-5"><?php echo $value->stores_name ?></a>
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
						<?php } } ?>
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
<?php $this->load->view('Front/footer')?>