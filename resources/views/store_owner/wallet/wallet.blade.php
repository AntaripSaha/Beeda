@extends('store_owner.master')

@section('page_title')
My Wallet
@endsection

@section('css_js_up')

<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('main_content')


<style>
    #qrcode {
        width: 100%;
        height: 100%;
        padding: 30px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Wallet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Wallet</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3 class="dashboard_card_heading">${{number_format($wallet->balance,2)}}</h3>

                            <p class="dashboard_card_para">Personal Balance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3 class="dashboard_card_heading">${{number_format($wallet->offline_balance,2)}}</h3>

                            <p class="dashboard_card_para">Offline Payments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3 class="dashboard_card_heading">${{number_format($wallet->store_balance - $wallet->offline_balance,2)}}</h3>

                            <p class="dashboard_card_para">Store Sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3 class="dashboard_card_heading">${{number_format($wallet->store_balance,2)}}</h3>

                            <p class="dashboard_card_para">Total Store Balance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>

            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Store Account Transactions</h4>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Transaction Type</th>
                                        <th>Ammount</th>
                                        <th>Payment Method</th>
                                        <th>Shop</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Personal Account Transactions</h4>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>In/Out</th>
                                        <th>Payment Method</th>
                                        <th>Associated User</th>
                                        <th>Ammount</th>
                                        <th>Transaction Type</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('css_js_down')

<script src="{{asset('store_owner_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            processing: true,
            serverSide: true,
            order: [0, "desc"],
            ajax: "{{ route('seller.wallet.personal-account') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'payment_method',
                    name: 'payment_method'
                },
                {
                    data: 'associate_user',
                    name: 'associate_user'
                },
                {
                    data: 'ammount',
                    name: 'ammount'
                },
                {
                    data: 'payment_type',
                    name: 'payment_type'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


<script>
    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            processing: true,
            serverSide: true,
            order: [0, "desc"],
            ajax: "{{ route('seller.wallet.store-account') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'payment_type',
                    name: 'payment_type'
                },
                {
                    data: 'ammount',
                    name: 'ammount'
                },
                {
                    data: 'payment_method',
                    name: 'payment_method'
                },
                {
                    data: 'shop_name',
                    name: 'shop_name'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

@if(Session::get('success_message'))
<script>
    iziToast.success({
        title: 'OK',
        position: 'topRight',
        message: '{{Session::get("success_message")}}',
    });
</script>
@endif

@endsection