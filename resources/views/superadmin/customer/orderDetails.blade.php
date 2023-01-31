

@extends('superadmin.master')

@section('page_title')
    Order Details
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
            <h1 class="m-0">Order Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <button class="btn btn-sm btn-info" onclick="printInvoice('normal')"><i class="fa fa-print" aria-hidden="true"></i> NORMAL PRINT</button>  
            <button class="btn btn-sm btn-info" onclick="printInvoice('pos')"><i class="fa fa-print" aria-hidden="true"></i> POS PRINT</button>   -->
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
                                @if(isset($order->order_details[0]->product->shop->logo_img->file_name))
                                    <img src="{{assetUrl().$order->order_details[0]->product->shop->logo_img->file_name}}" alt="" style="border-radius:50%;" height="150">
                                @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>Invoice<br>
                                        <span class="small">order #{{$order->code}}</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    @php $address = json_decode($order->shipping_address); @endphp
                                    {{$address->name}}<br>
                                    {{$address->address}}, {{$address->postal_code}}<br>
                                    {{$address->city}}, {{$address->country}}<br>
                                    {{$address->email}}<br>
                                    {{$address->phone}}

                                </address>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <address>
                                    <strong>Shipped To:</strong><br>
                                    {{$address->name}}<br>
                                    {{$address->address}}, {{$address->postal_code}}<br>
                                    {{$address->city}}, {{$address->country}}<br>
                                    {{$address->email}}<br>
                                    {{$address->phone}}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                        @if($order->payment_type == 'cash_on_delivery')
                                        Cash on delivery
                                        @elseif($order->payment_type == 'stripe')
                                        Card
                                        @elseif($order->payment_type == 'wallet')
                                        Wallet
                                        @endif
                                </address>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    @php echo date('d/m/Y', strtotime($order->created_at)); @endphp
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>ORDER SUMMARY</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="line">
                                            <td><strong>#</strong></td>
                                            <td class="text-center"><strong>IMAGE</strong></td>
                                            <td class="text-center"><strong>ITEM</strong></td>
                                            <td class="text-center"><strong>VARIATION</strong></td>
                                            <td class="text-center"><strong>PRICE</strong></td>
                                            <td class="text-center"><strong>QUANTITY</strong></td>
                                            <td class="text-right"><strong>SUBTOTAL</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sl = 0; $subtotal = 0; $taxes = 0; $shipping_cost = 0; $coupon_discount = 0;@endphp
                                        @foreach($order->order_details as $details)
                                        @php $subtotal += $details->price; $taxes += $details->tax; $shipping_cost += $details->shipping_cost; $coupon_discount += $details->coupon_discount; @endphp
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td style="text-align:center;">
                                                @if(isset($details->product->thumbnail_image->file_name))
                                                    <img src="{{assetUrl().$details->product->thumbnail_image->file_name}}" style="height:65px;" />
                                                @endif
                                            </td>
                                            <td class="text-center">{{$details->product->name}}</td>
                                            <td class="text-center">{{$details->variation}}</td>
                                            <td class="text-center"> {{$details->price/$details->quantity}}</td>
                                            <td class="text-center">{{$details->quantity}}</td>
                                            <td class="text-right">{{number_format($details->price, 2)}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-right"><strong>Taxes</strong></td>
                                            <td class="text-right"><strong>{{number_format($taxes, 2)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-right"><strong>Shipping Cost</strong></td>
                                            <td class="text-right"><strong>{{number_format($shipping_cost, 2)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-right"><strong>Coupon Discount</strong></td>
                                            <td class="text-right"><strong>{{number_format($coupon_discount, 2)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                            </td><td class="text-right"><strong>Total</strong></td>
                                            @php $grand_total = ($subtotal + $taxes + $shipping_cost) - $coupon_discount; @endphp
                                            <td class="text-right"><strong>{{number_format($grand_total, 2)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-right"><strong>Payment Status</strong></td>
                                            <td class="text-right"><strong>
                                                @if($details->payment_status == 'unpaid')
                                                    Unpaid
                                                @elseif($details->payment_status == 'paid')
                                                    Paid
                                                @endif
                                            </strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>									
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right identity">
                                <p>Made By<br><strong>{{$order->order_details[0]->product->shop->name}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
    </div>
        
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <!-- post print -->
                <div class="ticket" id="ticket" style="margin: 0 auto;text-align: center;display:none;">
                    <h5>{{$order->order_details[0]->product->shop->name}}</h5>
                    
                    <p class="centered">INVOICE<br>
                    {{$address->name}}<br>
                    {{$address->address}}, {{$address->postal_code}}<br>
                    {{$address->city}}, {{$address->country}}<br>
                    {{$address->email}}<br>
                    {{$address->phone}}
                    </p>
                    <p class="centered">ORDER NO# {{$order->code}}</p>
                    <table class="pos_table" style="margin: 0 auto;">
                        <thead>
                            <tr>
                                <th class="sl">SL</th>
                                <th class="item">ITEM</th>
                                <th class="quantity">QTY</th>
                                <th class="price">PRICE</th>
                                <th class="subtotal">S.T</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 0; @endphp
                            @foreach($order->order_details as $details)
                            <tr>
                                <td class="sl">{{++$sl}}</td>
                                <td class="item">
                                    {{$details->product->name}}<br>
                                    @if($details->variation != "")
                                    ({{$details->variation}})
                                    @endif
                                </td>
                                <td class="quantity">{{$details->quantity}}</td>
                                <td class="price">
                                @php 
                                    $price = 0;
                                    if($details->variation)
                                    {
                                        // $price = \App\ProductStock::where('product_id', $details->product_id)->where('variant', $details->variation)->first()->price;
                                        $price = \App\ProductStock::where('product_id', $details->product_id)->where('variant', $details->variation)->first();
                                        if(isset($price)) {
                                            $price = $price->price;
                                        } else {
                                            $price = 0.00;
                                        }
                                    }
                                    else
                                    {
                                        $price = $details->product->unit_price - $details->product->discount;
                                    }
                                @endphp
                                {{$price}}
                                </td>
                                <td class="subtotal">{{number_format($details->price, 2)}}</td>
                            </tr>
                            @endforeach    
                            <tr>
                                <td colspan="4" style="text-align:right;">TAX</td>
                                <td class="subtotal">{{number_format($taxes, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;">SHIPPING COST</td>
                                <td class="subtotal">{{number_format($shipping_cost, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;">COUPON DISCOUNT</td>
                                <td class="subtotal">{{number_format($coupon_discount, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;">TOTAL</td>
                                <td class="subtotal">{{number_format($grand_total, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;">PAYMENT STATUS</td>
                                <td class="subtotal">
                                    @if($details->payment_status == 'unpaid')
                                        UNPAID
                                    @elseif($details->payment_status == 'paid')
                                        PAID
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p class="centered">Thanks for your purchase!</p>
                        <!-- <br>parzibyte.me/blog</p> -->
                </div>
                <a href="{{route('superadmin.customer.order.list',['id'=>$order->user->id])}}" class="btn btn-dark">Orders</a>
            </div>
        </div>
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