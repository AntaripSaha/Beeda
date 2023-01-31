@extends('superadmin.master')

@section('page_title')
Store Order Details
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
.toggle-btn {
  width: 72px;
  height: 26px;
  margin: 10px;
  border-radius: 50px;
  display: inline-block;
  position: relative;
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==") no-repeat 50px center #e74c3c;
  cursor: pointer;
  -webkit-transition: background-color .40s ease-in-out;
  -moz-transition: background-color .40s ease-in-out;
  -o-transition: background-color .40s ease-in-out;
  transition: background-color .40s ease-in-out;
  cursor: pointer;
}
.toggle-btn.active {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC") no-repeat 10px center #2ecc71;
}
.toggle-btn.active .round-btn {
  left: 45px;
}
.toggle-btn .round-btn {
  width: 20px;
  height: 20px;
  background-color: #fff;
  border-radius: 50%;
  display: inline-block;
  position: absolute;
  left: 5px;
  top: 50%;
  margin-top: -10px;
  -webkit-transition: all .30s ease-in-out;
  -moz-transition: all .30s ease-in-out;
  -o-transition: all .30s ease-in-out;
  transition: all .30s ease-in-out;
}
.toggle-btn .cb-value {
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 9;
  cursor: pointer;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}
</style>
@endsection

@section('main_content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Store Order Details</h4>
                </div>
                <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive ride-detail-table">
                        
                        
                        
                        <table class="table tbl-details">
                            <tr>
                                <th style="border-top:none">Order ID.</th>
                                <td>#{{$details[0]->order->code}}</td>
                            </tr>
                            <tr>
                                <th>Shop Name</th>
                                <td>{{$details[0]->product->shop ? $details[0]->product->shop->name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{$details[0]->order->user->name}}</td>
                            </tr>
                            <tr>
                                <th>Customer Phone No</th>
                                <td>{{$details[0]->order->user->phone}}</td>
                            </tr>
                            <tr>
                                <th>Pickup Address</th>
                                <td>
                                    @php 
                                        $address = json_decode($details[0]->order->shipping_address)
                                    @endphp
                                    {{$address->address}}, {{$address->city}}, {{$address->country}}
                                </td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>
                                    {{$address->address}}, {{$address->city}}, {{$address->country}}
                                </td>
                            </tr>
                            <tr>
                                <th>Delivery Person Name</th>
                                <td>----</td>
                            </tr>
                            <tr>
                                <th>Delivery Person Phone No</th>
                                <td>-----</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$details[0]->order->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                @php 
                                    $price = 0;
                                    foreach($details as $detail)
                                    {
                                        $price += ($detail->price * $detail->quantity) + $detail->tax + $detail->shipping_cost - $detail->coupon_discount;
                                    }
                                @endphp
                                <td class=""> 
                                    
                                    {{ $price }}
                                </td>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <td>
                                    @if($details[0]->order->payment_type == 'cash_on_delivery')
                                        Cash
                                    @elseif($details[0]->order->payment_type == 'stripe')
                                        Stripe
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>
                                    @if($details[0]->payment_status == 'paid')
                                        Paid
                                    @else
                                        Unpaid
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive ride-detail-table">
                        <div class="ride-detail-table-header">
                            <h5>Product Details</h5>
                        </div>
                        <table class="table table-bordered">
                            <tr style="border-top: 1px solid #dee2e6">
                                
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Cost</th>
                            </tr>
                                @php $item_total =0 @endphp
                                @foreach($details as $single_item)                                      
                                <tr>
                                    <td>
                                        @php 
                                            echo $single_item->product->name;
                                            if($single_item->variation != "")
                                            {
                                                echo "(".$single_item->variation.")";
                                            }
                                        @endphp
                                    </td>
                                    <td class="">
                                        ${{$single_item->price/$single_item->quantity}}
                                    </td>
                                    <td>
                                        {{$single_item->quantity}}
                                    </td>
                                    <td class="">
                                        ${{$single_item->price}}
                                        @php $item_total +=$single_item->price; @endphp
                                    </td>
                                </tr>
                                @endforeach                                                                                                                                                        <tr>
                                <td colspan="2" style="border-right: 1px solid #ffffff"></td>
                                <td>
                                    Item Total
                                </td>
                                <td class="">
                                    ${{$item_total}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-right: 1px solid #ffffff"></td>
                                <td>
                                    Discount
                                </td>
                                <td>

                                    <span class="">${{$details[0]->order->coupon_discount}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-right: 1px solid #ffffff"></td>
                                <td>
                                    Tax
                                </td>
                                <td class="">
                                    {{ $details[0]->tax }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-right: 1px solid #ffffff"></td>
                                <td>
                                    Delivery Charge
                                </td>
                                <td class="">
                                    ${{$details[0]->shipping_cost}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-right: 1px solid #ffffff"></td>
                                <td>
                                    <h3>Total Pay</h3>
                                </td>
                                <td>
                                    <h3 class=""> 
                                        ${{ ($item_total + $details[0]->tax + $details[0]->shipping_cost + $details[0]->packing_cost) - $details[0]->coupon_discount }}
                                    </h3>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('css_js_down')

@endsection



