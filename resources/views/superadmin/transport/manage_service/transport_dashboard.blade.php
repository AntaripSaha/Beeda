@extends('superadmin.master')

@section('page_title')
Store Dashboard
@endsection

@section('css_js_up')
<style>
    .card [class*="card-header-"] .card-icon, .card [class*="card-header-"] .card-text {
        border-radius: 50%;
        background-color: #999999;
        padding: 5px;
        margin-top: -30px;
        margin-right: 15px;
        float: left;
    }
    .card-title{
        text-align:right !important;
    }
    .order_history_heading{
        color: black;
        font-size: 16px;
        margin-left: 15px;
    }
</style>
@endsection

@section('main_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="{{assetUrl().$service->icon_image}}" style="width:60px;" />
                <span style="font-size: 20px;font-weight: bolder;color:black;">{{$service->name}} <small>(Summery)</small></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store_mall_directory</i>
                        </div>
                        <p class="card-category">Approved Drivers</p>
                        <h3 class="card-title">{{$info->total_approved_stores}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <p class="card-category">Active Drivers</p>
                        <h3 class="card-title">{{$info->total_live_stores}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">pending</i>
                        </div>
                        <p class="card-category">UnApproved Drivers</p>
                        <h3 class="card-title">{{$info->total_pending_stores}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">money</i>
                        </div>
                        <p class="card-category">Earnings</p>
                        <h3 class="card-title">${{$info->earnings}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h4 class="order_history_heading">Last 30 Days {{$service->name}} Statistics</h4>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">shopping_bag</i>
                        </div>
                        <p class="card-category">Total Rides</p>
                        <h3 class="card-title">{{$info->total_orders}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">check_circle</i>
                        </div>
                        <p class="card-category">Completed Rides</p>
                        <h3 class="card-title">{{$info->total_completed_orders}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">sync</i>
                        </div>
                        <p class="card-category">Running Rides</p>
                        <h3 class="card-title">{{$info->total_running_orders}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">cancel</i>
                        </div>
                        <p class="card-category">Cancelled Rides</p>
                        <h3 class="card-title">{{$info->total_cancelled_orders}}</h3>
                    </div>
                </div>
            </div>
        </div>
        @if($service->id == \App\Constants\ServiceCategoryType::COURIER)
        <div class="row">
            <div class="col-lg-2">
                <a href="{{ route('transport.courier.package-type.list') }}" class="btn btn-primary">Package Types</a>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('transport.courier.package-attribute.list') }}" class="btn btn-info">Package Attributes</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('css_js_down')

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