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
                    <li class="<?php if(strpos(url()->current(),'danh-sach-loai.html')!==false) echo 'active'?>" data-active="category"><a href="danh-sach-loai.html"><i class="fa fa-circle-o"></i> Dang sách loại</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-loai.html')!==false) echo 'active'?>" data-active="category"><a href="them-loai.html"><i class="fa fa-circle-o"></i> Thêm loại</a></li>
                </ul>
            </li>
            <li class="treeview" id="category">
                <a href="#">
                <i class="fa fa-trademark"></i>
                <span>Quản lí nghành</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-nghanh.html')!==false) echo 'active'?>" data-active="category"><a href="danh-sach-nghanh.html"><i class="fa fa-circle-o"></i> Dang sách nghành</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-nghanh.html')!==false) echo 'active'?>" data-active="category"><a href="them-nghanh.html"><i class="fa fa-circle-o"></i> Thêm nghành</a></li>
                </ul>
            </li>
            <li class="header">Tùy Chỉnh</li>
            <li id="setting" class="treeview">
                <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Tùy Chỉnh Dữ Liệu</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="city" class="treeview" data-active="city">
                        <a href="#"><i class="fa fa-circle-o text-yellow"></i> Thành Phố
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if(strpos(url()->current(),'thanh-pho.html')!==false) echo 'active'?>" data-active="setting,city"><a href="<?php echo url('/admin/thanh-pho.html')?>"><i class="fa fa-circle-o text-red"></i> Danh sách thành phố</a></li>
                            <li class="<?php if(strpos(url()->current(),'thanh-pho/them.html')!==false) echo 'active'?>" data-active="setting,city"><a href="<?php echo url('/admin/thanh-pho/them.html')?>"><i class="fa fa-circle-o text-red"></i> Thêm thành phố</a></li>
                        </ul>
                    </li>
                    <li id="size" class="treeview" data-active="city">
                        <a href="#"><i class="fa fa-circle-o text-yellow"></i> Qui mô
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if(strpos(url()->current(),'qui-mo.html')!==false) echo 'active'?>" data-active="setting,size"><a href="<?php echo url('/admin/qui-mo.html')?>"><i class="fa fa-circle-o text-red"></i> Danh sách qui mô</a></li>
                            <li class="<?php if(strpos(url()->current(),'qui-mo/them.html')!==false) echo 'active'?>" data-active="setting,size"><a href="<?php echo url('/admin/qui-mo/them.html')?>"><i class="fa fa-circle-o text-red"></i> Thêm qui mô</a></li>
                        </ul>
                    </li>
                    <li id="sex" class="treeview" data-active="city">
                        <a href="#"><i class="fa fa-circle-o text-yellow"></i> Giới Tính
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if(strpos(url()->current(),'gioi-tinh.html')!==false) echo 'active'?>" data-active="setting,sex"><a href="<?php echo url('/admin/qui-mo.html')?>"><i class="fa fa-circle-o text-red"></i> Danh sách giới tính</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>