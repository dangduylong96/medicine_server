@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Xuất đơn hàng thành file exel
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Xuất file exel</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <form target="_blank" class="row" method="GET" action="">
                        {{--  @csrf  --}}
                        <div class="col-md-6">
                            <label>Chọn ngày xuất:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input name="range_date" type="text" class="form-control pull-right" id="reservationtime">
                                <input name="start_date" id="start_date" type="hidden">
                                <input name="end_date" id="end_date" type="hidden">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Chọn loại đơn hàng:</label>
                            <div class="input-group">
                                <select name="category" class="form-control select2" style="width: 100%;">
                                    <option value="-1">Tất cả</option>
                                    <option value="1">Đã giao</option>
                                    <option value="0">Chưa giao</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>&nbsp</label>
                            <div class="input-group">
                                <button type="submit" class="form-control btn btn-primary">Xuất file</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/admin/bower_components/select2/dist/css/select2.min.css')}}">
<!-- DatePicker Range -->
<link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- DatePicker Range -->
<script src="{{asset('public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script>
$(function () {
    $('#reservationtime').daterangepicker({ 
        locale: {
            format: 'DD/MM/YYYY'
        }
    },
       function(start, end) {
        $('#start_date').val(start.format('YYYY-MM-DD'));
        $('#end_date').val(end.format('YYYY-MM-DD'));

    })
    var startDate = $('#reservationtime').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var endDate = $('#reservationtime').data('daterangepicker').endDate.format('YYYY-MM-DD');
    $('#start_date').val(startDate);
    $('#end_date').val(endDate);
})
</script>
@endsection