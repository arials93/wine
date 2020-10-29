@extends('store.layouts.master')

@section('title','Thanh toán thành công')

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Giỏ hàng'],
            ['name' => 'Xem giỏ hàng'],
            ['name' => 'Thanh toán'],
            ['name' => 'Thông báo đặt hàng']
        ]       
    ])
    <section class="ftco-section">
        <div class="container">
            <h3 class="text-center">Đặt hàng thành công</h3>
            <p class="text-center">Cảm ơn quý khách đã tin tưởng và sử dụng sản phẩm của chúng tôi</p>
            <p class="text-center">Chúng tôi sẽ liên lạc để xác nhận đơn hàng trong vòng 24h tới</p>
        </div>
    </section>
@endsection