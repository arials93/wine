@extends('manager.layouts.master')

@section('title','Sửa loại sản phẩm con')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
        'title_page' => 'Sửa loại sản phẩm con',
        'sub_page' => [
            ['url' => route('manager.products.sub_categories.index'), 'name' => 'Danh sách loại sản phẩm con'],
            ['url' => '', 'name' => 'Sửa loại sản phẩm con'],
        ]
])
@endsection

@section('main')
<!--begin::Form-->
<form class="kt-form row" method="POST" enctype="multipart/form-data" action="{{ route('manager.products.sub_categories.update',['sub_category' => $sub_category->id]) }}">
    @method('PUT')
    @csrf
    <div class="col-md-4">
        <div class="kt-portlet">
            <div class="kt-portlet__body"> 
                <div class="kt-section kt-section--first">
                    <h3 class="kt-section__title">Chọn hình ảnh tải lên</h3>
                    <label class="kt-section__body w-100">
                        <img width="100%" src="{{ asset('storage/'.$sub_category->image) }}" id="review-img"/>
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
                        Sửa loại sản phẩm con
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
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    autofocus value="{{old('name') ? old('name') : $sub_category->name}}" placeholder="Nhập tên">
                    @error('name')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Loại sản phẩm</label>
                    <select class="form-control" name="category_id" id="exampleSelect1">
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}" 
                                {{old('category_id') == $item->id || $item->id == $sub_category->category_id ? 'selected' : '' }}
                                >{{$item->name}}
                            </option><!--Nếu xảy ra lỗi thì hiển thị lại lựa chọn trước đó-->
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <a type="button" href="{{ route('manager.products.sub_categories.index') }}"
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

</script>
@endpush
