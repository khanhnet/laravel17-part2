@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')


<!-- Content -->
<div class="container-fluid">
    @can('permission','add-product')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" data-toggle="tooltip" data-placement="bottom" title="Thêm mới"><i class="fa fa-plus" aria-hidden="true"></i></button>
    @endcan
    <p></p>
    <!-- Main row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sản phẩm mới nhập</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div class="container my-4">
                        <table id="products_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên danh mục</th>
                                    <th>Tên người tạo</th>
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
@include('admin.includes.products.create')
@include('admin.includes.products.edit')
@endsection

@section('script')
<script>
    var getdata='{{ route('products.getdata') }}';
    var store_product='{{ route('products.store') }}';
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
   let id = $(this).attr('data-id');
   $.ajax({
    type:'GET',
    url:'/admin/products/getdetail/'+id,
    success: function (res) {
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
    },
})

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
</script>
@endsection