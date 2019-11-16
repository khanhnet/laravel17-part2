$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready( function () {
    $('#bills_table').DataTable({
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
        { data: 'customer_id', name: 'customer_id'},
        { data: 'user_id', name: 'user_id' },
        { data: 'created_at', name: 'created_at' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action',orderable: false, searchable: false, },
        ]
    });
});

$("#bills_table").on("click", ".btn-edit", function(){
 $('#modal_edit').modal("show");
 let id = $(this).attr('data-id');
 $.ajax({
    type:'GET',
    url:'/admin/bills/getdetail/'+id,
    success: function (res) {
        console.log(res);
        $('#code').html(res.bill.code);
        $('#name').html(res.bill.to_name);
        $('#address').html(res.bill.to_address);
        $('#mobile').html(res.bill.to_mobile);
        $('#created_at').html(res.bill.created_at);
        $('#total').html(new Intl.NumberFormat('ja-JP', { }).format(res.bill.total));
        $.each(res.bill_details,function(key,value) {
            let price=value.price;
            $('#detail_bill').append( '<li>Mã sản phẩm : '+value.product_code+'---'+value.amount_buy+' X '+new Intl.NumberFormat('ja-JP', { }).format(price)+'</li>');
        });
        document.getElementById('status-'+res.bill.status+'').selected = true;
        if (res.bill.status==2) {
        $("#div_time_ship").html('<label>Thời gian giao hàng dự kiến</label><input type="date" class="form-control" id="time_ship" name="time_ship"><p class="time_ship-error error text-danger"></p>')
    }else{
        $("#div_time_ship").html('');
    }
        
    },
})
 $("#status").change(function(){
    let status=$("#status").val();
    if (status==2) {
        $("#div_time_ship").html('<label>Thời gian giao hàng dự kiến</label><input type="date" class="form-control" id="time_ship" name="time_ship"><p class="time_ship-error error text-danger"></p>')
    }else{
        $("#div_time_ship").html('');
    }
});

 $(document).on('submit', '#form_confirm_status', function(){
    var formData = new FormData($('#form_confirm_status')[0]);
    //console.log(formData);
    $.ajax({
        type:'post',
        url:'/admin/bills/update/'+id,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_confirm_status').trigger("reset");
            $('.close').trigger("click");
            $('#bills_table').DataTable().ajax.reload(null, false);
            swal({
                title: "Thành công!",
                text: "Bạn đã sửa thành công!",
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

});
