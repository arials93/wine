@extends('store.layouts.master')

@section('title','Sản phẩm')

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
	<style>
        .selectpicker-manual {
            color: black;
            cursor: pointer;
            background-color: #e2e6ea;
            border-color: #dae0e5;
            text-decoration: none;
            display: inline-block;
            padding: 0.375rem 0.75rem;
            border: 1px solid transparent;
            width: 100%;
        }
    </style>
@endpush

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Sản phẩm'],
            ['name' => 'Danh sách sản phẩm']
        ]       
    ])

    <section class="ftco-section">
		<div class="container">
			<form class="row">
				
                
				<div class="col-md-9">
					<div class="row mb-4">
						<div class="col-md-12 d-flex justify-content-between align-items-center">
							<h4 class="product-select"></h4>
							<select name="price_filter" class="selectpicker">
								<option value="asc">Giá từ thấp đến cao</option>
								<option value="desc">Giá từ cao xuống thấp</option>
							</select>
						</div>
					</div>
					<div class="row">
						@forelse ($products as $item)
							<div class="col-md-4 d-flex">
								@include('store.layouts.components.product')
							</div>
						@empty
							Không tìm thấy sản phẩm nào
						@endforelse				
                    </div>
                    <!-- Phân trang -->
					<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								{{ $products->appends(request()->query())->links('vendor.pagination.store-paginate') }} <!--Khi tìm kiếm vẫn giữ lại query cũ khi chuyển trang-->
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						{{-- <form class="categories" method="GET"> --}}
                            <h3>Tìm kiếm sản phẩm</h3>
                            @if (!request()->route('sub_category_id'))
                                <select name="sub_category" class="selectpicker-manual mb-4">
                                    <option value="0">Chọn loại sản phẩm</option>
                                    @foreach ($sub_categories as $item)
                                    <option {{ request()->sub_category == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                            <select name="size" class="selectpicker-manual mb-4">
                                <option value="0">Chọn dung tích</option>
                                @foreach ($sizes as $item)
                                <option {{ request()->size == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->size}} ml</option>
                                @endforeach
                            </select>

                            <select name="brand" class="selectpicker-manual mb-4">
                                <option value="0">Chọn nhãn hiệu</option>
                                @foreach ($brands as $item)
                                <option {{ request()->brand == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                            <input name="name" value="{{ request()->name ?? '' }}" class="selectpicker-manual mb-4" placeholder="Nhập tên sản phẩm"/>

                            <button class="btn btn-primary w-100" type="submit">Tìm kiếm</button>
						{{-- </form> --}}
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endpush