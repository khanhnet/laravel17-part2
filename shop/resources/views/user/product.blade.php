@extends('user.layouts.master')
@section('breadcrumb')
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="/">Trang chủ</a></li>
					<li><a href="/category/{{$product->category->slug}}">{{ $product->category->name }}</a></li>
					<li class="active">{{ $product->name }}</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection

@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					@foreach($product->images as $image)
					<div class="product-preview">
						<img src="{{ $image->path }}" alt="">
					</div>
					@endforeach


				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					@foreach($product->images as $image)
					<div class="product-preview">
						<img src="{{ $image->path }}" alt="">
					</div>
					@endforeach
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{ $product->name }}</h2>
					<div>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<a class="review-link" href="#">10 Review(s) | Add your review</a>
					</div>
					<div>
						<h3 class="product-price">{{ number_format($product->price) }} VNĐ</h3>
						@if($product->amount>0)
						<span class="product-available">Còn hàng</span>
						@else
						<span class="product-available">Hết hàng</span>
						@endif
					</div>


					{{-- <div class="product-options">
						<label>
							Size
							<select class="input-select">
								<option value="0">X</option>
							</select>
						</label>
						<label>
							Color
							<select class="input-select">
								<option value="0">Red</option>
							</select>
						</label>
					</div> --}}

					<div class="add-to-cart">
						<div class="qty-label">
							SL
							<div class="input-number">
								<input type="number" id="number_buy">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
						@if($product->amount>0)
						<button   class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
						@endif
					</div>

					<ul class="product-btns">
						<li><a href="#"><i class="fa fa-heart-o"></i> Bookmark</a></li>
						<li><a href="#"><i class="fa fa-exchange"></i> So sánh</a></li>
					</ul>

					<ul class="product-links">
						<li>Danh mục:</li>
						<li><a href="/category/{{ $product->category->slug }}">{{ $product->category->name }}</a></li>
					</ul>

					<ul class="product-links">
						<li>Share:</li>
						<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-envelope"></i></a></li>
					</ul>

				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
						<li><a data-toggle="tab" href="#tab2">Chi tiết</a></li>
						<li><a data-toggle="tab" href="#tab3">Nhận xét</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p>{!! $product->description !!}</p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->

						<!-- tab2  -->
						<div id="tab2" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									@foreach($product->options as $option)
									<p>{{$option->name}}-{{$option->value}}</p>
									@endforeach
								</div>
							</div>
						</div>
						<!-- /tab2  -->

						<!-- tab3  -->
						<div id="tab3" class="tab-pane fade in">
							<div class="row">
								<!-- Rating -->
								<div class="col-md-3">
									<div id="rating">
										<div class="rating-avg">
											<span>4.5</span>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<ul class="rating">
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 80%;"></div>
												</div>
												<span class="sum">3</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 60%;"></div>
												</div>
												<span class="sum">2</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
										</ul>
									</div>
								</div>
								<!-- /Rating -->

								<!-- Reviews -->
								<div class="col-md-6">
									<div id="reviews">
										<ul class="reviews">
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
										</ul>
										<ul class="reviews-pagination">
											<li class="active">1</li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- /Reviews -->

								<!-- Review Form -->
								<div class="col-md-3">
									<div id="review-form">
										<form class="review-form">
											<input class="input" type="text" placeholder="Your Name">
											<input class="input" type="email" placeholder="Your Email">
											<textarea class="input" placeholder="Your Review"></textarea>
											<div class="input-rating">
												<span>Đánh giá của bạn: </span>
												<div class="stars">
													<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
													<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
													<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
													<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
													<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
												</div>
											</div>
											<button class="primary-btn">Xác nhận</button>
										</form>
									</div>
								</div>
								<!-- /Review Form -->
							</div>
						</div>
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection
@section('content-related')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Sản phẩm liên quan</h3>
				</div>
			</div>
			@foreach($product_concern as $product)
			<!-- product -->
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{ $product->images[0]->path }}" alt="">
						<div class="product-label">
							<span class="sale">-30%</span>
						</div>
					</div>
					<div class="product-body">
						<p class="product-category">{{ $product->category->name }}</p>
						<h3 class="product-name"><a href="/product/{{ $product->slug }}">{{ $product->name }}</a></h3>
						<h4 class="product-price">{{ number_format($product->price) }} VNĐ</h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Bookmark</span></button>
							<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">So sánh</span></button>
							<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Chi tiết</span></button>
						</div>
					</div>
					<div class="add-to-cart">
						<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
					</div>
				</div>
			</div>
			<!-- /product -->
			@endforeach
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection

