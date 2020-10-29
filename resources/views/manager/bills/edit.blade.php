@extends('manager.layouts.master')

@section('title','Chi tiết đơn hàng')

@php
    $route = '';
    if(!$data->confirm) {
        $route = route("manager.bills.confirm", $data->id);
    }elseif($data->confirm && !$data->ship_date) {
        $route = route("manager.bills.delivery", $data->id);
    } elseif ($data->ship_date) {
        $route = route("manager.bills.received", $data->id);
    }

@endphp

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
        'title_page' => 'Chi tiết đơn hàng',
        'sub_page' => [
            ['url' => route('manager.bills.index'), 'name' => 'Danh sách Đơn hàng'],
            ['url' => '', 'name' => 'Chi tiết đơn hàng'],
        ]
])
@endsection

@section('main')
@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif


@if (session('msg-error'))
    <div class="alert alert-warning">
        {{ session('msg-error') }}
    </div>
@endif
<div class="kt-portlet">
    <!--begin::Form-->

    <form class="kt-form" method="POST" action="{{ $route }}">
        @csrf
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <h3 class="kt-section__title">1. Thông tin đặt hàng:</h3>
                <div class="kt-section__body">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Khách hàng: </label>
                        <div class="col-lg-6">
                            <input type="text" readonly disabled value="{{ $data->bill_name  }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Số điện thoại: </label>
                        <div class="col-lg-6">
                            <input type="text" readonly disabled value="{{ $data->bill_phone  }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email: </label>
                        <div class="col-lg-6">
                            <input type="text" readonly disabled value="{{ $data->email  }}" class="form-control">
                        </div>
                    </div>

                    @if ($data->ship_name && $data->ship_phone)
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Tên người nhận: </label>
                        <div class="col-lg-6">
                            <input type="text" readonly disabled value="{{ $data->ship_name  }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Số điện thoại người nhận: </label>
                        <div class="col-lg-6">
                            <input type="text" readonly disabled value="{{ $data->ship_phone  }}" class="form-control">
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Địa chỉ: </label>
                        <div class="col-lg-6">
                            <textarea type="text" readonly disabled class="form-control">{{ $data->address  }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ghi chú: </label>
                        <div class="col-lg-6">
                            <textarea type="text" readonly disabled class="form-control">{{ $data->notes  }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Tổng tiền: </label>
                        <div class="col-lg-6">
                            <input type="text" readonly disabled value="{{ number_format($data->total) }} ₫" class="form-control font-weight-bold">
                        </div>
                    </div>
                    
                    @if ($data->ship_date)
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Chọn ngày nhận hàng:</label>
                        <div class="col-lg-6">
                            <input type="date" name="receive_date" @if($data->receive_date) readonly disabled @endif
                                value="{{ $data->receive_date ? $data->receive_date->format('Y-m-d') : '' }}" class="form-control">
                            @if(!$data->receive_date)
                            <span class="form-text @error('receive_date') text-danger @enderror">
                                @error('receive_date') {{ $message }} @else {{ 'Vui lòng chọn ngày nhận hàng' }} @enderror
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <h3 class="kt-section__title">2. Chi tiết đơn hàng:</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->bill_detais as $item)
                    <tr>
                        <th scope="row"> {{ $item->product->id }} </th>
                        <td>
                            @if ($item->product->deleted_at)
                                Không có
                            @else
                                <img width="120px" src="{{ Storage::url($item->product->image) }}"/>
                            @endif
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->price) }} ₫</td>
                        <td>{{ $item->sale}}%</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->total }}</td>
                        <td> 
                            @if ($item->product->deleted_at)
                            Sản phẩm đã xóa
                            @else <a class="btn btn-info" href="{{ route('manager.products.edit', $item->product->id) }}">
                                <i class="px-0 flaticon-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (!$data->is_cancel)
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-12">
                        @if($data->confirm)
                            <a href="#" disabled class="btn btn-success disabled">Đơn hàng đã được xác nhận</a>    
                        @else
                            <button type="submit" class="btn btn-success">Xác nhận đơn hàng</button>
                        @endif

                        @if($data->ship_date)
                            <a href="#" disabled class="btn btn-success disabled">Ngày giao hàng: {{$data->ship_date->format('d-m-Y')}}</a>    
                        @elseif($data->confirm)
                            <button type="submit" class="btn btn-success">Lập ngày giao</button>
                        @endif

                        @if($data->receive_date && $data->ship_date)
                            <a href="#" disabled class="btn btn-success disabled">Đơn hàng đã hoàn thành vào ngày: {{$data->receive_date->format('d-m-Y')}}</a>    
                        @elseif(!$data->receive_date && $data->ship_date)
                            <button type="submit" class="btn btn-success">Lập ngày nhận hàng</button>
                        @endif

                        @if(!$data->receive_date)
                            <a href="{{ route('manager.bills.delete', $data->id) }}" class="btn btn-secondary">Hủy đơn hàng</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </form>

    <!--end::Form-->
</div>
@endsection
