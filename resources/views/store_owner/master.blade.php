<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beeda | @yield('page_title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  @yield('css_js_up')
  <style>
    .card-header {
      background-color: #f3f3f3 !important;
    }

    .btn-primary {
      color: black;
      background-color: #f3f3f3;
      border-color: black;
      box-shadow: none;
    }

    .card-primary:not(.card-outline)>.card-header,
    .card-primary:not(.card-outline)>.card-header a {
      color: black;
    }

    [class*=sidebar-dark-] {
      background-color: #EFF1F4;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #fff;
      box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 12px -12px rgb(0 0 0 / 40%);
    }

    .nav-link {
      color: black !important;
    }

    .inner {
      color: #616263;
    }

    .small-box {
      color: #fff !important;
      background-color: #fff !important;
    }

    .preloader {
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      background-color: #061880;
      height: 100vh;
      width: 100%;
      transition: height .2s linear;
      position: fixed;
      left: 0;
      top: 0;
      z-index: 9999;
    }

    .dashboard_card_heading {
      font-size: 20px !important;
    }

    .dashboard_card_para {
      font-size: 16px !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader section -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" style="width:200px;padding:10px;border-radius:10px" src="{{asset('assets/front/img/beeda_logo.svg')}}" alt="AdminLTELogo">
    </div>

    @include('store_owner.layout.header')

    @include('store_owner.layout.sidebar')
    <form action="{{route('login.logout')}}" method="post" id="logout_frm">
      @csrf
    </form>
    @if(count(getSellerServices()) > 0 && getSellerServices()[0]->seller->verification_status == 0)
    <script>
      swal({
          title: "Oops!",
          text: "You are not verified. It may take 1-3 working days Seller Id: {{getSellerServices()[0]->seller->user_id}}",
          icon: "error",
          button: "Oh no!",
          allowOutsideClick: false
        })
        .then((res) => {
          $('body').attr('style', 'opacity:0');
          $('#logout_frm').submit();
        })
    </script>
    @endif
    @yield('main_content')

    @include('store_owner.layout.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('store_owner_assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('store_owner_assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('store_owner_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('store_owner_assets/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('store_owner_assets/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('store_owner_assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('store_owner_assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('store_owner_assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('store_owner_assets/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('store_owner_assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('store_owner_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('store_owner_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('store_owner_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('store_owner_assets/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('store_owner_assets/dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('store_owner_assets/dist/js/pages/dashboard.js')}}"></script>

  @yield('css_js_down')

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
