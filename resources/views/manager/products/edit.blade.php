@extends('manager.layouts.master')

@section('title','Sửa sản phẩm')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
        'title_page' => 'Sửa sản phẩm',
        'sub_page' => [
            ['url' => route('manager.products.index'), 'name' => 'Danh sách sản phẩm'],
            ['url' => '', 'name' => 'Sửa sản phẩm'],
        ]
])
@endsection

@section('main')
<!--begin::Form-->
<form class="kt-form row" method="POST" enctype="multipart/form-data" action="{{ route('manager.products.update',['product' => $product->id]) }}">
    @method('PUT')
    @csrf
    <div class="col-md-4">
        <div class="kt-portlet">
            <div class="kt-portlet__body"> 
                <div class="kt-section kt-section--first">
                    <h3 class="kt-section__title">Chọn hình ảnh tải lên</h3>
                    <label class="kt-section__body w-100">
                        <img width="100%" src="{{ asset('storage/'.$product->image) }}" id="review-img"/>
                        <input type="file" id="take-img" name="image" hidden/>
                    </label>
                    <p class="form-text @error('image') text-danger @enderror text-center">
                        @error('image') 
                        {{ $message }} @else {{ 'Vui lòng chọn hình ảnh' }}
                        @enderror
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-plus-1 "></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Sửa sản phẩm
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <a href=" {{ url()->previous() }} " class="btn btn-clean btn-icon-sm">
                            <i class="la la-long-arrow-left"></i>
                            Quay lại
                        </a>
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Tên</label>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus 
                        value="{{old('name') ? old('name') : $product->name}}" placeholder="Nhập tên">

                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Mã vạch</label>
                    <div class="col-lg-6">
                        <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" autofocus 
                        value="{{old('barcode') ? old('barcode') : $product->barcode}}" placeholder="Nhập mã vạch">
    
                        @error('barcode')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>                   
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Nồng độ</label>
                    <div class="col-lg-6">
                        <input type="text" name="abv" class="form-control @error('abv') is-invalid @enderror" autofocus 
                        value="{{old('abv') ? old('abv') : $product->abv}}" placeholder="Nhập nồng độ cồn">
    
                        @error('abv')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>                  
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Dung tích</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="size_id">
                            @foreach ($sizes as $item)
                                <option value="{{$item->id}}" {{old('size_id') == $item->id || $item->id == $product->size_id? 'selected':'' }}>
                                    {{$item->size}} ml<!--Nếu xảy ra lỗi thì hiển thị lại lựa chọn trước đó-->
                                </option>
                            @endforeach
                        </select>
                        @error('size_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Niên vụ</label>
                    <div class="col-lg-6">
                        <input type="text" name="vintage" class="form-control @error('vintage') is-invalid @enderror" autofocus 
                        value="{{old('vintage') ? old('vintage') : $product->vintage}}" placeholder="Nhập năm sản xuất">

                        @error('vintage')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Đơn giá</label>
                    <div class="col-lg-6">
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" autofocus 
                        value="{{ old('price') ? old('price') : $product->price}}" placeholder="Nhập đơn giá">

                        @error('price')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Giảm giá</label>
                    <div class="col-lg-6">
                        <input type="text" name="sale" class="form-control @error('sale') is-invalid @enderror" autofocus 
                        value="{{old('sale') ? old('sale') : $product->sale}}" placeholder="Nhập tỉ lệ giảm giá">

                        @error('sale')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Tồn kho</label>
                    <div class="col-lg-6">
                        <input type="text" name="instock" class="form-control @error('instock') is-invalid @enderror" autofocus 
                        value="{{old('instock') ? old('instock') : $product->instock}}" placeholder="Nhập số lượng tồn">

                        @error('instock')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Sản phẩm thuộc:</label>
                    <div class="col-lg-6">
                        <div class="kt-radio-inline">
                            <label class="kt-radio kt-radio--bold kt-radio--success">
                                <input type="radio" value="true"  @if ($product->bestseller) checked @endif value="true" name="bestseller"> 
                                    Sản phẩm bán chạy
                                <span></span>
                            </label>
                            <label class="kt-radio kt-radio--bold kt-radio--brand">
                                <input type="radio" value="false" @if (!$product->bestseller) checked @endif value="false" name="bestseller">
                                    Sản phẩm thường
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Loại sản phẩm</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="sub_category_id">
                            @foreach ($sub_categories as $item)
                                <option value="{{$item->id}}" 
                                    {{old('sub_category_id') == $item->id || $item->id == $product->sub_category_id ? 'selected':'' }}>
                                    {{$item->name}} <!--Nếu xảy ra lỗi thì hiển thị lại lựa chọn trước đó-->
                                </option>
                            @endforeach
                        </select>
                        @error('sub_category_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Nhãn hiệu</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="brand_id">
                            @foreach ($brands as $item)
                                <option value="{{$item->id}}" {{old('brand_id') == $item->id || $item->id == $product->brand_id? 'selected':'' }}>
                                    {{$item->name}} <!--Nếu xảy ra lỗi thì hiển thị lại lựa chọn trước đó-->
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Miêu tả</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea type="text" name="description" class="form-control summernote" placeholder="Nhập miêu tả">
                            {{ old('description') ? old('description') : $product->description }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <a type="button" href="{{ route('manager.products.index') }}"
                        class="btn btn-secondary">Hủy bỏ</a>
                </div>
            </div>
        </div>
    </div>
    
</form>
<!--end::Form-->
@endsection

@push('scripts')
<script>
    review_img();

    $('.summernote').summernote({
        height: 150
    });
</script>
@endpush
