<div id="modal_edit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chi tiết hóa đơn</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div >
					<p><b>Mã sản phẩm: </b><span id="code"></span></p>
					<p><b>Tên người nhận: </b><span id="name"></span></p>
					<p><b>Số điện thoại: </b><span id="mobile"></span></p>
					<p><b>Địa chỉ: </b><span id="address"></span></p>
					<p><b>Thời gian mua: </b><span id="created_at"></span></p>
				</div>
				<hr>
				<ul id="detail_bill"></ul>
					<p><b>Tổng tiền: </b><span id="total"></span></p>

				<form role="form" method="post" action="javascript:;" id="form_confirm_status" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" >Trạng thái</label>
							</div>
							<select class="custom-select" id="status" name="status">
								<option value selected>Chọn trạng thái</option>
								<option id="status-0" value="0">Chưa xác nhận</option>
								<option id="status-1" value="1">Đã xác nhận</option>
								<option id="status-2" value="2">Đang giao hàng</option>
								<option id="status-3" value="3">Đã thanh toán</option>
								<option id="status-4" value="4">Đã hủy</option>
							</select>
						</div>
						<div class="form-group" id="div_time_ship">
							
						</div>
					</div>


					<button type="submit" class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>