@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Danh sách người dùng</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
@endsection

@section('content')

<!-- Content -->
<div class="container-fluid">
	@can('permission','add-admin')
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" data-toggle="tooltip" data-placement="bottom" title="Thêm mới"><i class="fa fa-plus" aria-hidden="true"></i></button>
	@endcan
	<p></p>
		<!-- Main row -->
		<div class="row">

			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Danh sách người dùng</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						<div class="container my-4">
						<table id="admins_table" class="table table-hover">
							<thead>
							<tr>
								<th>STT</th>
								<th>Tên</th>
								<th>Email</th>
								<th>Thời gian tạo</th>
								<th>Thao tác</th>
							</tr>
							</thead>    
						</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
	@include('admin.includes.admins.create')
@include('admin.includes.admins.edit')
@endsection

@section('script')
<script>
	var getdata='{{ route('admin.getdata') }}';
	var store_category='{{ route('admin.store') }}';
</script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
$('#add_lfm').filemanager('image');
$('#edit_lfm').filemanager('image');

$(document).ready( function () {
	$('#admins_table').DataTable({
		"language": {
			processing:     "Đang xử lý...",
			search:         "Tìm kiếm: &nbsp;",
			lengthMenu:    "Xem _MENU_ mục",
			info:           "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
			infoEmpty:      "Đang xem 0 đến 0 trong tổng số 0 mục",
			infoFiltered:   "(được lọc từ _MAX_ mục)",
			infoPostFix:    "",
			loadingRecords: "Đang tải...",
			zeroRecords:    "Không tìm thấy dòng nào phù hợp",
			emptyTable:     "Không có dữ liệu trong bảng",
			paginate: {
				first:      "Đầu",
				previous:   "Trước",
				next:       "Tiếp",
				last:       "Cuối"
			},
			aria: {
				sortAscending:  ": Sắp xếp cột theo thứ tự tăng dần",
				sortDescending: ": Sắp xếp cột theo thứ tự giảm dần"
			}
		},
		processing: true,
		serverSide: true,
		ajax: getdata,
		columns: [
		{data: 'DT_RowIndex', orderable: false, searchable: false,},
		{ data: 'name', name: 'name'},
		{ data: 'email', name: 'email'},
		{ data: 'created_at', name: 'created_at' },
		{ data: 'action', name: 'action',orderable: false, searchable: false, },
		]
	});
});

$(document).on('submit', '#form_create_admin', function(){
	var formData = new FormData($('#form_create_admin')[0]);
	$.ajax({
		type:'post',
		url:store_category,
		data:formData,
		processData: false,
		contentType: false,
		success: function (message) { 
			$('#form_create_admin').trigger("reset");
			$('.close').trigger("click");
			$('.error').html("");
			$('#admins_table').DataTable().ajax.reload(null, false);
			swal({
				title: "Thành công!",
				text: "Bạn đã thêm thành công!",
				icon: "success",
				button: "OK!",
			});
		},
		error: function(error){
			$.each(error.responseJSON.errors,function(key,value) {
				$('.'+key+'-error').html( '<i class="fa fa-times-circle"></i>'+ value);
			});
		}
	})
})


$("#admins_table").on("click", ".btn-delete", function(){
   let id = $(this).attr('data-id');
   swal({
	  title: "Bạn có chắc không ?",
	  text: "Sau khi xóa bạn không thể khôi phục danh mục này!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
  })
   .then((willDelete) => {
	  if (willDelete) {
		  $.ajax({
			url:'/admin/admin/delete/'+id,
			type:'PUT',
			data: {
				"id": id,
			},
			success: function () {
				$('#form_create_category').trigger("reset");
				$('#admins_table').DataTable().ajax.reload(null, false);
				swal({
					title: "Thành công!",
					text: "Bạn đã xóa thành công!",
					icon: "success",
					button: "OK!",
				});
			},
		})
	  } else {
		swal("Bạn đã hủy thao tác này!");
	}
});

});
</script>
@endsection