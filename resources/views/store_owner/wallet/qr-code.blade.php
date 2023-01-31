@extends('store_owner.master')

@section('page_title')
QR Code
@endsection

@section('css_js_up')
@endsection

@section('main_content')


<style>
    #qrcode {
        width: 1000%;
        height: 1000%;
        padding: 70px;
    }

    .uga {
        margin: auto;
        width: 60%;
        border: 3px solid #73AD21;
        padding: 10px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">QR Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> <a href="{{route('seller.wallet.index')}}"> My Wallet</a></li>
                        <li class="breadcrumb-item active">QR Code</li>
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

            <!-- /.row -->
            <div class="row">
                <!-- ./col -->
                <div class="col-md-3 offset-md-3">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <!-- <div class="card-header"> -->
                        <!-- <h3 class="card-title" style="padding:10px"><b>QR Code</b></h3> -->
                        <div id="qrcode"></div>

                        <!-- </div> -->
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('css_js_down')
<script type="text/javascript" src="/store_owner_assets/qrcode.min.js">
</script>

<script>
    var qrcode = new QRCode("qrcode");

    function makeCode() {
        var elText = `{{$wallet->qr_code}}`;
        console.log(elText);

        qrcode.makeCode(elText);
    }

    makeCode();
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