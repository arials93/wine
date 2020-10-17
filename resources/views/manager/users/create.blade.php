@extends('manager.layouts.master')

@section('title','Thêm người dùng')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
        'title_page' => 'Thêm người dùng',
        'sub_page' => [
            ['url' => route('manager.users.index'), 'name' => 'Danh sách người dùng'],
            ['url' => '', 'name' => 'Thêm người dùng'],
        ]
])
@endsection

@section('main')
<!--begin::Form-->
<form class="kt-form row" method="POST" enctype="multipart/form-data" action="{{ route('manager.users.store') }}">
    @csrf
    <div class="col-md-4">
        <div class="kt-portlet">
            <div class="kt-portlet__body"> 
                <div class="kt-section kt-section--first">
                    <h3 class="kt-section__title">Chọn hình ảnh tải lên</h3>
                    <label class="kt-section__body w-100">
                        <img width="100%" src="{{ asset('store/images/user.jpg') }}" id="review-img"/>
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
                        Thêm người dùng
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
                <div class="kt-section kt-section--first">
                    <h4 class="kt-section__title">1. Thông tin tài khoản:</h4>
                    <div class="kt-section__body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Họ và Tên</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus 
                                value="{{old('name')}}" placeholder="Nhập họ và tên">

                                @error('name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Giới tính</label>
                            <div class="col-lg-6">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--bold kt-radio--success">
                                        <input type="radio" value="true" {{ old('gender') == '0' ? '' : 'checked' }} checked name="gender"> Nam
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--bold kt-radio--brand">
                                    <input type="radio" value="false" {{ old('gender') == '0' ? 'checked' : '' }} name="gender"> Nữ
                                        <span></span>
                                    </label>
                                </div>
                            </div>                  
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Địa chỉ</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea type="text" name="address" class="form-control" rows="2"
                                placeholder="Nhập địa chỉ">{{ old('address') }}</textarea>

                                @error('address')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Số điện thoại</label>
                            <div class="col-lg-6">
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" autofocus 
                                value="{{old('phone')}}" placeholder="Nhập số điện thoại">
            
                                @error('phone')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>                   
                        </div>
                    </div>
                    <h4 class="kt-section__title">2. Thông tin đăng nhập:</h4>
                    <div class="kt-section__body">     
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-6">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" autofocus 
                                value="{{old('email')}}" placeholder="Nhập email">

                                @error('email')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Mật khẩu</label>
                            <div class="col-lg-6">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" autofocus 
                                autocomplete="off" placeholder="Nhập mật khẩu">

                                @error('password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nhập lại mật khẩu</label>
                            <div class="col-lg-6">
                                <input type="password" name="re-password" class="form-control @error('re-password') is-invalid @enderror" autofocus 
                                autocomplete="off" placeholder="Nhập lại mật khẩu">

                                @error('re-password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Người dùng thuộc:</label>
                            <div class="col-lg-6">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--bold kt-radio--success">
                                        <input type="radio" value="true" {{ old('is_admin') == '0' ? '' : 'checked' }} checked name="is_admin"> 
                                            Nhân viên
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--bold kt-radio--brand">
                                        <input type="radio" value="false" {{ old('is_admin') == '0' ? 'checked' : '' }} name="is_admin">
                                            Khách hàng
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <a type="button" href="{{ route('manager.users.index') }}"
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
