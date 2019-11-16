<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="javascrip:;"><i class="fa fa-phone"></i> 0975819200</a></li>
				<li><a href="javascrip:;"><i class="fa fa-envelope-o"></i> khanhnet2632000@gmail.com</a></li>
				<li><a href="javascrip:;"><i class="fa fa-map-marker"></i>Hà Đông </a></li>
			</ul>
			<ul class="header-links pull-right">
				<li><a href="javascrip:;"><i class="fa fa-dollar"></i> VND</a></li>
				<li><a href="{{ route('getLoginCustomer') }}"><i class="fa fa-user-o"></i>
					@if(Auth::guard('customer')->check())
					{{ Auth::guard('customer')->user()->name }}
					@else
					Tài khoản của tôi
					@endif
				</a></li>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="/" class="logo">
							<img src="/admin/dist/img/logo.png" alt="NKStore" style="max-width: 100px">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form>
							<select class="input-select" style="max-width: 160px;">
								
								<option value="0">Danh mục</option>
								@foreach($categories_parent as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							<input class="input" placeholder="Tìm kiếm">
							<button class="search-btn">Tìm kiếm</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<!-- Wishlist -->
						<div>
							<a href="#">
								<i class="fa fa-heart-o"></i>
								<span>Bookmark</span>
								<div class="qty">2</div>
							</a>
						</div>
						<!-- /Wishlist -->

						<!-- Cart -->
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"></i>
								<span>Giỏ hàng</span>
								<div class="qty">
									{{ Cart::count()}}
								</div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list">
									@foreach(Cart::content() as $product)
									<div class="product-widget">
										<div class="product-img">
											<img src="/admin/dist/img/logo.png" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
											<h4 class="product-price"><span class="qty">{{ $product->qty }}X</span>{{ 
												number_format($product->price) }}</h4>
											</div>
											<button onclick=" window.location='/del/{{ $product->rowId }}'" class="delete"><i class="fa fa-close"></i></button>
										</div>
										@endforeach
									</div>
									<div class="cart-summary">
										<small>{{ Cart::count()}} sản phẩm được chọn(10% VAT)</small>
										<h5>Tổng giá: {{ Cart::total() }} VNĐ</h5>
									</div>
									<div class="cart-btns">
										<a href="#">Xem giỏ hàng</a>
										<a href="/checkout">Thanh toán  <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>