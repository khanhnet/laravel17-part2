<div id="modal_edit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form role="form" method="post" action="javascript:;" id="form_edit_product" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>Tên sản phẩm</label>
							<input type="text" name="name" class="form-control title" id="edit_title" onkeyup="ChangeToSlugE();" placeholder="Điền tên sản phẩm">
							<p class="name-error text-danger"></p>
						</div>

						<div class="form-group">
							<label>Slug</label>
							<input type="text" name="slug" class="form-control slug" id="edit_slug">
							<p class="slug-error text-danger"></p>
						</div>

						<div class="form-group">
							<label>Giá</label>
							<input type="number" min="0" name="price" class="form-control" id="edit_price" placeholder="Nhập giá">
							<p class="price-error text-danger"></p>
						</div>

						<div class="form-group">
							<label>Số lượng</label>
							<input type="number" min="0" name="amount" class="form-control" id="edit_amount" placeholder="Nhập số lượng">
							<p class="amount-error text-danger"></p>
						</div>

						<div class="form-group">
							<label>Mô tả sản phẩm</label>
							<textarea id="edit_description" class="textarea" name="description" placeholder="Mô tả"
							style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							<p class="description-error text-danger"></p>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" >Danh mục sản phẩm</label>
							</div>
							<select class="custom-select" id="edit_category" name="category_id">
								<option value selected>Chọn danh mục</option>
								@foreach($categories as $category)
								<option id="category-{{ $category->id }}" value="{{ $category->id }}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<p class="category_id-error text-danger"></p>

						<div class="form-group">
							<label>Chú thích sản phẩm</label>
							<textarea class="textarea" name="note" placeholder="Mô tả"
							style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							<p class="note-error text-danger"></p>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" >Trạng thái sản phẩm</label>
							</div>
							<select class="custom-select" id="edit_status" name="status">
								<option value selected>Chọn trạng thái</option>
								<option id="status-0"  value="0">Ẩn</option>
								<option id="status-1" value="1">Hiện</option>
							</select>
						</div>
						<p class="status-error text-danger"></p>


						<p class="status-error text-danger"></p>

						<div id="edit_select_option"></div>


						<label>Ảnh sản phẩm</label>

						<a href="javascript:;" id="edit_image" class="btn btn-info" title="Thêm ảnh"><i class="fas fa-plus-square"></i></a>
						<a href="javascript:;" id="re_edit_image" class="btn btn-danger" title="Giảm ảnh"><i class="fas fa-minus"></i></a>
						<br>
						<div id="div_edit_image"></div>
						<div id="div_edit_preview_image"></div>

						<p class="image-error text-danger"></p>
					</div>


					<button type="submit" class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>