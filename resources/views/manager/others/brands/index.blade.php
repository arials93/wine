@extends('manager.layouts.master')

@section('title','Danh sách nhãn hiệu')

@section('breadcrumbs')
    @include('manager.layouts.components.breadcrumbs',[
            'title_page' => 'Nhãn hiệu',
            'sub_page' => [
                ['url' => '', 'name' => 'Danh sách nhãn hiệu'],
            ]
    ])
@endsection

@section('main')
<!--begin::Portlet-->
@if (session('message'))
    <div class="alert alert-success alert-bold fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-interface-5"></i></div>
        <div class="alert-text">{{ session('message') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-list-1"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Danh sách nhãn hiệu
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
                    <a type="button" class="btn btn-brand btn-icon-sm" href="{{ route('manager.others.brands.create') }}">
                        <i class="flaticon2-plus"></i> Thêm mới
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Search Form -->
        <form class="row">
            <div class="kt-margin-t-20 kt-margin-b-10 d-inline-flex col-lg-3">
                <div class="kt-input-icon kt-input-icon--left">
                <input name="search" value="{{request()->search}}"
                    type="text" class="form-control" placeholder="Tìm kiếm theo tên..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
                        <span><i class="la la-search"></i></span>
                    </span>
                </div>
            </div>        
            <div class="kt-margin-t-20 kt-margin-b-10 d-inline-flex col-lg-3">
                <select class="form-control" name="country" id="exampleSelect1">
                    <option value="0">Tất cả quốc gia</option>
                    @foreach ($countries as $item)
                        <option @if (request()->country == $item->id) selected @endif 
                            value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach                   
                </select>
            </div>
            <div class="kt-margin-t-20 kt-margin-b-10 d-inline-flex col-lg-3">
                <button type="submit" class="btn btn-primary btn-hover-brand"> 
                    <span>Lọc</span>
                </button>
            </div>          
        </form>
        <!--end: Search Form -->
    </div>
    <div class="kt-portlet__body">
        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__content">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>Quốc gia</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tương tự foreach khi sử dụng thêm empty -->
                        @forelse ($datas as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td width="10%">
                                    <img class="w-100 img-fluid" src="{{ asset('storage/'.$item->image) }}"/>
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->country->name}}</td>
                                <td>
                                    <span style="overflow: visible; position: relative; width: 130px;">                                                             		                      
                                        <a href="{{ route('manager.others.brands.edit', ['brand'=>$item->id]) }}" title="Sửa" class="btn btn-sm btn-clean btn-icon btn-icon-md">		                      
                                            <i class="la la-edit"></i>		                  
                                        </a>
                                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Xóa" data-toggle="modal" data-target="#kt_modal_1_2_{{$item->id}}"> 
                                            <i class="la la-trash"></i>	
                                        </button>
                                        <!--begin::Modal-->
                                        <div class="modal fade" id="kt_modal_1_2_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form class="modal-content" method="POST" action="{{ route('manager.others.brands.destroy', ['brand'=>$item->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc muốn xóa loại sản phẩm này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-primary">Xóa</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            @empty
                                @if (request()->search || request()->country)
                                <tr>
                                    <td colspan="5">
                                        <span class="form-text text-danger text-center">
                                            Không có nhãn hiệu nào phù hợp với tìm kiếm trên
                                        </span>     
                                    </td>    
                                </tr>
                                @endif
                        @endforelse                  
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $datas->appends(request()->query())->links() }} <!--Khi tìm kiếm vẫn giữ lại query cũ khi chuyển trang-->
                </div>
            </div>
        </div>

        <!--end::Section-->
    </div>

    <!--end::Form-->
</div>

<!--end::Portlet-->
@endsection
