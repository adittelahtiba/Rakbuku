<?php $this->load->view('Front/header')?>
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
<?php $this->load->view('Front/footer')?>