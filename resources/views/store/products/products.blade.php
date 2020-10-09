@extends('store.layouts.master')

@section('title','Sản phẩm')

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
@endpush

@section('main')
    @include('store.layouts.components.wrap-page')

    <section class="ftco-section">
		<div class="container">
			<div class="row">
                <div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Product Types</h3>
							<ul class="p-0">
								<li><a href="#">Brandy <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Gin <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Rum <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Tequila <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Vodka <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Whiskey <span class="fa fa-chevron-right"></span></a></li>
							</ul>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3>Recent Blog</h3>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
										blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
									<div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
										blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
									<div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
										blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
									<div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
								</div>
							</div>
						</div>
					</div>
                </div>
                
				<div class="col-md-9">
					<div class="row mb-4">
						<div class="col-md-12 d-flex justify-content-between align-items-center">
							<h4 class="product-select">Select Types of Products</h4>
							<select class="selectpicker" multiple>
								<option>Brandy</option>
								<option>Gin</option>
								<option>Rum</option>
								<option>Tequila</option>
								<option>Vodka</option>
								<option>Whiskey</option>
							</select>
						</div>
					</div>
					<div class="row">
						@foreach ($products as $item)
							<div class="col-md-4 d-flex">
								@include('store.layouts.components.product')
							</div>
						@endforeach					
                    </div>
                    <!-- Phân trang -->
					<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								{{ $products->links('vendor.pagination.store-paginate') }} <!--Khi tìm kiếm vẫn giữ lại query cũ khi chuyển trang-->
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</section>
@endsection

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endpush