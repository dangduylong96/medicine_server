@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Chi tiết đơn hàng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="panel panel-success">
                                <div class="panel-heading">Thông tin đặt hàng</div>
                                <div class="panel-body">
                                    <p>Họ Tên: <span>{{$user->name}}</span></p>
                                    <p>Ngày sinh: <span>{{date('d-m-Y',strtotime($user->dob))}}</span></p>
                                    <p>Số điện thoại: <span>{{$user->phone}}</span></p>
                                    <p>Tên cửa hàng: <span>{{$user->name_shop}}</span></p>
                                    <p>Địa chỉ: <span>{{$user->address}}</span></p>
                                    <p>Mã số thuế: <span>{{$user->tax_code}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã hóa đơn</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình</th>
                                <th>Số lượng</th>
                                <th>sales</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($order_detail as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v->order_id}}</td>
                                <td>{{$v->name}}</td>
                                <td><img src="{{url('public/images/product').'/'.$v->img}}" width="80" height="80"></td>
                                <td>{{$v->qty}}</td>
                                <td>{{number_format($v->sales)}} VNĐ</td>
                                <td>{{number_format($v->price)}} VNĐ</td>
                                <td style="font-weight: bold">{{number_format(($v->price-$v->sales)*$v->qty)}} VNĐ</td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<style>
.panel-heading{
    font-weight: bold;
    background-color: darkseagreen;
}
.panel-body p{
    font-size: 15px;
    font-weight: bold;
}
.panel-body p span{
    margin-left: 2%;
    color: blueviolet;
}
</style>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function () {
    $('#example1').DataTable()
})
</script>
@endsection