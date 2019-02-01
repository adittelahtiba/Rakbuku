<?php $this->load->view('Front/header')?>
<!-- akhir header untuk HP -->
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<ul class="nav nav-tabs">
					<li><a class="nav-item nav-link active" data-toggle='tab' href="#buku">Buku</a></li>
					<li><a class="nav-item nav-link" href="<?php echo site_url('Welcome/store_search?q='.$q) ?>">Toko</a></li>
				</ul>
				<div class="tab-content">
					<div id="buku" class="tab-pane fade show active">
						<div class="flex-sb-m flex-w p-b-35">
						<!-- <span class="s-text8 p-t-5 p-b-5 t-kanan col-lg-12">Showing 1–12 of 16 results</span> -->
						</div>
						<div class="row">

						<?php if (!$thedata or $q=="" and $kateg=="" or $q==strpos($q, ' ') and $kateg =="" ) { ?>
							<div style="margin-left: 40%;">
								<h2>Oops, buku tidak ditemukan :(</h2>	
								<p>Hasil pencarian untuk "<?php echo $q; ?>" <?php echo $kateg !== "" ? 'dengan kategori "'. $kateg .'"' : "" ?> tidak ditemukan. Coba keyword lain?</p>
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
										<?php echo $value->stores_name ?>
										<div class="img-toko">
											<img src="<?php echo base_url('upload/cover/'. $value->cover)?>" alt="IMG-PRODUCT">
										</div>
										<div class="block2-overlay trans-0-4">
											<div class="block2-btn-addcart w-size1 trans-0-4">
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="window.location.href='<?php echo site_url('welcome/detail/'.$value->stores_id) ?>'">Detail</button>
											</div>
										</div>
									</div>
									<div class="block2-txt p-t-20">
										<a href="<?php echo site_url('welcome/detail/'.$value->stores_id) ?>" class="block2-name t-left dis-block s-text33 p-b-5"><?= $value->title ?></a>
										<table class="fs-666">
											<tr>
												<td>Penulis</td>
												<td width="20px;" class="t-center">:</td>
												<td><?= $value->authors ?></td>
											</tr>
											<tr>
												<td>Penerbit</td>
												<td width="20px;" class="t-center">:</td>
												<td><?php echo $value->publishers; ?></td>
											</tr>
											<tr>
												<td>Tahun Terbit</td>
												<td width="20px;" class="t-center">:</td>
												<td><?= $value->Release_date ?></td>
											</tr>
											<tr>
												<td>Kategori</td>
												<td width="20px;" class="t-center">:</td>
												<td>
													<?php foreach ($kategori as $key=>$zuck) { ?>
													<?php if ($zuck->books_id == $value->books_id) { ?>
					                                    <ul>
					                                    	<li>> <?= $zuck->categories_name ?></li>
					                                    </ul>
					                                <?php } } ?>
												</td>
											</tr>
											<tr>
												<td>Stok</td>
												<td width="20px;" class="t-center">:</td>
												<td style="color: #004ec1;"><?= $value->book_stock ?></td>
											</tr>
										</table>
										<hr>
										<span class="block2-price m-text6 p-r-8">
											Harga
											<span class="harga fs-14">
												<?= "Rp ". number_format($value->price,2,',','.') ?>
											</span>
										</span>
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