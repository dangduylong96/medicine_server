<aside class="main-sidebar">
    <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/').'/public/images/admin/'.MyLibrary::getAvatar()}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{MyLibrary::getName()}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Quản trị</li>
            <li class="<?php if(strpos(url()->current(),'trang-chu.html')!==false) echo 'active'?>" data-active="">
                <a href="<?php echo url('/admin/trang-chu.html')?>">
                <i class="fa fa-dashboard"></i> <span>Thống kê</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'thong-tin-admin.html')!==false) echo 'active'?>">
                <a href="thong-tin-admin.html">
                <i class="fa fa-user"></i> <span>Thông tin Admin</span>
                </a>
            </li>
            <li class="treeview" id="category">
                <a href="#">
                <i class="fa fa-tags"></i>
                <span>Quản lí loại</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-loai.html')!==false) echo 'active'?>" data-active="category"><a href="danh-sach-loai.html"><i class="fa fa-circle-o text-yellow"></i> Dang sách loại</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-loai.html')!==false) echo 'active'?>" data-active="category"><a href="them-loai.html"><i class="fa fa-circle-o text-yellow"></i> Thêm loại</a></li>
                </ul>
            </li>
            <li class="treeview" id="product">
                <a href="#">
                <i class="fa fa-product-hunt"></i>
                <span>Quản lí sản phẩm</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-san-pham.html')!==false) echo 'active'?>" data-active="product"><a href="danh-sach-san-pham.html"><i class="fa fa-circle-o text-yellow"></i> Dang sách sản phẩm</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-san-pham.html')!==false) echo 'active'?>" data-active="product"><a href="them-san-pham.html"><i class="fa fa-circle-o text-yellow"></i> Thêm sản phẩm</a></li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>