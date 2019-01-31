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
						<li class="s-text7">wisatabandungdotcom@gmail.com</li>
						<li class="s-text7">+123 456 789</li>
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
						<a href="<?php echo site_url('welcome') ?>" class="s-text7">Beranda</a>
					</li>
					<li class="p-b-9">
						<a href="#" class="s-text7">Tentang</a>
					</li>
					<li class="p-b-9">
						<a href="#" class="s-text7">Kontak</a>
					</li>
				</ul>
			</div>
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">FOLLOW</h4>
				<ul>
					<li class="p-b-9">
						<a target="_blank" href="https://www.facebook.com/Rakbuku-426893394516482/" class="s-text7">Facebook</a>
					</li>
					<li class="p-b-9">
						<a target="_blank" href="https://www.instagram.com/rakbuku.ooo/?hl=en" class="s-text7">Instagram</a>
					</li>
					<li class="p-b-9">
						<a target="_blank" href="https://twitter.com/Rakbuku5" class="s-text7">Twitter</a>
					</li>
					<li class="p-b-9">
						<a href="#" class="s-text7">Youtube</a>
					</li>
				</ul>
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