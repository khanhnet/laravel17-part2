
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
$('.add_lfm').filemanager('image');
$('#edit_lfm').filemanager('image');

$(document).ready( function () {
    $('#products_table').DataTable({
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
        { data: 'name', name: 'name' },
        { data: 'category', name: 'category' },
        { data: 'user', name: 'user' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action',orderable: false, searchable: false, },
        ]
    });
});

$(document).on('submit', '#form_create_product', function(){
    var formData = new FormData($('#form_create_product')[0]);
    $.ajax({
        type:'post',
        url:store_product,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_create_product').trigger("reset");
            $('.close').trigger("click");
            $('#products_table').DataTable().ajax.reload(null, false);
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

$("#products_table").on("click", ".btn-edit", function(){
   $('#modal_edit').modal("show");
   $('.error').html("");
   let id = $(this).attr('data-id');
   let i=1;
   $.ajax({
    type:'GET',
    url:'/admin/products/getdetail/'+id,
    success: function (res) {
        $('.error').html("");
        $('#edit_title').val(res.product.name);
        $('#edit_slug').val(res.product.slug);
        $('#edit_price').val(res.product.price);
        $('#edit_amount').val(res.product.amount);
        $('#edit_description').summernote('code', res.product.description);
        $('#edit_note').summernote('code', res.product.note);
        $('#edit_thumbnail').val(res.product.image);
        $('#edit_holder').attr("src", res.product.image);
        document.getElementById('category-'+res.product.category_id+'').selected = true;
        document.getElementById('status-'+res.product.status+'').selected = true;

        let category_id=$('#edit_category').val();
        let option_category='';
        $.ajax({
            type:'GET',
            url:'/admin/options/get-option-category/'+res.product.category_id,
            success: function (res) {
                $.each(res.options_category,function(key,value) {
                    option_category+= '<option value="'+ value.id+'">'+ value.name+'-'+value.value+'</option>';
                });
                var select_option='<div class="form-group"><label>Thông số chung</label><select class="select_option" multiple title="Vui lòng chọn" name="options[]" data-width="200px" value="'+res.options+'">'+option_category+'</select></div><p class="option-error text-danger"></p>';
                $('#edit_select_option').html(select_option);
                $('.select_option').selectpicker();
            },
        })

        
        $.each(res.images,function(key,value) {
            let html_div_add_image='<div class="form-group"><label for="exampleInputFile">Hình ảnh sản phẩm '+i+'</label><div class="input-group"><input type="button" id="add_lfm" class="add_lfm" data-input="edit_thumbnail_'+i+'" data-preview="edit_holder_'+i+'" value="Tải lên"><input id="edit_thumbnail_'+i+'" class="form-control" type="text" name="images[]" value="'+value.path+'"></div></div>';
            let html_div_preview='<img id="edit_holder_'+i+'" src="'+value.path+'" style="margin-top:15px;max-height:100px;" title="Ảnh '+i+'">';
            i++;
            $('#div_edit_image').append(html_div_add_image);
            $('#div_edit_preview_image').append(html_div_preview);
            $('.add_lfm').filemanager('image');

        });
        
    },
})

   $('#edit_image').on('click',function (){
    let html_div_add_image='<div class="form-group"><label for="exampleInputFile">Hình ảnh sản phẩm '+i+'</label><div class="input-group"><input type="button" class="add_lfm" data-input="edit_thumbnail_'+i+'" data-preview="edit_holder_'+i+'" value="Tải lên"><input id="edit_thumbnail_'+i+'" class="form-control" type="text" name="images[]"></div></div>';
    let html_div_preview='<img id="edit_holder_'+i+'" style="margin-top:15px;max-height:100px;" title="Ảnh '+i+'">';
    i++;
    $('#div_edit_image').append(html_div_add_image);
    $('#div_edit_preview_image').append(html_div_preview);
    $('.add_lfm').filemanager('image');
});
   $('#re_edit_image').on('click',function (){
    $('#div_edit_image').html('');
    $('#div_edit_preview_image').html('');
    i=1;
});

   $(document).on('submit', '#form_edit_product', function(){
    var formData = new FormData($('#form_edit_product')[0]);
    $.ajax({
        type:'post',
        url:'/admin/products/update/'+id,
        data:formData,
        processData: false,
        contentType: false,
        success: function (message) { 
            $('#form_edit_product').trigger("reset");
            $('.close').trigger("click");
            $('#products_table').DataTable().ajax.reload(null, false);
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
//xóa 
$("#products_table").on("click", ".btn-delete", function(){
   let id = $(this).attr('data-id');
   $.ajax({
    url:'/admin/products/delete/'+id,
    type:'PUT',
    data: {
        "id": id,
    },
    success: function () {
        $('#form_create_product').trigger("reset");
        $('#products_table').DataTable().ajax.reload(null, false);
        swal({
            title: "Thành công!",
            text: "Bạn đã xóa thành công!",
            icon: "success",
            button: "OK!",
        });
    },
})
});
$("#add_category").change(function(){
    let category_id=$('#add_category').val();
    let option_category='';
    $.ajax({
        type:'GET',
        url:'/admin/options/get-option-category/'+category_id,
        success: function (res) {
            option_category_arr=res.options_category;
            $.each(res.options_category,function(key,value) {
                option_category+= '<option value="'+ value.id+'">'+ value.name+'-'+value.value+'</option>';
            });
            var select_option='<div class="form-group"><label>Thông số chung</label><select class="select_option" multiple title="Vui lòng chọn" name="options[]" data-width="200px">'+option_category+'</select></div><p class="option-error text-danger"></p>';
            $('#select_option').html(select_option);
            $('.select_option').selectpicker();
        },
    })
});
var i=1;
$('#add_image').on('click',function (){
    let html_div_add_image='<div class="form-group"><label for="exampleInputFile">Hình ảnh sản phẩm '+i+'</label><div class="input-group"><input type="button" id="add_lfm" class="add_lfm" data-input="add_thumbnail_'+i+'" data-preview="add_holder_'+i+'" value="Tải lên"><input id="add_thumbnail_'+i+'" class="form-control" type="text" name="images[]"></div></div>'
    let html_div_preview='<img id="add_holder_'+i+'" style="margin-top:15px;max-height:100px;" title="Ảnh '+i+'">';
    i++;
    $('#div_add_image').append(html_div_add_image);
    $('#div_preview_image').append(html_div_preview);
    $('.add_lfm').filemanager('image');
});

$('#re_add_image').on('click',function (){
    $('#div_add_image').html('');
    $('#div_preview_image').html('');
    i=1;
});


$("#edit_category").change(function(){
    let category_id=$('#edit_category').val();
    let option_category='';
    $.ajax({
        type:'GET',
        url:'/admin/options/get-option-category/'+category_id,
        success: function (res) {
            option_category_arr=res.options_category;
            $.each(res.options_category,function(key,value) {
                option_category+= '<option value="'+ value.id+'">'+ value.name+'-'+value.value+'</option>';
            });
            var select_option='<div class="form-group"><label>Thông số chung</label><select class="select_option" multiple title="Vui lòng chọn" name="options[]" data-width="200px">'+option_category+'</select></div><p class="option-error text-danger"></p>';
            $('#edit_select_option').html(select_option);
            $('.select_option').selectpicker();
        },
    })
});
