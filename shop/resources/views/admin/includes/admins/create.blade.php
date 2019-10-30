<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm mới nhân viên</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form role="form" method="post" action="javascript:;" id="form_create_admin" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>Tên nhân viên</label>
							<input type="text" name="name" class="form-control" id="add_title" placeholder="Điền tên nhân viên">
							<p class="name-error error text-danger"></p>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" id="add_email" placeholder="Điền email">
							<p class="email-error error text-danger"></p>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Tạo mới</button>
				</form>
			</div>
		</div>
	</div>
</div>