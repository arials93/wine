@extends('store.layouts.master')

@section('title','Thanh toán')

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Giỏ hàng'],
			['name' => 'Xem giỏ hàng'],
			['name' => 'Thanh toán'],
        ]       
    ])

    <section class="ftco-section">
		<form action="{{ route('store.order') }}" method="POST" class="billing-form" class="container">
				<div class="row justify-content-center">
					<div class="col-xl-10 ftco-animate">
						<div class="billing-form" >
							@csrf
							<h3 class="mb-4 billing-heading">Chi tiết hóa đơn</h3>
							<div class="row align-items-end">
								<div class="col-md-6">
									<div class="form-check-inline">
										<label class="form-check-label" for="gift_check">
											Mua làm quà <input type="checkbox" id="gift_check" class="form-check-input" value="true"
														@if(old('is_gift') == "true") {{ 'checked' }} @endif name="is_gift">
									  </div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstname">Họ và tên</label>
										<input type="text" name="bill_name" class="form-control"
										value="@if(old('bill_name')) {{old('bill_name')}} @elseif(Auth::check()) {{ Auth::user()->name }} @endif"/>
										<span class="form-text @error('bill_name') text-danger @enderror">
											@error('bill_name') {{ $message }} @else {{ 'Nhập họ tên' }} @enderror
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phone">Số điện thoại</label>
										<input type="text" name="bill_phone" class="form-control" 
										value="@if(old('bill_phone')) {{old('bill_phone')}} @elseif(Auth::check()) {{ Auth::user()->phone }} @endif">
										<span class="form-text @error('bill_phone') text-danger @enderror">
											@error('bill_phone') {{ $message }} @else {{ 'Nhập số điện thoại' }} @enderror
										</span>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="emailaddress">Địa chỉ Email</label>
										<input name="email" type="text" class="form-control" 
										value="@if(old('email')) {{old('email')}} @elseif(Auth::check()) {{ Auth::user()->email }} @endif">
										<span class="form-text @error('email') text-danger @enderror">
											@error('email') {{ $message }} @else {{ 'Nhập số địa chỉ email' }} @enderror
										</span>
									</div>
								</div>

								<div class="w-100"></div>
								<div id="gifted" class="col-md-12 mx-0 d-none">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstname">Họ và tên người nhận</label>
												<input type="text" name="ship_name" class="form-control"
												value="@if(old('ship_name')) {{old('ship_name')}} @endif"/>
												<span class="form-text @error('ship_name') text-danger @enderror">
													@error('ship_name') {{ $message }} @else {{ 'Nhập họ tên người nhận' }} @enderror
												</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="phone">Số điện thoại người nhận</label>
												<input type="text" name="ship_phone" class="form-control" 
												value="@if(old('ship_phone')) {{old('ship_phone')}} @endif">
												<span class="form-text @error('ship_phone') text-danger @enderror">
													@error('ship_phone') {{ $message }} @else {{ 'Nhập số điện thoại người nhận' }} @enderror
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="country">Địa chỉ</label>
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<input type="text" name="address" class="form-control"
											value="@if(old('address')) {{old('address')}} @elseif(Auth::check()) {{ Auth::user()->address }} @endif">
											<span class="form-text @error('address') text-danger @enderror">
												@error('address') {{ $message }} @else {{ 'Nhập địa chỉ' }} @enderror
											</span>
										</div>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Ghi chú</label>
										<textarea name="notes" class="form-control"></textarea>
										<span class="form-text @error('notes') text-danger @enderror">
											@error('notes') {{ $message }} @else {{ 'Nhập ghi chú' }} @enderror
										</span>
									</div>
								</div>
							</div>
						</div><!-- END -->
		
		
		
						<div class="row mt-5 pt-3 d-flex">
							<div class="col-md-6 d-flex">
								<div class="cart-detail cart-total p-3 p-md-4">
									<h3 class="billing-heading mb-4">Tổng thanh toán</h3>
									<p class="d-flex">
										<span>Phí giao hàng</span>
										<a href="#">Chính sách giao hàng</a>
									</p>
		
									<hr>
									<p class="d-flex total-price">
										<span>Tổng tiền</span>
										<span>{{ number_format(\Cart::getTotal())}} đ</span>
									</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="cart-detail p-3 p-md-4">
									<h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
												<label>
													Hiện tại của hàng chỉ hỗ trợ thanh toán:
													<br/>
													- Thanh toán qua tài khoản khi nhân viên gọi xác nhận đơn hàng.
													<br/>
													- Thanh toán tại cửa hàng.
												</label>
											</div>
										</div>
									</div>
									<p><button type="submit" class="btn btn-primary py-3 px-4">Đặt hàng</button></p>
								</div>
							</div>
						</div>
					</div> <!-- .col-md-8 -->
				</div>
			</form>
		</section>
@endsection

@push('scripts')
<script>
	$(document).ready(function() {
		show_addition_form($('#gift_check')[0]);
		$('#gift_check').change(function() {
			show_addition_form(this);
		});

		function show_addition_form(checker) {
			if(checker.checked) {
				$('#gifted').removeClass('d-none');
			} else {
				$('#gifted').addClass('d-none');
			}
		}
	});
</script>	
@endpush