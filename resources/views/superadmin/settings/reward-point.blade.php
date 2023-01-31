@extends('superadmin.master')

@section('page_title')
Reward Point Settings
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<style>
  .toggle-btn {
    width: 44px;
    height: 19px;
    margin: 10px 10px 10px 10px;
    border-radius: 50px;
    display: inline-block;
    position: relative;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==) no-repeat 50px center #b9b9b9;
    cursor: pointer;
    -webkit-transition: background-color .40s ease-in-out;
    -moz-transition: background-color .40s ease-in-out;
    -o-transition: background-color .40s ease-in-out;
    transition: background-color .40s ease-in-out;
    cursor: pointer;
  }

  .toggle-btn.active {
    /* background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC) no-repeat 10px center #b9b9b9; */
    background: url('{{asset("assets/images/website-logo-icon/switch-btn.png")}}') no-repeat 24px center #b9b9b9;
    background-size: 18px 18px;
  }

  .toggle-btn.active .round-btn {
    left: 45px;
    opacity: 0;
  }

  .toggle-btn .round-btn {
    width: 15px;
    height: 15px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    left: 5px;
    top: 50%;
    margin-top: -8px;
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

  .btn {
    padding: 5px 10px;
    margin-right: 5px;
  }

  .btn.btn-info {
    color: #fff;
    background-color: #061880;
    border-color: #061880;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
  }

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

  .select2-results__option {
    color: black !important;
    /* font-weight: bold !important; */
  }
</style>
@endsection

@section('main_content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Reward Point Settings</h4>
          </div>
          <div class="card-body">
            <form action="{{route('settings.reward-points-update')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">User will get 1 reward point for every ( $ amount) spent</label>
                    <input type="number" min="0.1" step="any" name="required_purchase" value="{{$data->value}}" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Currency</label>
                    <select class="form-control select2bs4" onchange="currencyChange()" id="currency" name="currency">
                      @foreach($currencies as $currency)
                      <option style="color: black !important;" value="{{$currency->id}}">{{$currency->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Reward Point Exchange Rate</label>
                    <input type="number" min="0.1" step="any" name="exchange_rate" class="form-control" id="exchange_rate">
                  </div>
                </div>
              </div>
              <button class="btn btn-primary float-right">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css_js_down')
<!-- DataTables  & Plugins -->
<!-- Select2 -->
<script src="{{asset('store_owner_assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
    // theme: "classic"
  });

  currencyChange();
  function currencyChange() {
    var currencies = JSON.parse(`{!!json_encode($currencies)!!}`);
    let currency = document.getElementById('currency').value;
    currencies.forEach(element => {
      if(element.id == currency) document.getElementById('exchange_rate').value = element.reward_point_exchange_rate;
    });
  }
</script>

<script>
  function customShowNotification(from, align, custom_message) {
    type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
      icon: "add_alert",
      message: custom_message

    }, {
      type: type[color],
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }
</script>

@if(Session::get('success_message'))
<script>
  customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif

@endsection