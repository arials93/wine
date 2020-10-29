@extends('store.layouts.master')

@section('title','Liên hệ')

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Liên hệ'],
            ['name' => 'Gửi liên hệ']
        ]       
    ])

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper px-md-4">
                        <div class="row mb-5">
                            @include('store.layouts.components.info-store')
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Liên hệ với chúng tôi</h3>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="{{ route('store.send') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Họ và tên</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                    value="{{ old('name') }}" name="name" id="name" placeholder="Nhập họ và tên">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                    value="{{ old('email') }}" name="email" id="email" placeholder="Nhập Email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Chủ đề</label>
                                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                                    value="{{ old('subject') }}" name="subject" id="subject" placeholder="Nhập chủ đề">

                                                    @error('subject')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Lời nhắn</label>
                                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" 
                                                    id="message" cols="30" rows="4" placeholder="Message">{{ old('description') }}</textarea>
                                                    
                                                    @error('message')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Gửi lời nhắn" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 order-md-first d-flex align-items-stretch">
                                <div id="map" class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7833339418153!2d106.68785931536071!3d10.82788626120119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528f7333a74e5%3A0x969a84549cd19f9e!2zNzggRMawxqFuZyBRdeG6o25nIEjDoG0sIFBoxrDhu51uZyA1LCBHw7IgVuG6pXAsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1603723744806!5m2!1svi!2s" 
                                    width="450" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="js/google-map.js"></script>
@endpush