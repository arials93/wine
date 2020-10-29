{{$title}}

<table style="width: 100%; margin: 30px 0;border-collapse: collapse;">
    <thead>
        <tr style="text-align: left">
            <th style="border: 1px solid black;">Tên sản phẩm</th>
            <th style="border: 1px solid black;">Đơn giá (đã tính giảm giá)</th>
            <th style="border: 1px solid black;">Giảm giá</th>
            <th style="border: 1px solid black;">Số lượng</th>
            <th style="border: 1px solid black;">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->bill_detais as $item)
        <tr>
            <td style="border: 1px solid black;">{{ $item->product->name }}</td>
            <td style="border: 1px solid black;">{{ number_format($item->price) }} ₫</td>
            <td style="border: 1px solid black;">{{ $item->sale}}%</td>
            <td style="border: 1px solid black;">{{ $item->quantity }}</td>
            <td style="border: 1px solid black;">{{ number_format($item->total) }} đ</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Mã đơn hàng: <b>{{$order->bill_code}}</b></p>
<p>Họ và tên: <b>{{$order->bill_name}}</b></p>
<p>Số điện thoại: <b>{{$order->bill_phone}}</b></p>
@if($order->ship_name && $order->ship_phone)
<p>Họ và tên người nhận: <b>{{$order->ship_name}}</b></p>
<p>Số điện thoại người nhận: <b>{{$order->ship_phone}}</b></p>
@endif
@if($order->notes)
<p>Ghi chú: <b>{{$order->notes}}</b></p>
@endif
<p style="margin-bottom: 30px">Tổng số tiền: <b>{{number_format($order->total)}}</b> đ</p>

{!! $content !!}

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Cảm ơn,<br>
{{ config('app.name') }}
@endif
