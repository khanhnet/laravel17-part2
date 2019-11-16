@extends('user.layouts.master')

@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Trang cá nhân</h3>
					</div>
					<form>
						<div class="text-center">
							
						<img id="add_holder" style="margin-top:15px;max-height:100px;" src="{{ $customer->image }}">
						</div>
						<div class="form-group">
							<div class="input-group">
								<input id="add_thumbnail" class="form-control" type="text" name="image" value="{{ $customer->image }}">
								<input type="button" id="add_lfm" data-input="add_thumbnail" data-preview="add_holder" value="Tải lên">
							</div>
						</div>
						<label>Học và tên</label>
						<div class="form-group">
							<input class="input" type="text" name="name" placeholder="Tên" value="{{ $customer->name }}">
						</div>
						<label>Email</label>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email" value="{{ $customer->email }}" readonly="">
						</div>
						<label>Địa chỉ</label>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Địa chỉ" value="{{ $customer->address }}">
						</div>
						<label>Số điện thoại</label>
						<div class="form-group">
							<input class="input" type="number" name="mobile" placeholder="Số điện thoại" value="{{ $customer->mobile }}">
						</div>
						<label>Ngày sinh</label>
						<div class="form-group">
							<input class="input" type="date" name="birthday" value="{{ date('Y-m-d', strtotime($customer->birthday)) }}">
						</div>
						<label>Giới tính</label>
						<select class="form-control" name="gender">
							<option value="1" @if($customer->gender==1) selected @endif>Nam</option>
							<option value="0" @if($customer->gender==0) selected @endif>Nữ</option>
							<option value="2" @if($customer->gender==2) selected @endif>Khác</option>
						</select>
						<br>
						<button type="submit" class="primary-btn order-submit">Lưu</button>
					</form>
				</div>

			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Đổi mật khẩu</h3>
				</div>
				<form>
					<label>Mật khẩu cũ</label>
					<div class="form-group">
						<input class="input" type="password" name="old_password">
					</div>
					<label>Mật khẩu mới</label>
					<div class="form-group">
						<input class="input" type="password" name="new_password">
					</div>
					<button type="submit" class="primary-btn order-submit">Lưu</button>
				</form>

			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection
@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $('#add_lfm').filemanager('image');
</script>
@endsection

