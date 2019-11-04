<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm mới thông số</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form role="form" method="post" action="javascript:;" id="form_create_option" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>Tên thông số</label>
							<input type="text" name="name" class="form-control title" placeholder="Điền tên thông số">
							<p class="name-error error text-danger"></p>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" >Loại thông số</label>
							</div>
							<select id="is_general" class="custom-select" name="is_general" onchange="isGeneral()">
								<option value selected>Chọn</option>
								<option value="0">Riêng</option>
								<option value="1">Chung</option>
							</select>
						</div>

						<div class="form-group" id="div_value">
							<label>Giá trị thông số</label>
							<input type="text" name="value" class="form-control" placeholder="Điền giá trị thông số">
							<p class="value-error error text-danger"></p>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" >Danh mục</label>
							</div>
							<select class="custom-select" name="category_id">
								<option value selected>Chọn danh mục cha</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<p class="category_id-error error text-danger"></p>

						<div class="input-group mb-3" id="div_parent_id">
							<div class="input-group-prepend">
								<label class="input-group-text" >Thông số cha</label>
							</div>
							<select class="custom-select" id="add_parent_id" name="parent_id">
								<option value selected>Chọn thông số cha</option>
								@foreach($options_parent as $option)
								<option value="{{ $option->id }}">{{$option->name}}</option>
								@endforeach
							</select>
						</div>
						<p class="parent_id-error error text-danger"></p>
					</div>


					<button type="submit" class="btn btn-success">Tạo mới</button>
				</form>
			</div>
		</div>
	</div>
</div>