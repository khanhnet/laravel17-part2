$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
function ChangeToSlug()
{
    var title, slug;

    //Lấy text từ thẻ input title 
    title = document.getElementById("add_title").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('add_slug').value = slug;
}
function ChangeToSlugE()
{
    var title, slug;

    //Lấy text từ thẻ input title 
    title = document.getElementById("edit_title").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('edit_slug').value = slug;
}
$('#add_lfm').filemanager('image');
$('#edit_lfm').filemanager('image');

$(document).ready( function () {
    $('#categories_table').DataTable({
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
        { data: 'image', name: 'image',orderable: false, searchable: false,},
        { data: 'parent_id', name: 'parent_id' },
        { data: 'name', name: 'name' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action',orderable: false, searchable: false, },
        ]
    });
});

$(document).on('submit', '#form_create_category', function(){
    var formData = new FormData($('#form_create_category')[0]);
    $.ajax({
        type:'post',
        url:store_category,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_create_category').trigger("reset");
            $('.close').trigger("click");
            $('.error').html("");
            $('#categories_table').DataTable().ajax.reload(null, false);
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

$("#categories_table").on("click", ".btn-edit", function(){
 $('.error').html("");
 $('#modal_edit').modal("show");
 let id = $(this).attr('data-id');
 $.ajax({
    type:'GET',
    url:'/admin/categories/getdetail/'+id,
    success: function (res) {
        $('.error').html("");
        $('#edit_title').val(res.category.name);
        $('#edit_slug').val(res.category.slug);
        $('#edit_thumbnail').val(res.category.image);
        $('#edit_holder').attr("src", res.category.image);
        $('#edit_description').summernote('code', res.category.description);
        document.getElementById('category-'+res.category.id+'').selected = true;
    },
})

 $(document).on('submit', '#form_edit_category', function(){
    var formData = new FormData($('#form_edit_category')[0]);
    //console.log(formData);
    $.ajax({
        type:'post',
        url:'/admin/categories/update/'+id,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_edit_category').trigger("reset");
            $('.close').trigger("click");
            $('#categories_table').DataTable().ajax.reload(null, false);
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

$("#categories_table").on("click", ".btn-delete", function(){
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
        url:'/admin/categories/delete/'+id,
        type:'PUT',
        data: {
            "id": id,
        },
        success: function () {
            $('#form_create_category').trigger("reset");
            $('#categories_table').DataTable().ajax.reload(null, false);
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