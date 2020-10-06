@extends('manager.layouts.master')

@section('title','Thêm dung tích')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
    'title_page' => 'Thêm dung tích',
    'sub_page' => [
        ['url' => route('manager.others.sizes.index'), 'name' => 'Danh sách dung tích'],
        ['url' => '', 'name' => 'Thêm dung tích'],
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
                    Thêm dung tích
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
        <form class="kt-form" method="POST" action=" {{ route('manager.others.sizes.store') }} ">
            @csrf
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" autofocus placeholder="Nhập dung tích">
                            @error('size')
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
                            <a type="button" href="{{ route('manager.others.sizes.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
