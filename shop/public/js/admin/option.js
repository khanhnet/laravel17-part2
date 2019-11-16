 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

 $(document).ready( function () {
    $('#options_table').DataTable({
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
        { data: 'category_id', name: 'category_id'},
        { data: 'parent_id', name: 'parent_id' },
        { data: 'name', name: 'name' },
        { data: 'value', name: 'value' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action',orderable: false, searchable: false, },
        ]
    });
});

 $(document).on('submit', '#form_create_option', function(){
    var formData = new FormData($('#form_create_option')[0]);
    $.ajax({
        type:'post',
        url:store_option,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_create_option').trigger("reset");
            $('.close').trigger("click");
            $('.error').html("");
            $('#options_table').DataTable().ajax.reload(null, false);
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

 function isGeneral(){
    let is_general=$('#is_general').val();
    if(is_general==1){
        $('#div_value').hide();
        $('#div_parent_id').hide();
        $('#div_name').show();
        $('#name_option').val('');
    }else{
        $('#div_value').show();
        $('#div_parent_id').show();
        $('#div_name').hide();
        $('#name_option').val('Không cần truyền giá trị');
    }

}
function editIsGeneral(){
    let edit_is_general=$('#edit_is_general').val();
    if(edit_is_general==1){
        $('#div_edit_value').hide();
        $('#div_edit_parent_id').hide();
        $('#e_div_name').show();
        $('#e_name_option').val('');
    }else{
        $('#div_edit_value').show();
        $('#div_edit_parent_id').show();
        $('#e_div_name').hide();
        $('#e_name_option').val('Không cần truyền giá trị');
    }

}

$("#options_table").on("click", ".btn-edit", function(){
 $('.error').html("");
 $('#modal_edit').modal("show");
 let id = $(this).attr('data-id');
 $.ajax({
    type:'GET',
    url:'/admin/options/getdetail/'+id,
    success: function (res) {
        console.log(res.option.is_general);
        $('.error').html("");
        $('#edit_name').val(res.option.name);
        $('#edit_value').val(res.option.value);
        document.getElementById('category-'+res.option.category_id+'').selected = true;
        document.getElementById('option-'+res.option.parent_id+'').selected = true;
        document.getElementById('general-'+res.option.is_general+'').selected = true;
    },
})

 $(document).on('submit', '#form_edit_option', function(){
    var formData = new FormData($('#form_edit_option')[0]);
    //console.log(formData);
    $.ajax({
        type:'post',
        url:'/admin/options/update/'+id,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_edit_option').trigger("reset");
            $('.close').trigger("click");
            $('#options_table').DataTable().ajax.reload(null, false);
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

$("#options_table").on("click", ".btn-delete", function(){
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
        url:'/admin/options/delete/'+id,
        type:'PUT',
        data: {
            "id": id,
        },
        success: function () {
            $('#form_create_option').trigger("reset");
            $('#options_table').DataTable().ajax.reload(null, false);
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