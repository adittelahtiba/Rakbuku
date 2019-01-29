<?php $this->load->view('Front/header')?>
<!-- akhir header untuk HP -->
<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">
				<div class="slick3">
					<div class="wrap-pic-w">
						<img style="height: 400px; width: 280px;" src="<?php echo base_url('upload/cover/'. $cover)?>" alt="IMG-PRODUCT">
					</div>
				</div>
			</div>
		</div>
		<div class="w-size14 p-t-30 respon5">
			<h4 class="product-detail-name m-text16 p-b-13"><?= $title ?></h4>
			<span class="m-text17"></span>
			<div class="p-t-20 p-b-10">
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-pencil"> ISBN</p>
				</span>
				<?= $ISBN ?>
				<hr>
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-phone"> Tanggal Terbit</p>
				</span>
				<?= $Release_date ?>
				<hr>
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-user-md"> Penulis</p>
				</span>
				<?= $authors ?>
				<hr>
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-home"> Penerbit</p>
				</span>
				<?= $publishers ?>
				<hr>
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-dollar"> Harga</p>
				</span>
				<?= $price ?>
				<hr>
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-book"> Stock</p>
				</span>
				<?= $book_stock ?>
				<hr>
				<span class="block2-price s-text88 p-r-5">
				<p class="fa fa-bookmark"> Kategori</p>
				</span>
				<?php foreach ($categories as $key=>$value) { ?>
					<label class="btn btn-sm btn-primary"><?= $value->categories_name ?></label>
				<?php } ?>
				<hr>
			</div>
		</div>
	</div>
</div>

<!-- Footer -->
<?php $this->load->view('Front/footer')?>