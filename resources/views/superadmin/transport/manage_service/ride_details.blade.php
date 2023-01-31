@extends('superadmin.master')

@section('page_title')
Ride Details
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

  #map {
    z-index: 0;
  }

  .set-map {
    height: 300px;
    margin-bottom: 30px;
  }
  body{
    color:black;
  }
</style>
@endsection

@section('main_content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3>Ride route on map</h3>
        <div id="map" class="set-map" style="height: 500px;"></div>
      </div>
      <div class="col-md-6">
        <h3>Ride Details</h3>
        <table class="table table-responsive">
          <tr>
            <td>Ride No.</td>
            <td>: {{$rideDetails->ride_no}}</td>
          </tr>
          <tr>
            <td>Customer Name</td>
            <td>: {{ $rideDetails->user ? $rideDetails->user->name : 'N/A'}}</td>
          </tr>
          <tr>
            <td>Customer Contact Number</td>
            <td>: {{$rideDetails->user->phone}}</td>
          </tr>
          <tr>
            <td>Customer Email</td>
            <td>: {{$rideDetails->user->email}}</td>
          </tr>
          <tr>
            <td>Driver Name</td>
            <td>: {{ $rideDetails->rider_user ? $rideDetails->rider_user->name : 'N/A'}}</td>
          </tr>
          <tr>
            <td>Driver Contact Number</td>
            <td>: {{ $rideDetails->rider_user ? $rideDetails->rider_user->phone : 'N/A'}}</td>
          </tr>
          <tr>
            <td>Driver Email</td>
            <td>: {{ $rideDetails->rider_user ? $rideDetails->rider_user->email : 'N/A'}}</td>
          </tr>
          <tr>
            <td>Ride Start Time</td>
            <td>: {{$rideDetails->pickup_datetime}}</td>
          </tr>
          <tr>
            <td>Ride End Time</td>
            <td>: {{$rideDetails->destination_datetime}}</td>
          </tr>
          <tr>
            <td>Pickup Address</td>
            <td>: {{$rideDetails->pickup_address}}</td>
          </tr>
          <tr>
            <td>Destination Address</td>
            <td>: {{$rideDetails->destination_address}}</td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <h3>Fare Details</h3>
        <table class="table table-responsive">
          <tr>
            <td>Base Fare</td>
            <td>: {{$rideDetails->base_fare}}</td>
          </tr>
          <tr>
            <td>Total Distance</td>
            <td>: {{$rideDetails->total_distance}}</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>: {{$rideDetails->tax}}</td>
          </tr>
          <tr>
            <td>SubTotal</td>
            <td>: {{$rideDetails->total_pay}}</td>
          </tr>
          <tr>
            <td>Discount</td>
            <td>: {{$rideDetails->discount}}</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>: {{$rideDetails->total_pay}}</td>
          </tr>
          <tr>
            <td>Payment Type</td>
            @if($rideDetails->payment_type==1)
            <td>: Cash</td>
            @elseif($rideDetails->payment_type==2)
            <td>: Card</td>
            @elseif($rideDetails->payment_type==3)
            <td>: Wallet</td>
            @endif
          </tr>
          <tr>
            <td>Payment Status</td>
            @if($rideDetails->payment_status==0)
            <td>: Pending</td>
            @elseif($rideDetails->payment_status==1)
            <td>: Complete</td>
            @endif
          </tr>
          <tr>
            <td>Status</td>
            @if($rideDetails->payment_type==1)
            <td>: accepted</td>
            @elseif($rideDetails->payment_type==2)
            <td>: schedule-accepted</td>
            @elseif($rideDetails->payment_type==3)
            <td>: arrived</td>
            @elseif($rideDetails->payment_type==4)
            <td>: cancelled</td>
            @elseif($rideDetails->payment_type==5)
            <td>: running</td>
            @elseif($rideDetails->payment_type==6)
            <td>: drop</td>
            @elseif($rideDetails->payment_type==7)
            <td>: payment</td>
            @elseif($rideDetails->payment_type==8)
            <td>: rating</td>
            @elseif($rideDetails->payment_type==9)
            <td>: completed</td>
            @elseif($rideDetails->payment_type==10)
            <td>: failed</td>
            @elseif($rideDetails->payment_type==0)
            <td>: pending</td>
            @endif
          </tr>
        </table>
      </div>

    </div>
  </div>
</div>



@endsection

@section('css_js_down')

<script>
  function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
      center: {
        lat: -27.636310,
        lng: -52.274711
      }
    });
    directionsDisplay.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  }

  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
      origin: "`{{ isset($rideDetails)? $rideDetails->pickup_address : '' }}`",
      destination: "`{{ isset($rideDetails)? $rideDetails->destination_address : '' }}`",
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8h9J-8KnSaOQIs7LXwjfE4LPD8ch5NI0&libraries=places&callback=initMap" async defer></script>

@if(Session::get('success_message'))
<script>
  customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif

@endsection