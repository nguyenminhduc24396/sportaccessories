<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bảng quản lý</title>
    <link href="{{ asset('css/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/sb-admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</head>
<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="{{ route('home') }}">Trang chủ</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
        </li>
    </ul>
</nav>
<div id="wrapper">
  <ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Bảng quản lý</span>
    </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.category') }}">
    <i class="fa fa-fw fa-table"></i>
    <span>Danh mục</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.product') }}">
    <i class="fab fa-fw fa-product-hunt"></i>
    <span>Sản phẩm</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.user') }}">
    <i class="fas fa-fw fa-users"></i>
    <span>Tài khoản</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.order') }}">
    <i class="fas fa-fw fa-cart-plus"></i>
    <span>Đơn hàng</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.order') }}">
    <i class="fa fa-fw fa-sitemap"></i>
    <span>Bài viết</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.contact') }}">
        <i class="fas fa-fw fa-phone-volume"></i>
        <span>Liên hệ</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.contact') }}">
        <i class="fas fa-fw fa-sliders-h"></i>
        <span>Slider</span>
    </a>
</li>
</ul>
<div id="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright © Your Website 2018</span>
      </div>
  </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng đăng xuất?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>
  <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn sẵn sàng kết thúc phiên làm việc của mình</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
    {{-- <a class="btn btn-primary" href="{{ route('logout') }}">Đăng xuất</a> --}}
    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Đăng xuất') }}</a>
    <form class="btn btn-primary" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</div>
</div>
</div>
<script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/admin/sb-admin.min.js') }}"></script>
</body>
</html>
