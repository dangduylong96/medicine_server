@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản Lí sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Danh sách sản phẩm</li>
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
                                <th>Tên sản phẩm</th>
                                <th>loại</th>
                                <th>Hình</th>
                                <th>Giá</th>
                                <th>Sales</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($product as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->fk_category->name}}</td>
                                <td><img src="{{url('public/images/product').'/'.$v->img}}" width="80" height="80"></td>
                                <td>{{number_format($v->price)}}</td>
                                <td>{{$v->sales}}</td>
                                <td>
                                    <a href="<?php echo url('/admin/sua-san-pham-'.$v->id.'.html')?>"><button type="button" class="btn btn-info">Sửa</button></a>
                                    <a href="<?php echo url('/admin/xoa-san-pham-'.$v->id.'.html')?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này? Xóa sản phẩm sẽ k thể khôi phục lại đc?')">Xóa</button></a>
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