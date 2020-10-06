@extends('manager.layouts.master')

@section('title','Sửa loại bài viết')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
    'title_page' => 'loại bài viết',
    'sub_page' => [
        ['url' => route('manager.blogs.blog_categories.index'), 'name' => 'Danh sách loại bài viết'],
        ['url' => '', 'name' => 'Sửa loại bài viết'],
    ]
])
@endsection

@section('main')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-edit"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Sửa loại bài viết
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <a href=" {{url()->previous()}} " class="btn btn-clean btn-icon-sm">
                        <i class="la la-long-arrow-left"></i>
                        Quay lại
                    </a>
                    &nbsp;
                    <div class="dropdown dropdown-inline">
                        <a type="button" class="btn btn-brand btn-icon-sm" href="{{ route('manager.blogs.blog_categories.create') }}">
                            <i class="flaticon2-plus"></i> Thêm mới
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!--begin::Form-->
        <form class="kt-form" method="POST" action="{{ route('manager.blogs.blog_categories.update',['blog_category' => $blog_category->id]) }}">
            @method('PUT')
            @csrf
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{old('name') ? old('name') : $blog_category->name}}" placeholder="Nhập tên">
                             
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                            <a type="button" href="{{ route('manager.blogs.blog_categories.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
