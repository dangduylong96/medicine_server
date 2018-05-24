@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản Lí đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                @if(session()->has('message'))
                    <?php
                        $mg=session('message');
                        if($mg['status']=='success')
                        {
                            $title='Thành công';
                        }elseif($mg['status']=='danger')
                        {
                            $title='Lỗi';
                        }elseif($mg['status']=='warning')
                        {
                            $title='Chú ý';
                        }else
                        {
                            $title='Thông tin';
                        }
                        echo '<div class="box-header"><div class="alert alert-'.$mg['status'].' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '.$title.'!</h4>'.$mg['content'].'</div>';
                    ?>
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Tên cửa hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>                                
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($order as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v->fk_user->fk_user_detail->name}}</td>
                                <td>{{$v->fk_user->fk_user_detail->name_shop}}</td>
                                <td>{{date('d/m/Y',strtotime($v->created_at))}}</td>
                                <td style="font-weight: bold">{{number_format(MyLibrary::getTotalOrder($v->id))}} VNĐ</td>
                                <th><span class="label label-warning">Chưa giao</span></th>
                                <td>
                                    <a target="_blank" href="<?php echo url('/admin/chi-tiet-don-hang-'.$v->id.'.html')?>"><button type="button" class="btn btn-primary">Chi tiết</button></a>
                                    <a href="<?php echo url('/admin/chuyen-trang-thai-'.$v->id.'.html')?>" onclick="return confirm('Bạn có chắc chắn muốn chuyển trạng thái đơn hàng sang đã giao???')"><button type="button" class="btn btn-success">Đã giao</button></a>
                                    <a href="<?php echo url('/admin/huy-don-'.$v->id.'.html')?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng? Khi hủy đơn hàng sẽ k hiển thị ở trang quản trị, vui lòng liên hệ quản trị viên để khôi phục nếu muốn')"><button type="button" class="btn btn-danger">Hủy đơn</button></a>
                                </td>
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