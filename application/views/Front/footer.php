<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
	
<footer class="footer bg6 p-t-45 p-b-43 p-l-45 p-r-45 ">
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
						<input class="s-text7 bg6 w-full p-b-5 form-control" type="text" name="email" placeholder="email@example.com"></div>
					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">Subscribe</button>
					</div>
				</form>
			</div>
		</div>
		</footer>
<!-- AKHIR FOOTER -->


<!-- Back to top -->
		<div class="btn-back-to-top bg0-hov" id="myBtn">
			<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
			</span>
		</div>
<!-- AKHIR Back to top -->




		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/animsition/js/animsition.min.js')?>"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/bootstrap/js/popper.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/select2/select2.min.js')?>"></script>
		<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/slick/slick.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/front/js/slick-custom.js')?>"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/countdowntime/countdowntime.js')?>"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/lightbox2/js/lightbox.min.js')?>"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/sweetalert/sweetalert.min.js')?>"></script>
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
		<script type="text/javascript" src="<?php echo base_url('assets/front/vendor/parallax100/parallax100.js')?>"></script>
		<script type="text/javascript">$('.parallax100').parallax100();</script>
		<!--===============================================================================================-->
		<script src="<?php echo base_url('assets/front/js/main.js') ?>"> </script>
		<script>
				/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}
			</script>
		</body>
		</html>