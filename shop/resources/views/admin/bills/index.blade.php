@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách hóa đơn</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hóa đơn mới</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div class="container my-4">
                        <table id="bills_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Email người mua</th>
                                    <th>Email người xác nhận</th>
                                    <th>Thời gian mua</th>
                                    <th>Trạng thái</th>
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
@include('admin.includes.bills.confirm')
@endsection

@section('script')
<script>
    var getdata='{{ route('bills.getdata') }}';
</script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/js/admin/bill.js"></script>
@endsection

