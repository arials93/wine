@extends('store.layouts.master')

@section('title','Giỏ hàng')

@section('main')
    @include('store.layouts.components.wrap-page')

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>total</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="page-cart-content">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>0 đ</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="total-price">{{number_format(\Cart::getTotal())}} đ</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ route('store.checkout') }}" class="btn btn-primary py-3 px-4">Proceed to
                            Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var update_cart_url = "{{route('store.cart.ajax.update')}}";
        var delete_cart_url = "{{route('store.cart.ajax.delete')}}";
        // lấy danh sách sản phẩm có trong giỏ hàng và hiển thị lên trang giỏ hàng
        $.ajax({
            method: "GET",
            url: get_cart_url,
        }).done(function( response ) {
            show_cart_on_page(response.data);
            apply_on_keyup_quantity();
            apply_on_click_delete();
        });

        function show_cart_on_page(cart) {
            var cart_content = "";
            for(key in cart) {
                var cart_item = cart[key];
                cart_content += (`
                    <tr class="item-cart" class="alert" role="alert">
                        <td>
                            <div class="img" style="background-image: url(/storage/${cart_item.associatedModel.image});"></div>
                        </td>
                        <td>
                            <div class="email">
                                ${cart_item.name}
                            </div>
                        </td>
                        <td>${cart_item.price.toLocaleString()} đ</td>
                        <td class="quantity">
                            <div class="input-group">
                                <input type="text" data-cart-id="${cart_item.id}" name="quantity" class="quantity form-control input-number"
                                value="${cart_item.quantity}" min="1" max="100">
                            </div>
                        </td>
                        <td class="sum-price">${(cart_item.price * cart_item.quantity).toLocaleString()} đ</td>
                        <td>
                            <button type="button" class="close cart-delete" data-cart-id="${cart_item.id}" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-close"></i></span>
                            </button>
                        </td>
                    </tr>
                `);
            }
            var total_item = Object.keys(cart).length;
            if(total_item <= 0) {
                cart_content = '<tr><td colspan="6">Giỏ hàng rỗng</td></tr>';
            }

            $('#page-cart-content').html(cart_content);
        }

        // khi giỏ hàng được load từ ajax lên các event thao tác với dom sẽ không thể thực hiên được
        // vì vậy sau khi load giao diện từ ajax lên html chúng ta phải gọi hàm này để đảm bảo event keyup hoạt động tốt
        function apply_on_keyup_quantity() {
            $('[name="quantity"]').keyup(function() {
                var target = $(this);
                var cart_id = target.data('cart-id');
                var quantity = target.val();
                if(quantity) {
                    // cập nhật só lượng sản phẩm
                    $.ajax({
                        method: "POST",
                        url: update_cart_url,
                        data: {cart_id, quantity}
                    }).done(function( response ) {
                        var cart_item = response.data[cart_id];
                        target.parents('.item-cart').find('.sum-price').html((cart_item.price * cart_item.quantity).toLocaleString() + ' đ');
                        $('#total-price').html(response.total.toLocaleString() + ' đ')
                    });
                }
            });
        }

        // khi giỏ hàng được load từ ajax lên các event thao tác với dom sẽ không thể thực hiên được
        // vì vậy sau khi load giao diện từ ajax lên html chúng ta phải gọi hàm này để đảm bảo event click hoạt động tốt
        function apply_on_click_delete() {
            $('.cart-delete').click(function() {
                var target = $(this);
                var cart_id = target.data('cart-id');
                // xóa sản phẩm trong giỏ hàng
                $.ajax({
                    method: "POST",
                    url: delete_cart_url,
                    data: {cart_id}
                }).done(function( response ) {
                    var total_item = Object.keys(response.data).length;
                    if(total_item) {
                        target.parents('.item-cart').remove();
                    } else {
                        $('#page-cart-content').html('<tr><td colspan="6">Giỏ hàng rỗng</td></tr>')
                    }

                    $('#total-price').html(response.total.toLocaleString() + ' đ')
                });
            });
        }
    </script>
@endpush
