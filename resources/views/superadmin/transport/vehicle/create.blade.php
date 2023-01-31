@extends('superadmin.master')

@section('page_title')
Add Vehicle
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Vehicle</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('transport.vehicle.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="bmd-label-floating">Service Category</label>
                                        <select class="form-control select2bs4" name="service_category_id" id="service_category_id">
                                            <option value="">Select Option</option>
                                            @foreach($serviceCategories as $serviceCategory)
                                            <option value="{{$serviceCategory->id}}">{{$serviceCategory->name}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('service_category_id') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label class="bmd-label-floating">Icon</label>
                                        <br>
                                        <input type="file" name="icon_name" id="icon" />
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('icon_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Cost per km</label>
                                        <input type="number" min="1" name="cost_for_km" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('cost_for_km') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Cost per min</label>
                                        <input type="number" min="1" name="cost_per_min" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('cost_per_min') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Weight Limit</label>
                                        <input type="text" name="weight_limit" class="form-control">
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('weight_limit') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Dimension Limit</label>
                                        <input type="text" name="dimension_limit" class="form-control">
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('dimension_limit') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Base Fare</label>
                                        <input type="number" min="1" name="base_fare" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('base_fare') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Time Fare</label>
                                        <input type="number" min="1" name="time_fare" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('time_fare') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Rental cost per Km</label>
                                        <input type="number" min="1" name="rental_cost_for_km" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('rental_cost_for_km') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. of Seats</label>
                                        <input type="number" min="1" name="no_of_seats" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('no_of_seats') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Rental amount for 1hour</label>
                                        <input type="number" min="1" name="rental_amount_for_1hour" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('rental_amount_for_1hour') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Rental km limit for 1hour</label>
                                        <input type="text" name="rental_km_limit_for_1hour" class="form-control" required>
                                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('rental_km_limit_for_1hour') }}</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Add</button>
                            <div class="clearfix"></div>
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
<!-- Select2 -->
<script src="{{asset('store_owner_assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
     //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
    // theme: "classic"
  });
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

@if(Session::get('error_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
@endif

@endsection