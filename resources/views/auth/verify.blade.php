@extends('store.layouts.master')

@section('title','Đăng ký')

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Đăng ký'],
            ['name' => 'Đăng ký tài khoản'],
            ['name' => 'Xác thực tài khoản']
        ]       
    ])

    <!--Chính sách công ty-->
    @include('store.layouts.components.intro')

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="card">
                    <h2 class="card-header text-danger">{{ __('Xác minh địa chỉ email của bạn') }}</h2>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                            </div>
                        @endif
    
                        {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.') }}
                        {{ __('Nếu bạn không nhận được email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('hãy nhấp vào đây để yêu cầu một email khác') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
