@extends('manager.layouts.master')

@section('title','Chi tiết sản phẩm')

@section('breadcrumbs')
@include('manager.layouts.components.breadcrumbs',[
        'title_page' => 'Chi tiết sản phẩm',
        'sub_page' => [
            ['url' => route('manager.products.index'), 'name' => 'Danh sách sản phẩm'],
            ['url' => '', 'name' => 'Chi tiết sản phẩm'],
        ]
])
@endsection
@push('styles')
    <style>
        table, th, td {
            vertical-align: center !important;
            }
    </style>
@endpush

@section('main')
<!--begin::Portlet-->

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-list-1"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Chi tiết sản phẩm
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <a href=" {{url()->previous()}} " class="btn btn-clean btn-icon-sm">
                    <i class="la la-long-arrow-left"></i>
                    Quay lại
                </a>
                &nbsp;
                <div class="dropdown dropdown-inline">
                    <a type="button" class="btn btn-brand btn-icon-sm" href="{{ route('manager.products.create') }}">
                        <i class="flaticon2-plus"></i> Thêm mới
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__content table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>Mã vạch</th>
                            <th>Nồng độ</th>
                            <th>Dung tích</th>
                            <th>Năm sản xuất</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Tồn kho</th>
                            <th>Nhãn hiệu</th>
                            <th>Loại sản phẩm</th>
                            <th>Bán chạy</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$data->id}}</td>
                                <td width="10%">
                                    <img class="w-100 img-fluid" src="{{ asset('storage/'.$data->image) }}"/>
                                </td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->barcode}}</td>
                                <td>{{$data->abv}}</td>
                                <td>{{$data->size->size}}ml</td>
                                <td>{{$data->vintage}}</td>
                                <td>{{number_format($data->price)}}VNĐ</td>
                                <td>{{$data->sale}}%</td>
                                <td>{{$data->instock}}</td>
                                <td>{{$data->brand->name}}</td>
                                <td>{{$data->sub_category->name}}</td>
                                <td>
                                    @if ($data->bestseller)
                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">
                                        <i class="flaticon2-check-mark"></i>
                                    </span>
                                @endif
                                </td>
                                
                            </tr>
                                           
                    </tbody>
                </table>
            </div>
        </div>

        <!--end::Section-->
    </div>

    <!--end::Form-->
</div>

<!--end::Portlet-->
@endsection
