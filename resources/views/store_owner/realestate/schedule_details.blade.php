@extends('store_owner.master')

@section('page_title')
    Schedule Details
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
.invoice {
    padding: 30px;
}

.invoice h2 {
	margin-top: 0px;
	line-height: 0.8em;
}

.invoice .small {
	font-weight: 300;
}

.invoice hr {
	margin-top: 10px;
	border-color: #ddd;
}

.invoice .table tr.line {
	border-bottom: 1px solid #ccc;
}

.invoice .table td {
	border: none;
}

.invoice .identity {
	margin-top: 10px;
	font-size: 1.1em;
	font-weight: 300;
}

.invoice .identity strong {
	font-weight: 600;
}


.grid {
    position: relative;
	width: 100%;
	background: #fff;
	color: #666666;
	border-radius: 2px;
	margin-bottom: 25px;
	box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}


/* pos print */
.pos_table td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.item,
th.item {
    width: 150px;
    max-width: 150px;
}

td.sl,
th.sl {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.quantity,
th.quantity {
    width: 60px;
    max-width: 60px;
    word-break: break-all;
}

td.subtotal,
th.subtotal {
    width: 60px;
    max-width: 60px;
    word-break: break-all;
    text-align: right;
}
td.price,
th.price {
    width: 60px;
    max-width: 60px;
    word-break: break-all;
    text-align: right;
}
.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 384px;
    max-width: 384px;
    font-size: 15px;
}

.pos_logo img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hide_div_print {
        display: none !important;
    }
}

</style>
@endsection

@section('main_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Schedule Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">  
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Real Estate</li>
              <li class="breadcrumb-item active">Schedule Details</li>
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
                                    <!-- BEGIN INVOICE -->
                                    <div class="col-md-12" style="margin: 0 auto;">
                                        <div class="grid invoice">
                                            <div class="grid-body">
                                                <div class="invoice-title">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <img src="{{assetUrl().$schedule->property->thumbnail->file_name}}" alt="" style="border-radius:4%;" height="150">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h2>Property<br>
                                                                <span class="small">{{$schedule->property->name}}</span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span style="font-weight: bolder;">Customer:</span> {{$schedule->full_name}}
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-3">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    <span style="font-weight: bolder;">Email:</span> {{$schedule->email}}<br>
                                                    <span style="font-weight: bolder;">Date & Time:</span> {{$schedule->date}} {{$schedule->time}}
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-3">
                                                        <span>Schedule Status:
                                                            @if($schedule->status == 0)
                                                                <span class="badge badge-danger">Pending</span>
                                                            @elseif($schedule->status == 1)
                                                                <span class="badge badge-info">Confirmed</span>
                                                            @else
                                                                <span class="badge badge-success">Meeting Done</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END INVOICE -->
                                </div>
                </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('css_js_down')
<script>
    function printInvoice(type)
    {
        if(type == 'normal')
        {
            $('.invoice').removeClass('hide_div_print');
            $('.ticket').addClass('hide_div_print');
            $('.ticket').hide();
            $('.invoice').show();
        }
        else if(type == 'pos')
        {
            $('.ticket').removeClass('hide_div_print');
            $('.invoice').addClass('hide_div_print');
            $('.invoice').hide();
            $('.ticket').show();
        }
        window.print();

    }
</script>
@endsection

