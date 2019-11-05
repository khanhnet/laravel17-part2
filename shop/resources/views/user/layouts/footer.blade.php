<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Về chúng tôi</h3>
								<p>Uy tín - Chất lượng.</p>
								<ul class="footer-links">
									<li><a href="javascript:;"><i class="fa fa-map-marker"></i>Hà Đông</a></li>
									<li><a href="javascript:;"><i class="fa fa-phone"></i>0975819200</a></li>
									<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>khanhnet2632000@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Danh mục</h3>
								<ul class="footer-links">
									@foreach($categories_parent as $category)
									<li><a href="{{ $category->id }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Thông tin</h3>
								<ul class="footer-links">
									<li><a href="#">Về chúng tôi</a></li>
									<li><a href="#">Liên hệ</a></li>
									<li><a href="#">Chính sách & điều khoản</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Dịch vụ</h3>
								<ul class="footer-links">
									<li><a href="#">Tài khoản của tôi</a></li>
									<li><a href="#">Giỏ hàng</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Đơn hàng</a></li>
									<li><a href="#">Hỗ trợ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="javascript:;"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="hjavascript:;" target="_blank">KNStore</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>