@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Tên sản phẩm" value="{{old('name','')}}" required>
                                    <span class="error">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Loại</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control select2" style="width: 100%;">
                                        @foreach($category as $k=>$v)
                                        <option value="{{$v->id}}" {{(old('category') == $k?'selected':'')}}>{{$v->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('category')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
                                <div class="col-sm-10">
                                    <input name="price" type="text" class="form-control" id="price" placeholder="Giá sản phẩm" value="{{old('price','')}}" required step="0.01">
                                    <span class="error">{{$errors->first('price')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Hình</label>
                                <div class="col-sm-10">
                                    <input name="image" type="file" id="imgInp">
                                    <span class="error">{{$errors->first('image')}}</span>
                                    <br>
                                    <image id="blah" src="{{url('/public/images/admin/')}}" alt="Hình ảnh sản phẩm" width="122px" height="133px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea id="desc" name="desc" class="form-control" rows="10"  placeholder="Sơ lược về bài đăng" required>{{old('desc')}}</textarea>
                                    <span class="error">{{$errors->first('desc')}}</span>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sales (%)</label>
                                <div class="col-sm-10">
                                    <input id="sale" name="sale" type="text" class="form-control" placeholder="Giảm giá.VD: 10% thì nhập 0.1" value="{{old('sale','')}}" step="0.01">
                                    <span class="error">{{$errors->first('sale')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control select2" style="width: 100%;">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                    <span class="error">{{$errors->first('status')}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Thêm</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/admin/bower_components/select2/dist/css/select2.min.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('public/admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('public/lib/ckeditor/ckeditor.js')}}"></script>
<script>
    //format price
    $(function(){
        $('#price').number( true, 0,',','.' );	
        $('#sale').number( true, 0,',','.' );	
    })
    

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })

    $("#imgInp").change(function() {
        readURL(this);
    });
    CKEDITOR.replace('desc')
</script>
@endsection