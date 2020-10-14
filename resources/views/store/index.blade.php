@extends('store.layouts.master')

@section('title','Trang chủ')

@push('styles')
<style>
    .testimony-section .owl-dots {
        display: none !important;
    }

    .testimony-wrap .user-img {
        width: 120px !important;
        height: 120px !important;
        border-radius: 0% !important;
    }
    .testimony-wrap {
        padding: 0px 0px;
        border: none; 
    }
    #carousel1 .carousel-indicators li {
        width: 10px;
        height: 10px;
        border-radius: 100%;
    }

    #carousel1 .carousel .carousel-inner {
        height: 750px;
    }

    #carousel1 .carousel-inner .carousel-item img {
        object-fit: cover;
        max-height: 750px;
    }

    @media(max-width:768px) {
        #carousel1 .carousel .carousel-inner {
            height: 300px;
        }
    }

    #carousel1 .carousel-inner .carousel-item .caption {
        z-index: 1000;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    #carousel1 .carousel-inner .carousel-item .caption h1,h4 {
        color: white;
    }
    #carousel2 .thumnail-slider {
        /* margin-left: 15px;
        margin-right: 15px;  */
        overflow: hidden;
    }
    #carousel2 .thumnail-slider img {
        width: 13%;
        box-shadow: 0px 0px 2px rgba(0,0,0,.3);
        border-radius:5px; 
        margin: 3px;
    }
    #carousel2 .carousel-control-next {
        right: -8%;
        filter: invert(100%);
    }
    #carousel2 .carousel-control-prev {
        left: -8%;
        filter: invert(100%);
    }

</style>
@endpush

@section('main')
<!-- Slider -->
<div id="carousel1" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/bg_2.jpg" alt="First slide">
            <div class="caption">
                <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span></h1>
                <h4 class="mb-4">Red lips <span>and</span> Wine slips</h4>
                <p>
                    <a href="#" class="btn btn-primary ">Shop Now</a> 
                    <a href="#" class="btn btn-white btn-outline-white">Read more</a>
                </p>              
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/bg_1.jpg" alt="Second slide">
            <div class="caption">
                <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span></h1>
                <h4 class="mb-4">Red lips <span>and</span> Wine slips</h4>
                <p>
                    <a href="#" class="btn btn-primary ">Shop Now</a> 
                    <a href="#" class="btn btn-white btn-outline-white">Read more</a>
                </p>              
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/bg_2.jpg" alt="Third slide">
            <div class="caption">
                <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span></h1>
                <h4 class="mb-4">Red lips <span>and</span> Wine slips</h4>
                <p>
                    <a href="#" class="btn btn-primary ">Shop Now</a> 
                    <a href="#" class="btn btn-white btn-outline-white">Read more</a>
                </p>              
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Chính sách công ty -->
<section class="ftco-intro">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex">
                <div class="intro d-lg-flex w-100 ftco-animate">
                    <div class="icon">
                        <span class="flaticon-support"></span>
                    </div>
                    <div class="text">
                        <h2>Tư vấn 24/7</h2>
                        <p>Gọi ngay 0924645654</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="intro color-1 d-lg-flex w-100 ftco-animate">
                    <div class="icon">
                        <span class="flaticon-cashback"></span>
                    </div>
                    <div class="text">
                        <h2>Chính sách đổi trả</h2>
                        <p>
                            Đổi trả miễn phí trong 3 ngày
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="intro color-2 d-lg-flex w-100 ftco-animate">
                    <div class="icon">
                        <span class="flaticon-free-delivery"></span>
                    </div>
                    <div class="text">
                        <h2>Vận chuyển miễn phí</h2>
                        <p>
                            Đối với đơn hàng trên 500k 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Giới thiệu -->
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center"
                style="background-image: url(images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
                <div class="heading-section">
                    <span class="subheading">Since 1905</span>
                    <h2 class="mb-4">Desire Meets A New Taste</h2>

                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin
                        would be the word "and" and the Little Blind Text should turn around and return to its own,
                        safe country.</p>
                    <p class="year">
                        <strong class="number" data-number="115">0</strong>
                        <span>Years of Experience In Business</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Các loại rượu ngoại -->
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Các lựa chọn cao cấp</span>
                <h2>Nhãn hiệu rượu ngoại</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($menu_cates as $item)
                @if ($item->id == 2)
                    @foreach ($item->sub_categories as $sub_cate)
                        <div class="col-lg-2 col-md-4 ">
                            <div class="sort w-100 text-center ftco-animate">
                                <div class="img" style="background-image: url({{Storage::url($sub_cate->image)}});"></div>
                                <h3>{{$sub_cate->name}}</h3>
                            </div>
                        </div>
                    @endforeach                  
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Danh sách rượu vang -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Các sản phẩm của chúng tôi</span>
                <h2>Rượu Vang</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-3 d-flex">
                    @include('store.layouts.components.product')
                </div>
            @endforeach    
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="product.html" class="btn btn-primary d-block">View All Products <span
                        class="fa fa-long-arrow-right"></span></a>
            </div>
        </div>
    </div>
</section>

<!-- Các nhãn hiệu -->

<section class="ftco-section testimony-section img" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Các lựa chọn cao cấp</span>
                <h2 class="mb-3">Nhãn hiệu</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach ($brands as $item)
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="text">                                   
                                <div class="d-flex align-items-center text-center">
                                    <div class="user-img" style="background-image: url({{Storage::url($item->image)}})"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bài viết -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Các bài viết gần đây</span>
                <h2>Bài viết</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($blogs as $item)
                @include('store.layouts.components.blog')
            @endforeach
        </div>
    </div>
</section>
@endsection

