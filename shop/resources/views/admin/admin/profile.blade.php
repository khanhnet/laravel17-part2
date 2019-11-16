@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Trang cá nhân</h1>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')

<!-- Content -->
<div class="container-fluid">
	<!-- Main row -->
	<div class="row">

		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Trang cá nhân</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<div class="container my-4">
						<form role="form" method="post" action="javascript:;" id="form_update_admin" enctype="multipart/form-data">
							<div class="text-center">
								
								<img id="add_holder" src="{{ $user->image }}" class="rounded-circle" style="margin-top:15px;max-height:200px;margin: auto;">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Hình ảnh sản phẩm</label>
								<div class="input-group">
									<input type="button" id="add_lfm" data-input="add_thumbnail" data-preview="add_holder" value="Tải lên">
									<input id="add_thumbnail" class="form-control" type="text" name="image" 
									value="{{ $user->image }}">
								</div>
							</div>
							<p class="image-error error text-danger"></p>

							<div class="form-group">
								<label>Tên đầy đủ</label>
								<input type="text" name="name" class="form-control" placeholder="Điền học và tên" value="{{ $user->name}}">
								<p class="name-error text-danger"></p>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Điền email" 
								value="{{ $user->email}}">
								<p class="email-error text-danger"></p>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" >Giới tính</label>
								</div>
								<select class="custom-select" name="gender">
									<option value selected>Chọn giới tính</option>
									<option @if($user->gender==0)selected @endif  value="0">Nữ</option>
									<option @if($user->gender==1)selected @endif  value="1">Nam</option>
								</select>
							</div>
							<p class="gender-error text-danger"></p>

							<div class="form-group">
								<label>Số điện thoại</label>

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-phone"></i></span>
									</div>
									<input type="text" value="{{ $user->mobile}}" name="mobile" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask >
								</div>
								<p class="mobile-error text-danger"></p>
							</div>

							<div class="form-group">
								<label>Ngày sinh</label>

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
									</div>
									<input id="datemask" value="{{ date('d/m/Y', strtotime($user->birthday)) }}" type="text" name="birthday" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
								</div>
								<p class="birthday-error text-danger"></p>
							</div>

							<div class="form-group">
								<label>Địa chỉ</label>
								<input type="text" name="address" class="form-control" placeholder="Điền địa chỉ" 
								value="{{ $user->address}}">
								<p class="address-error text-danger"></p>
							</div>

							<button type="submit" class="btn btn-primary">Lưu</button>
						</form>
						<br>
						<hr>
						<br>
						<label>Đổi mật khẩu</label>
						<form role="form" method="post" action="javascript:;" id="form_change_password" enctype="multipart/form-data">
							
							<div class="form-group">
								<label>Mật khẩu cũ</label>
								<input type="password" name="old_password" class="form-control" placeholder="Điền mật khẩu">
								<p class="old_password-error text-danger"></p>
							</div>
							<div class="form-group">
								<label>Mật khẩu mới</label>
								<input type="password" id="new_password" name="new_password" class="form-control" placeholder="Điền mật khẩu">
								<p class="new_password-error text-danger"></p>
							</div>
							<div class="form-group">
								<label>Xác nhận mật khẩu mới</label>
								<input type="password" id="repassword" name="repassword" class="form-control" placeholder="Điền mật khẩu">
								<p class="repassword-error text-danger"></p>
							</div>

							<button type="submit" class="btn btn-primary">Lưu</button>
						</form>
					</div>

				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection

@section('script')
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$('#add_lfm').filemanager('image');
	$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

	$(document).on('submit', '#form_update_admin', function(){
		var formData = new FormData($('#form_update_admin')[0]);
		$.ajax({
			type:'post',
			url:'/admin/admin/update',
			data:formData,
			processData: false,
			contentType: false,
			success: function (message) {
				window.location.reload(false); 
			},
			error: function(error){
				$.each(error.responseJSON.errors,function(key,value) {
					$('.'+key+'-error').html( '<i class="fa fa-times-circle"></i>'+ value);
				});
			}
		})
	})

	$(document).on('submit', '#form_change_password', function(){
		var formDataChange = new FormData($('#form_change_password')[0]);
		console.log(formDataChange);
		if($('#repassword').val()==$('#new_password').val()){
			$.ajax({
				type:'post',
				url:'/admin/admin/change-password',
				data:formDataChange,
				processData: false,
				contentType: false,
				success: function (message) {
					$('.old_password-error ').html('<i class="fa fa-times-circle"></i>Mật khẩu cũ không chính xác');
				},
				error: function(error){
					window.location.reload(false);
			}
			})
		}else{

			$('.repassword-error').html('<i class="fa fa-times-circle"></i>Vui lòng nhập lại mật khẩu mới');
		}
	})
</script>
@endsection
