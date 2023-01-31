@extends('superadmin.master')

@section('page_title')
Customer Details
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')">
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')">
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')">
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
#map {
    height: 100%;
}
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
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">{{$user->name}}'s Ride {{ $ride->ride_no }} Details</h4>
                </div>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6">
                                    <div class="white-box text-center"><img  height="300px" src="{{$user->avatar ? $user->avatar : 'https://d2t5292uahafuy.cloudfront.net/public/assets/img/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png'}}" class="img-responsive"></div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6">
                                    <h2>
                                        Driver: 
                                        @if($ride->driver)
                                            {{$ride->driver->name}}
                                        @else
                                            --
                                        @endif
                                    </h2>
                                    <h2 class="mt-5">
                                        Total Pay: {{ single_price($ride->total_pay)}}
                                    </h2>
                                    <h2>
                                        Total Distance: {{$ride->total_distance}} km
                                    </h2>
                                    
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3 class="box-title mt-5 ml-5">General Info</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-product">
                                            <tbody>
                                                <tr>
                                                    <td width="390">Pickup Address</td>
                                                    <td>{{$ride->pickup_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Destination Address</td>
                                                    <td>{{$ride->destination_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Vehical Type</td>
                                                    <td>{{$ride->vehicle_type->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Eastimate Time</td>
                                                    <td>{{$ride->eta}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    @php $statuses = array(0 => "pending", 1 =>"accepted", 2 => "schedule-accepted", 3 => "arrived", 4 => "cancelled", 5 => "running", 6 => "drop", 7 => "payment", 8 => "rating", 9 => "completed", 10 => "failed", 12 => "collect_cash"); @endphp
                                                    <td>{{$statuses[$ride->status]}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date</td>
                                                    <td>{{$ride->pickup_datetime}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <a href="{{route('superadmin.customer.ride.list', $user->id)}}" class="btn btn-dark">Go Back</a>
              <div id="map"></div>
            </div>
            
            
            
            
          </div>
        </div>
      </div>
@endsection

@section('css_js_down')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap&v=weekly" defer></script>
    <script>

    // Australia which was made by Charles Kingsford Smith.
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: { lat:23.74616838,lng:90.39232055 },
    mapTypeId: "terrain",
  });
  const flightPlanCoordinates = [
    {lat:23.74584765,lng:90.3920491},
    {lat:23.74627614,lng:90.39225165},
    {lat:23.74602899,lng:90.39238244},
    {lat:23.74616838,lng:90.39232055},
    {lat:23.74629291,lng:90.39210817},
    {lat:23.74633458,lng:90.39219821},
    {lat:23.74637471,lng:90.39230811}
  ];
  const flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,
  });

  flightPath.setMap(map);
}

window.initMap = initMap;
</script>

@if(Session::get('success_message'))

@endif

@endsection



