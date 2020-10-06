@extends('manager.layouts.master')

@section('title','Thêm loại sản phẩm')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
    'title_page' => 'Thêm loại sản phẩm',
    'sub_page' => [
        ['url' => route('manager.products.categories.index'), 'name' => 'Danh sách loại sản phẩm'],
        ['url' => '', 'name' => 'Thêm loại sản phẩm'],
    ]
])
@endsection

@section('main')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-plus-1 "></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Thêm loại sản phẩm
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
    
        <!--begin::Form-->
        <form class="kt-form" method="POST" action=" {{ route('manager.products.categories.store') }} ">
            @csrf
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus placeholder="Nhập tên">
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
                            <a type="button" href="{{ route('manager.products.categories.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
