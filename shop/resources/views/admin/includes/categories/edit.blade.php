<div id="modal_edit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form role="form" method="post" action="javascript:;" id="form_edit_category" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>Tên danh mục</label>
							<input type="text" name="name" class="form-control title" id="edit_title" onkeyup="ChangeToSlugE();" placeholder="Điền tên danh mục">
							<p class="name-error error text-danger"></p>
						</div>

						<div class="form-group">
							<label>Slug</label>
							<input type="text" name="slug" class="form-control slug" id="edit_slug">
							<p class="slug-error error text-danger"></p>
						</div>

						<div class="form-group">
							<label>Mô tả danh mục</label>
							<textarea id="edit_description" class="textarea" name="description" placeholder="Mô tả"
							style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							<p class="description-error error text-danger"></p>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" >Danh mục con</label>
							</div>
							<select class="custom-select" id="edit_parent_id" name="parent_id">
								<option value selected>Chọn danh mục cha</option>
								@foreach($categories as $category)
								<option id="category-{{ $category->id }}" value="{{ $category->id }}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Hình ảnh sản phẩm</label>
							<div class="input-group">
								<input type="button" id="edit_lfm" data-input="edit_thumbnail" data-preview="edit_holder" value="Tải lên">
								<input id="edit_thumbnail" class="form-control" type="text" name="image">
							</div>
						</div>
						<p class="image-error error text-danger"></p>

						<img id="edit_holder" style="margin-top:15px;max-height:100px;">
					</div>


					<button type="submit" class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>