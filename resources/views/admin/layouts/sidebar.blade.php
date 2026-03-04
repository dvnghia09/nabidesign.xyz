<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview">
          <a href="#">
            <i class="fa  fa-archive"></i> <span>Quản lý đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('order.index')}}"><i class="fa fa-circle-o"></i>Danh sách đơn hàng</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Quản lý Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('category.index')}}"><i class="fa fa-circle-o"></i>Menu cha</a></li>
            <li><a href="{{ route('category-sub.index')}}"><i class="fa fa-circle-o"></i>Menu con</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th fa-cart-plus"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('product.index')}}"><i class="fa fa-circle-o"></i>Tất cả sản phẩm</a></li>
            <li><a href="{{ route('add.product')}}"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th  fa-tags"></i> <span>Thuộc tính sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('attr-product.index')}}"><i class="fa fa-circle-o"></i>Danh sách & Thêm mới</a></li>
          </ul>
        </li>

        <li class="">
          <a href="{{route('banner.index')}}">
            <i class="fa fa-th fa-photo"></i> <span>Quản lý Banner</span>
          </a>
        </li>

        <li class="">
          <a href="{{route('look-book.index')}}">
            <i class="fa fa-th  fa-camera"></i> <span>Album Look Book</span>
          </a>
        </li>

        <li class="">
          <a href="{{ route('admin.contact.index') }}">
            <i class="fa fa-envelope"></i> <span>Quản lý liên hệ</span>
          </a>
        </li>

        <li class="">
          <a href="{{ route('admin.warranty.edit') }}">
            <i class="fa fa-shield"></i> <span>Chính sách bảo hành</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th fa-gear"></i> <span>Cài đặt</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.setting.index') }}"><i class="fa fa-circle-o"></i>Cài đặt chung</a></li>
            <li><a href="{{ route('logout.admin') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>