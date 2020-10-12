@extends('store.layouts.master')

@section('title','Quên mật khẩu')

@section('main')
    @include('store.layouts.components.wrap-page')

    <section class="ftco-intro">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-4 d-flex">
					<div class="intro d-lg-flex w-100 ftco-animate">
						<div class="icon">
							<span class="flaticon-support"></span>
						</div>
						<div class="text">
							<h2>Online Support 24/7</h2>
							<p>A small river named Duden flows by their place and supplies it with the necessary
								regelialia.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="intro color-1 d-lg-flex w-100 ftco-animate">
						<div class="icon">
							<span class="flaticon-cashback"></span>
						</div>
						<div class="text">
							<h2>Money Back Guarantee</h2>
							<p>A small river named Duden flows by their place and supplies it with the necessary
								regelialia.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="intro color-2 d-lg-flex w-100 ftco-animate">
						<div class="icon">
							<span class="flaticon-free-delivery"></span>
						</div>
						<div class="text">
							<h2>Free Shipping &amp; Return</h2>
							<p>A small river named Duden flows by their place and supplies it with the necessary
								regelialia.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="card w-100">
                    <h2 class="card-header text-danger">{{ __('Thay đổi mật khẩu') }}</h2>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Email thay đổi mật khẩu đã được gủi đến mail của bạn') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection