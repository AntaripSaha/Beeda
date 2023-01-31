@extends('superadmin.master')

@section('page_title')
Customer Details
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')">
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')">
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')">
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
.btn{
  padding: 5px 10px;
  margin-right: 5px;
}
.btn.btn-info {
    color: #fff;
    background-color: #061880;
    border-color: #061880;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
}
</style>
@endsection

@section('main_content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">{{$user->name}}'s Details</h4>
                </div>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6">
                                    <div class="white-box text-center"><img  height="300px" src="{{$user->avatar ? $user->avatar : 'https://d2t5292uahafuy.cloudfront.net/public/assets/img/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png'}}" class="img-responsive"></div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6">
                                    <h2 class="mt-5">
                                        Balance: {{$user->currency}} {{$user->balance}}
                                    </h2>
                                    <h2>
                                        Total Orders: {{count($user->orders)}}
                                    </h2>
                                    <h2>
                                        Total Rides: {{count($rides)}}
                                    </h2>
                                    <ul class="list-unstyled">
                                      @if($user->email_verified_at)
                                        <li><i class="fa fa-check text-success"></i> Email Verified</li>
                                      @else
                                      <li><i class="fa fa-ban text-danger"></i> Email Not Verified</li>
                                      @endif
                                      @if($user->phone)
                                        @if($user->is_phone_verified)
                                          <li><i class="fa fa-check text-success"></i> Phone Verified</li>
                                        @else
                                        <li><i class="fa fa-ban text-danger"></i> Phone Not Verified</li>
                                        @endif
                                      @else
                                        <li><i class="fa fa-ban text-danger"></i> Phone Not Added</li>
                                      @endif
                                      <li class="mt-5">
                                        <a href="{{route('wallet.transaction-details',['id'=>$user->id])}}"><button class="btn btn-primary">Transactions</button></a>
                                        <a href="{{route('superadmin.customer.login-activity',['id'=>$user->id])}}"><button class="btn btn-info">Login Activities</button></a>
                                        <a href="{{route('superadmin.customer.order.list',['id'=>$user->id])}}"><button class="btn btn-success">Orders</button></a>
                                        <a href="{{route('superadmin.customer.ride.list',['id'=>$user->id])}}"><button class="btn btn-dark">Rides</button></a>
                                      </li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3 class="box-title mt-5 ml-5">General Info</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-product">
                                            <tbody>
                                                <tr>
                                                    <td width="390">Name</td>
                                                    <td>{{$user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Currency</td>
                                                    <td>{{$user->currency}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Reward Points</td>
                                                    <td>{{$user->reward_points}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Member Since</td>
                                                    <td>{!! date('F j, Y', strtotime($user->created_at)) !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <a href="{{route('superadmin.customer.index')}}" class="btn btn-dark">Go Back</a>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('css_js_down')


@if(Session::get('success_message'))

@endif

@endsection



