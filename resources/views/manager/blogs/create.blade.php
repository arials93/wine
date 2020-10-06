@extends('manager.layouts.master')

@section('title','Thêm bài viết')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
        'title_page' => 'Thêm bài viết',
        'sub_page' => [
            ['url' => route('manager.blogs.index'), 'name' => 'Danh sách bài viết'],
            ['url' => '', 'name' => 'Thêm bài viết'],
        ]
])
@endsection

@section('main')
<!--begin::Form-->
<form class="kt-form row" method="POST" enctype="multipart/form-data" action="{{ route('manager.blogs.store') }}">
    @csrf
    <div class="col-md-4">
        <div class="kt-portlet">
            <div class="kt-portlet__body"> 
                <div class="kt-section kt-section--first">
                    <h3 class="kt-section__title">Chọn hình ảnh tải lên</h3>
                    <label class="kt-section__body w-100">
                        <img width="100%" src="{{ asset('manager/assets/media/wine_5.png') }}" id="review-img"/>
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
                        Thêm bài viết
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
                        value="{{old('name')}}" placeholder="Nhập tên">

                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Loại bài viết</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="blog_category_id">
                            @foreach ($blog_categories as $item)
                                <option value="{{$item->id}}" {{old('blog_category_id') == $item->id ? 'selected':'' }}>
                                    {{$item->name}}<!--Nếu xảy ra lỗi thì hiển thị lại lựa chọn trước đó-->
                                </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Tóm tắt</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea type="text" name="sub_description" class="form-control" rows="5"
                        placeholder="Nhập tóm tắt">{{ old('sub_description') }}</textarea>

                        @error('sub_description')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Miêu tả</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea type="text" name="description" class="form-control summernote" placeholder="Nhập miêu tả">
                            {{ old('description') }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <a type="button" href="{{ route('manager.blogs.index') }}"
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
