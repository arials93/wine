@extends('store.layouts.master')

@section('title','Thông tin cá nhân')

@push('styles')
    <style>
        /* Profile sidebar */
        .card {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .card img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 30%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }
            
        .card-menu {
            margin-top: 30px;
        }
        .nav-pills .nav-link {
            border-bottom: 1px solid #f0f4f7 !important;
            position: relative !important;
            display: block !important;
            padding:10px 15px !important;
            background: none !important;
            color:gray !important;
            font-size: 14px !important;
            font-weight: 400;
        }

        .nav-pills .nav-link.active {
            background: #b7472a !important;
            color: white !important;
            border-left: 2px solid black !important;
        }

        .nav-pills .nav-link:hover {
            color:black !important;
        }

        .nav-pills .nav-link i { 
            padding-right: 15px;
        }

        /* Profile Content */
        .card-content {
            background: #fff;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }
        
        .tab-content {
            margin-top: 0px;
        }

        #v-pills-home table {
            width: 100%;
        }
        #v-pills-home table ,th {
            color: #b7472a !important;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 600;
            height: 50px;
        }

        #v-pills-home table ,td {
            color: black !important;
            text-transform: none !important;
            font-size: 14px;
            font-weight: normal;
        }

        #v-pills-messages table ,th ,td {
            padding-left: 10px;
        }

    </style>
@endpush

@php
    $status_list = ['1' => 'Chờ xác nhận',
                    '2' => 'Đã xác nhận',
                    '3' => 'Đang giao',
                    '4' => 'Đã hoàn thành',
                    '5' => 'Đã hủy'];   
@endphp

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Thông tin cá nhân'],
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
                            <div class="col-md-4 pr-2">
                                <div class="card">
                                    <img  src="{{asset(Auth::user()->image ? 'storage/'.Auth::user()->image : 'store/images/user.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
                                        <p class="card-text text-center">Ngày đăng ký: {{Auth::user()->created_at->format('d-m-Y')}}</p>
                                    </div>
                                    <div class="card-menu">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" 
                                                role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-user"></i>Thông tin cá nhân</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" 
                                                role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-info"></i>Đổi thông tin</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" 
                                                role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-shopping-cart"></i>Lịch sử mua hàng</a>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-8 d-flex align-items-stretch">
                                <div class="card-content">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="contact-wrap w-100 p-md-5 p-4">
                                                <h3 class="mb-4">Thông tin cá nhân</h3>
                                                    <div class="row">
                                                        <table class="mx-3">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Họ tên</th>
                                                                    <td>{{Auth::user()->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Giới tính</th>
                                                                    <td>{{Auth::user()->gender?'Nam' : 'Nữ'}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Địa chỉ</th>
                                                                    <td>{{Auth::user()->address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Số điện thoại</th>
                                                                    <td>{{Auth::user()->phone}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{Auth::user()->email}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>                                                                 
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <div class="contact-wrap w-100 p-md-5 p-4">
                                                <h3 class="mb-4">Thay đổi thông tin cá nhân</h3>
                                                <form method="POST" name="contactForm" enctype="multipart/form-data" class="contactForm" action="{{ route('store.users.edit') }}" >
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="text-center">
                                                                <label style="width: 150px">
                                                                    <img width="100%" class="rounded-circle img-thumbnail" id="review-img"
                                                                    src="{{asset(Auth::user()->image ? 'storage/'.Auth::user()->image : 'store/images/user.jpg') }}"/>
                                                                    <input type="file" id="take-img" name="image" hidden/>
                                                                </label>
                                                                <p class="form-text @error('image') text-danger @enderror text-center">
                                                                    @error('image') 
                                                                        {{ $message }} @else {{ 'Vui lòng chọn hình ảnh' }}
                                                                    @enderror
                                                                </p>
                                                            </div>                                                           
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="name">Họ tên</label>
                                                                <input type="text" autofocus class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                                                placeholder="Họ tên" value="{{old("name") ? old("name") : Auth::user()->name}}">
                
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
                                                                <input class="form-control" disabled readonly id="email"
                                                                    placeholder="Email" value="{{Auth::user()->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="label" for="phone">Giới tính</label>
                                                                <span class="text-dark ml-5 mr-4 my-2">
                                                                    <input type="radio" @if (Auth::user()->gender) checked @endif value="true" name="gender"> Nam
                                                                </span>  
                                                                <span class="text-dark">
                                                                    <input type="radio" @if (!Auth::user()->gender) checked @endif value="false" name="gender"> Nữ
                                                                </span>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="phone">Số điện thoại</label>
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                                                                    placeholder="Sô điện thoại" 
                                                                    value="{{old("phone") ? old("phone") : Auth::user()->phone}}">
                                                                
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="address">Địa chỉ</label>
                                                                <textarea name="address" class="form-control" id="address" cols="30"
                                                                    rows="2" placeholder="Địa chỉ">{{old("address") ? old("address") : Auth::user()->address}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="password">Mật khẩu</label>
                                                                <input type="password" autofocus class="form-control @error('password') is-invalid @enderror" 
                                                                name="password" id="password"placeholder="Mật khẩu">
                
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="re-password">Nhập lại mật khẩu</label>
                                                                <input type="password" autofocus class="form-control @error('re-password') is-invalid @enderror" name="re-password" 
                                                                id="re-password" placeholder="Nhập lại mật khẩu">
                
                                                                @error('re-password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="submit" value="Lưu thông tin" class="btn btn-primary">
                                                                <div class="submitting"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            <div class="contact-wrap w-100 p-md-5 p-4">
                                                <h3 class="mb-4">Thông tin đơn hàng đã đặt</h3>
                                                    <div class="row">
                                                        <table class="table-bordered mx-3 w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Mã đơn hàng</th>
                                                                    <th>Ngày đặt</th>
                                                                    <th>Tổng tiền</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Thao tác</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               @foreach ($bills as $item)
                                                                    <tr>
                                                                        <td>{{strtotime($item->bill_code)}}</td>
                                                                        <td>{{$item->created_at->format('d-m-Y')}}</td>
                                                                        <td>{{number_format($item->total)}} ₫</td>
                                                                        <td> 
                                                                            @if($item->is_cancel) 
                                                                                {{$status_list[5]}}
                                                                            @elseif($item->receive_date)
                                                                                {{$status_list[4]}}
                                                                            @elseif($item->ship_date)
                                                                                {{$status_list[3]}}
                                                                            @elseif($item->confirm)
                                                                                {{$status_list[2]}}
                                                                            @else
                                                                                {{$status_list[1]}}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$item->id}}">
                                                                                Chi tiết
                                                                            </button>
                                                                            
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng {{strtotime($item->bill_code)}}</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <table id="table1" class="table-borderless mx-3">
                                                                                            @if ($item->ship_name)
                                                                                                <tr>
                                                                                                    <th>Người nhận</th>
                                                                                                    <td class="pl-5">{{$item->ship_name}}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>Số điện thoại người nhận</th>
                                                                                                    <td class="pl-5">{{$item->ship_phone}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                                <tr>
                                                                                                    <th>Địa chỉ</th>
                                                                                                    <td class="pl-5">{{$item->address}}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>Tổng tiền</th>
                                                                                                    <td class="pl-5">{{number_format($item->total)}} ₫</td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table id="table2" class="table-bordered mx-3" style="width: 95%">
                                                                                                <thead>                                                                                                   
                                                                                                    <tr>
                                                                                                        <th>Tên sản phẩm</th>
                                                                                                        <th>Số lượng</th>
                                                                                                        <th>Đơn giá</th>
                                                                                                        <th>Thành tiền</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    @foreach($item->bill_detais as $details)
                                                                                                    <tr>
                                                                                                        <td class="px-3">{{$details->product->name}}</td>
                                                                                                        <td class="px-3">{{$details->quantity}}</td>
                                                                                                        <td class="px-3">{{number_format($details->price)}} ₫</td>
                                                                                                        <td class="px-3">{{number_format($details->total)}} ₫</td>
                                                                                                    </tr>
                                                                                                    @endforeach                                      
                                                                                                </tbody>
                                                                                            </table>
                                                                                        
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                     
                                                                        </td>
                                                                    </tr>
                                                               @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div> 
                                                                                                                    
                                            </div>
                                        </div>
                                        
                                    </div>
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
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#review-img').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        function review_img() {
            $("#take-img").change(function() {
                readURL(this);
            });
        }

        review_img();
</script>
@endpush