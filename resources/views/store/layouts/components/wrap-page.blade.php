<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2"><a href="/">Trang chủ  <i class="fa fa-chevron-right"></i></a></span>
                    @foreach ($sub_page as $item)
                        @if ($loop->last)
                            <h2 class="mb-0 bread">{{$item['name']}}</h2>
                        @else
                            <span class="mr-2">{{$item['name']}}  <i class="fa fa-chevron-right"></i></span>
                        @endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</section>
