<!DOCTYPE html>
<html lang="en">

<head>
	<base href="/store/">
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
	@stack('styles')
</head>

<body>
	<!-- Nav -->
	<div class="wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-flex align-items-center">
					<p class="mb-0 phone pl-md-2">
						<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a>
						<a href="#"><span class="fa fa-paper-plane mr-1"></span> youremail@email.com</a>
					</p>
				</div>
				<div class="col-md-6 d-flex justify-content-md-end">
					<div class="social-media mr-4">
						<p class="mb-0 d-flex">
							<a href="#" class="d-flex align-items-center justify-content-center"><span
									class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span
									class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span
									class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span
									class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						</p>
					</div>
					<div class="reg">
						<p class="mb-0">
							@if (Route::has('login'))
                                @auth
                                    <a class="mx-2" title="Thông tin cá nhân" href="#">
                                        {{Auth::user()->email}} 
                                    </a>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> 
                                @else
                                    @if (Route::has('register'))
                                        <a class="mx-2" href="{{ route('register') }}">
                                            Đăng ký
                                        </a>
									@endif
									<a href="{{ route('login') }}">Đăng nhập</a>
                                @endauth
                            @endif
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="/">Wine <span>Shop</span></a>
			<div class="order-lg-last btn-group">
				<a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<span class="flaticon-shopping-bag"></span>
					<div class="d-flex justify-content-center align-items-center"><small id="show-cart-quantity">0</small></div>
				</a>
				<div class="dropdown-menu dropdown-menu-right" id="show-cart">
					<a class="dropdown-item text-center btn-link d-block w-100">
						Giỏ hàng trống
					</a>
				</div>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item @if (!Str::afterLast(url()->current(), 'localhost:8000')) active @endif">
						<a href="/" class="nav-link">Trang chủ</a>
					</li>
					
					@foreach ($menu_cates as $item)
					<li class="nav-item dropdown 
					@if (Str::contains(url()->current(), 'categories/'.$item->id.'/sub_categories')) active @endif">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$item->name}}
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							@foreach ($item->sub_categories as $sub_cate)
								<a class="dropdown-item" href="{{ route('store.products', ['category'=>$item->id,'sub_category'=>$sub_cate->id]) }}">
									{{$sub_cate->name}}
								</a>
							@endforeach
							<a class="dropdown-item" href="{{ route('store.products', ['category'=>$item->id,'sub_category'=>0]) }}">Xem tất cả</a>
						</div>
					</li>
					@endforeach					
					
					<li class="nav-item dropdown @if (Str::contains(url()->current(), 'blog_categories')) active @endif">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Bài viết</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							@foreach ($menu_blogs as $item)
							<a class="dropdown-item" href="{{ route('store.blogs', ['blog_category'=>$item->id]) }}">{{$item->name}}</a>
							@endforeach
							<a class="dropdown-item" href="{{ route('store.blogs', ['blog_category'=>0]) }}">Xem tất cả</a>
						</div>
					</li>
					<li class="nav-item @if (Str::contains(url()->current(), 'contact')) active @endif">
						<a href="{{ route('store.contact') }}" class="nav-link">Liên hệ</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END Nav -->

	@yield('main')

	<!-- Footer -->
	<footer class="ftco-footer">
		<div class="container">
			<div class="row mb-5">
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2 logo"><a href="#">Wine <span>Shop</span></a></h2>
						<p>Every empty bottle is filled with stories.</p>
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Tài khoản</h2>
						<ul class="list-unstyled">
							@if (Auth::check())
								<li>
									<span class="fa fa-chevron-right mr-2"></span>{{Auth::user()->email}} 
								</li>
								<li>
									<a title="Thông tin cá nhân" href="#">
										<span class="fa fa-chevron-right mr-2"></span>Thông tin cá nhân
									</a>
								</li>
								<li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									<span class="fa fa-chevron-right mr-2"></span>Đăng xuất
									</a>
								</li>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>								                                                         
							@else
								<li><a href="{{ asset('register') }}"><span class="fa fa-chevron-right mr-2"></span>Đăng ký</a></li>
								<li><a href="{{ asset('login') }}"><span class="fa fa-chevron-right mr-2"></span>Đăng nhập</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Quên mật khẩu</a></li>
							@endif
						</ul>
					</div>
				</div>

				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4 ml-md-3">
						<h2 class="ftco-heading-2">Bài viết</h2>
						<ul class="list-unstyled">
							@foreach ($menu_blogs as $item)
								<li><a href="{{ route('store.blogs', ['blog_category' => $item->id]) }}"><span class="fa fa-chevron-right mr-2"></span>{{$item->name}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Về chúng tôi</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Liên hệ</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Chính sách giao hàng</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Chính sách đổi trả</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Thông tin cửa hàng</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text">78 Dương Quảng Hàm, Phường 5, Quận Gò Vấp, TPHCM</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">0924645654</span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span
											class="text">ariasl93@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0 py-5 bg-black">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<p class="mb-0" style="color: rgba(255,255,255,.5);">
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- END Footer -->

	<!-- Loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>

	<div class="modal" id="info_modal">
		<div class="modal-dialog">
			<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body"></div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
			</div>
			
			</div>
		</div>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="js/main.js"></script>

	<script>
		var add_cart_url = "{{ route('store.cart.ajax.add') }}";
		var get_cart_url = "{{ route('store.cart.ajax.get') }}";
		var cart_index_url = "{{ route('store.cart') }}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$( document ).ready(function() {
			// thêm sản phẩm vào gió hàng khi bấm vào icon giỏ hàng ở mỗi sảng phẩm
			$(".add-to-cart").click(function(event) {
				event.preventDefault();
				var target = $(this);
				var product_detail = $('#product-details');
				var product_id = target.data('product-id');
				var quantity = 1;
				if(product_detail.length) {
					quantity = product_detail.find('#quantity').val();
				}
				$.ajax({
					method: "POST",
					url: add_cart_url,
					data: { product_id, quantity },
					success: function(response) {
						$('#info_modal').find('.modal-body').html("Sản phẩm đã được thêm vào giỏ hàng");
						$('#info_modal').modal('show'); 
						show_cart_on_menu(response.data);
					},
					error: function(err) {
						if(err.status == 400 && err.responseJSON.error_code == 'OUT_OF_STOCK') {
							$('#info_modal').find('.modal-body').html(err.responseJSON.message);
							$('#info_modal').modal('show'); 
						}
					}
				});
			});

			// lấy danh sách sản phẩm có trong giỏ hàng và hiển thị lên menu
			$.ajax({
				method: "GET",
				url: get_cart_url,
			}).done(function( response ) {
				show_cart_on_menu(response.data);
			});


			function show_cart_on_menu(cart) {
				var cart_content = "";
				var total_item = Object.keys(cart).length;
				$('#show-cart-quantity').html(total_item);
				for(key in cart) {
					var cart_item = cart[key];
					cart_content += (`
						<div class="dropdown-item d-flex align-items-start" href="#">
							<div class="img" style="background-image: url(/storage/${cart_item.associatedModel.image});"></div>
							<div class="text pl-3">
								<h4>${cart_item.name}</h4>
								<p class="mb-0"><a href="#" class="price">
									${cart_item.price.toLocaleString()} đ
									</a><span class="quantity ml-3">Quantity: ${cart_item.quantity}</span></p>
							</div>
						</div>
					`);
				}

				if(total_item > 0) {
					cart_content += (`
						<a class="dropdown-item text-center btn-link d-block w-100" href="${cart_index_url}">
							Mua hàng
							<span class="ion-ios-arrow-round-forward"></span>
						</a>
					`);
				} else {
					cart_content += (`
						<a class="dropdown-item text-center btn-link d-block w-100">
							Giỏ hàng trống
						</a>
					`);
				}

				$('#show-cart').html(cart_content);
			}

		});
	</script>
	@stack('scripts')
</body>

</html>