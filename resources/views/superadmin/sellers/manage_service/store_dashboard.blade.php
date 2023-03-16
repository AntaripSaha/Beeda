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
                <img src="{{assetUrl().$service->icon_image}}" style="width:60px;"/>
                <span style="font-size: 20px;font-weight: bolder;color:black;">{{$service->name}} <small>(Summery)</small></span>
            </div>
        </div>
        <br>
        <div class="row">
            @if(\App\Constants\ServiceCategoryType::REAL_ESTATE == $service->id)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">real_estate_agent</i>
                        </div>
                        <p class="card-category">Total Agents</p>
                        <h3 class="card-title">{{$total_agents}}
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">apartment</i>
                        </div>
                        <p class="card-category">Total Properties</p>
                        <h3 class="card-title">{{$total_properties}}
                        </h3>
                    </div>
                    </div>
                </div>
            @else
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">store_mall_directory</i>
                    </div>
                    <p class="card-category">Approved Stores</p>
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
                    <p class="card-category">Live Stores</p>
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
                    <p class="card-category">Pending Stores</p>
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
            @endif
        </div>
        <br>
        @if(\App\Constants\ServiceCategoryType::REAL_ESTATE != $service->id)
        <div class="row">
            <h4 class="order_history_heading">Last 30 Days {{$service->name}} Statistics</h4>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">shopping_bag</i>
                    </div>
                    <p class="card-category">Total Orders</p>
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
                    <p class="card-category">Completed Orders</p>
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
                    <p class="card-category">Running Orders</p>
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
                    <p class="card-category">Cancelled Orders</p>
                    <h3 class="card-title">{{$info->total_cancelled_orders}}</h3>
                </div>
                </div>
            </div>
        </div>
        @endif

        {{-- Blog management start --}}
        <br>
        @if($service->id == \App\Constants\ServiceCategoryType::BEEDA_MALL)
        <div class="row">
            <div class="col-lg-6">
                <h4 class="order_history_heading mt-2 text-uppercase font-weight-bold">{{$service->name}} Manage Blog</h4>
            </div>

            <div class="col-lg-6 text-right">
                <a href="{{ route('blog.index') }}" class="btn btn-primary">Blogs</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Total Web Blog</p>
                    <h3 class="card-title">{{$total_web_blogs}}
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
                    <p class="card-category">Total Mobile Blog</p>
                    <h3 class="card-title">{{$total_mobile_blogs}}</h3>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="order_history_heading mt-2 text-uppercase font-weight-bold">Home Page Section Categories</h4>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('home.section.category') }}" class="btn btn-primary">Set Category</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Category section 1</p>
                    <h4 class="card-title">
                        Category Name: {{ $category_section['section_1_cat_name']->name }}
                    </h4>
                    <h4 class="card-title">
                        Section Name: {{ $category_section['section_1_name']->value }}
                    </h4>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Category section 2</p>
                    <h4 class="card-title">
                        Category Name:  {{ $category_section['section_2_cat_name']->name }}
                    </h4>
                    <h4 class="card-title">
                        Section Name: {{ $category_section['section_3_name']->value }}
                    </h4>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Category section 3</p>
                    <h4 class="card-title">
                        Category Name:  {{ $category_section['section_3_cat_name']->name }}
                    </h4>
                    <h4 class="card-title">
                        Section Name: {{ $category_section['section_3_name']->value }}
                    </h4>
                </div>
                </div>
            </div>
        </div>
        @endif
        {{-- Blog management end --}}

        @if($service->id == \App\Constants\ServiceCategoryType::FOOD)
        <div class="row">
            <div class="col-lg-1">
                <a href="{{ route('superadmin.cuisine.index') }}" class="btn btn-primary">Cuisines</a>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('worlds-brands.index') }}" class="btn btn-info">Worlds Brands</a>
            </div>
        </div>
        @endif


        {{-- Pharmacy home category start --}}
        <br>
        @if($service->id == \App\Constants\ServiceCategoryType::PHARMACY)
        {{-- @dd($pharmacy_category_section); --}}
        <div class="row">
            <div class="col-lg-6">
                <h4 class="order_history_heading mt-2 text-uppercase font-weight-bold">Pharmacy Home Page Section Categories(Mobile APP)</h4>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('pharmacy.section.category') }}" class="btn btn-primary">Set Category</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Category section 1</p>
                    <h4 class="card-title">
                        Category Name: {{ $pharmacy_category_section['pharmacy_category_name_1']->value }}
                    </h4>
                    <h4 class="card-title">
                        Section Name: {{ $pharmacy_category_section['pharmacy_category_section_1']->name }}
                    </h4>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Category section 2</p>
                    <h4 class="card-title">
                        Category Name:  {{ $pharmacy_category_section['pharmacy_category_name_2']->value }}
                    </h4>
                    <h4 class="card-title">
                        Section Name: {{ $pharmacy_category_section['pharmacy_category_section_2']->name }}
                    </h4>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <p class="card-category">Category section 3</p>
                    <h4 class="card-title">
                        Category Name:  {{ $pharmacy_category_section['pharmacy_category_name_3']->value }}
                    </h4>
                    <h4 class="card-title">
                        Section Name: {{ $pharmacy_category_section['pharmacy_category_section_3']->name }}
                    </h4>
                </div>
                </div>
            </div>
        </div>
        @endif
        {{-- Pharmacy home category end --}}


    </div>
</div>
@endsection

@section('css_js_down')

<script>
function customShowNotification (from, align, custom_message) {
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



