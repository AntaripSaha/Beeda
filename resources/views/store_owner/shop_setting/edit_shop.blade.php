@extends('store_owner.master')

@section('page_title')
    Edit Shop
@endsection

@section('css_js_up')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/summernote/summernote-bs4.min.css')}})">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- tags input -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/tags_input/tagsinput.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugin/mdtimepicker.min.css')}}" type="text/css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/jquery.steps.css')}}" type="text/css"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/widget/widget.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/file-upload/jquery.filer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/file-upload/jquery.filer-dragdropbox-theme.css') }}">

  <style>
.term-check{
    font-size: 14px;
    font-weight: 400;
}
.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 40px;
    margin-bottom: 0;
}
.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 40px;
    margin: 0;
    opacity: 0;
}
.custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: 40px;
    padding: .375rem .75rem;
    font-weight: 400;
    line-height: 2;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: 38px;
    padding: .375rem .75rem;
    line-height: 2;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: inherit;
    border-radius: 0 .25rem .25rem 0;
}
.footer-link{
    margin-top: 30px;
}
.all-info-container{

}
.list-content{
    margin-bottom: 10px;
}
.list-content a{
    padding: 10px 15px;
    width: 100%;
    display: inline-block;
    background-color: #f5f5f5;
    position: relative;
    color: #565656;
    font-weight: 400;
    border-radius: 4px;
}
.list-content a[aria-expanded="true"] i{
    transform: rotate(180deg);
}
.list-content a i{
    text-align: right;
    position: absolute;
    top: 15px;
    right: 10px;
    transition: 0.5s;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #fdfdfd;
}
.list-box{
    padding: 10px;
}
.signup-logo-header .logo_area{
    width: 200px;
}
.signup-logo-header .nav > li{
    padding: 0;
}
.signup-logo-header .header-flex{
    display: flex;
    justify-content: center;
    align-items: center;
}
.list-inline li{
    display: inline-block;
}
.pull-right{
    float: right;
}
/*-----------custom-checkbox-----------*/
/*----------Custom-Checkbox---------*/
input[type="checkbox"]{
    position: relative;
    display: inline-block;
    margin-right: 5px;
}
input[type="checkbox"]::before,
input[type="checkbox"]::after {
    position: absolute;
    content: "";
    display: inline-block;
}
input[type="checkbox"]::before{
    height: 16px;
    width: 16px;
    border: 1px solid #999;
    left: 0px;
    top: 0px;
    background-color: #fff;
    border-radius: 2px;
}
input[type="checkbox"]::after{
    height: 5px;
    width: 9px;
    left: 4px;
    top: 4px;
}
input[type="checkbox"]:checked::after{
    content: "";
    border-left: 1px solid #fff;
    border-bottom: 1px solid #fff;
    transform: rotate(-45deg);
}

input[type="checkbox"]:checked::before {
    background-color: #061880;
    border-color: #061880;
}





@media (max-width: 767px){
    .sign-content h3{
        font-size: 40px;
    }
    .wizard .nav-tabs > li a i{
        display: none;
    }
    .signup-logo-header .navbar-toggle{
        margin: 0;
        margin-top: 8px;
    }
    .signup-logo-header .logo_area{
        margin-top: 0;
    }
    .signup-logo-header .header-flex{
        display: block;
    }
}



.radio, .radio label {
            cursor: pointer;
        }

        .wizard > .content > .body input[type="checkbox"] {
            display: none;
        }

        .border-checkbox-section {
            margin: 0;
        }

        .every_d_opn_time, .every_d_cls_time {
            margin-top: 5px;
        }

        .border-checkbox-section .border-checkbox-group .border-checkbox-label:before {
            top: 11px;
        }

        .border-checkbox-section .border-checkbox-group .border-checkbox-label:after {
            top: 21px;
        }

        .comp-card i {
            width: 35px !important;
            height: 35px !important;
            padding: 8px 0 !important;
        }

        .comp-card:hover i {
            border-radius: 5px !important;
        }

        .comp-card i:hover {
            border-radius: 50% !important;
        }

        .document_view, .document_status {
            cursor: pointer;
        }

        .doc_service_cat {
            display: none;
        }

        .input-controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #searchInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }

        #searchInput:focus {
            border-color: #4d90fe;
        }



        .wizard > .content {
            background: #ffffff;
        }

        .pcoded[theme-layout="vertical"][vertical-placement="left"][vertical-nav-type="expanded"][vertical-effect="shrink"] .pcoded-content {
            margin-left: 0;
        }

        .form-control:disabled, .form-control[readonly] {
            background: transparent;
        }

        .wizard > .content > .body {
            position: relative;
            height: auto;
            width: 100%;
        }

        .wizard > .content {
            min-height: 230px;
        }

        .wizard > .content > .body input {
            border: 1px solid #ccc !important;
        }

        .image {
            padding-top: 0;
        }

        #image-preview-1 {
            border: 1px solid #9e9e9e;
            width: 100%;
            height: 220px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            cursor: pointer;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        #image-preview-2 {
            border: 1px solid #9e9e9e;
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            cursor: pointer;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        #image-preview-1 input, #image-preview-2 input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview-1 label, #image-preview-2 label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer !important;
            background-color: #000000d1;
            color: white;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }

        .bg-custom-1 {
            background-color: #85144b;
        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }
  </style>
  <style type="text/css">
    img {
      /* display: block; */
      max-width: 100%;
    }
    .preview {
      overflow: hidden;
      width: 290px; 
      height: 300px;
      margin: 10px;
      border: 1px solid red;
    }
    .modal-lg{
      max-width: 1000px !important;
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
            <h1 class="m-0">Edit Shop</h1><br>
           <!--  <button type="button" class="btn btn-secondary">Secondary</button>
            <button type="button" class="btn btn-success">Success</button>
            <button type="button" class="btn btn-danger">Danger</button> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Edit Shop</a></li>
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
                      <!-- form start -->
        <form action="{{route('shop.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{$shop_id}}"/>
        <div class="row">
        <div class="col-12">
            <!-- general form elements -->
            <!-- product information -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shop Information</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label for="store_name">Shop Name</label>
                        <input type="text" class="form-control" name="store_name" id="store_name" value="{{$shop->name}}" placeholder="Enter Shop Name">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="delivery_radius">Delivery Radius</label>
                        @php $radius = explode(' ', $shop->radius); $delivery_radius = $radius[0]; $radius_unit = $radius[1]; @endphp
                        <input type="text" class="form-control" name="delivery_radius" id="delivery_radius" value="{{$delivery_radius}}" placeholder="Enter Delivery Radius">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="radius_unit">Radius Unit</label>
                        <select class="form-control" id="radius_unit" name="radius_unit">
                            <option value="Mile" @if($radius_unit == 'M') selected @endif>Mile</option>
                            <option value="KM" @if($radius_unit == 'KM') selected @endif>KM</option>
                        </select>
                        </div>
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label for="delivery_time">Estimated Delivery Time</label>
                        @php $time = explode(' ', $shop->eta_delivery_time); $delivery_time = $time[0]; $time_unit = $time[1]; @endphp
                        <input type="text" class="form-control" name="delivery_time" id="delivery_time" value="{{$delivery_time}}" placeholder="Enter Delivery Time" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="time_unit">Time Unit</label>
                        <select class="form-control" id="time_unit" name="time_unit">
                            <option value="MIN" @if($time_unit == 'MIN') selected @endif>MIN</option>
                            <option value="HOUR" @if($time_unit == 'HOUR') selected @endif>HOUR</option>
                            <option value="DAYS" @if($time_unit == 'DAYS') selected @endif>DAYS</option>
                        </select>
                        </div>
                    </div>
                    @php
                        $pickup_time_start = '';
                        $pickup_time_end = '';
                        if ($shop->pickup_status == 1) {
                            $pickup_time_start = explode("-", $shop->pickup_time)[0];
                            $pickup_time_end = explode("-", $shop->pickup_time)[1];
                        }
                    @endphp
                    <div class="col-2">
                        <div class="form-group">
                        <label for="pickup_time">
                            Pickup Time
                            <span style="margin-left: 10px;">
                                <input type="checkbox" name="pickup_status" id="pickup_status" onclick="pickupFunction()"
                                @if($shop->pickup_status == 1) checked @endif>
                            </span>
                            <span style="margin-left: 10px;">(Pickup ON/OFF)</span>
                        </label>
                        <input type="text" class="form-control timepicker" name="pickup_time_start" id="pickup_time_start" value="{{$pickup_time_start}}" placeholder="Pickup time start" @if($shop->pickup_status == 0) disabled @endif>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="pickup_time" class="sr-only">Pickup Time End</label>
                            <input type="text" class="form-control timepicker" name="pickup_time_end" id="pickup_time_end" value="{{$pickup_time_end}}" placeholder="Pickup time end" style="margin-top: 32px;" @if($shop->pickup_status == 0) disabled @endif>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <p style="margin-top: -16px; color: #0606068c; font-weight: bolder; font-size: 15px;">
                            If shop pickup time available, then choose start time and end time.
                        </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" placeholder="Enter Description">{{$shop->description}}</textarea>
                        </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Store Timings</label>
                            <!-- timeing area -->
                            <div>
                            <div class="col-md-12">
                            <div class="form-group row" id="every_d">
                                <div class="col-sm-4">
                                    <div class="border-checkbox-section row">
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input name="day[]"
                                                value="all"
                                                class="border-checkbox"
                                                @if(!isset($store_open_timings) || isset($store_open_timings) && count($store_open_timings)==1)
                                                checked
                                                @endif
                                                type="checkbox"
                                                id="checkbox_every">
                                            <label class="border-checkbox-label"
                                                for="checkbox_every">
                                            </label>
                                            <span>EveryDay</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="every_d_opn_time input-top-bottom-margin col-sm-4"
                                    @if(isset($store_open_timings) && count($store_open_timings)>1) style="display:none" @endif>
                                    <input type="text"
                                        class="form-control timepicker required time_all"
                                        id="every_open_time"
                                        name="open_time[0]"
                                        placeholder="Open"
                                        value="{{ (isset($store_open_timings)) ? ((array_key_exists("all",$store_open_timings)) ? $store_open_timings['all'] : '' ) : old('open_time.0') }}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                                <div class="col-sm-4 every_d_cls_time"
                                    @if(isset($store_open_timings) && count($store_open_timings)>1) style="display:none" @endif>
                                    <input type="text"
                                        class="form-control timepicker required time_all"
                                        name="close_time[0]"
                                        id="every_close_time"
                                        placeholder="Close"
                                        value="{{ (isset($store_close_timings)) ? ((array_key_exists("all",$store_close_timings)) ? $store_close_timings['all'] : '' ) : old('close_time.0') }}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <div id="day_wise"
                        @if(!isset($store_open_timings) || isset($store_open_timings) && count($store_open_timings)==1) style="display: none;" @endif>
                        <?php $days = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];?>
                        @for($i=0;$i<count($days);$i++)

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="border-checkbox-section row">
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input name="day[]"
                                                value="{{$days[$i]}}"
                                                class="border-checkbox checkbox_all"
                                                @if(isset($store_open_timings) && array_key_exists($days[$i],$store_open_timings) || !isset($store_open_timings))
                                                checked
                                                @endif
                                                type="checkbox"
                                                id="checkbox_{{$days[$i]}}"
                                                >
                                            <label class="border-checkbox-label"
                                                for="checkbox_{{$days[$i]}}">
                                            </label>
                                            {{ $days[$i] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="input-top-bottom-margin col-sm-4">
                                    <input type="text"
                                        class="form-control timepicker day_time"
                                        name="open_time[{{$i+1}}]"
                                        placeholder="Open"
                                        value="{{ (isset($store_open_timings)) ? ((array_key_exists($days[$i],$store_open_timings)) ? $store_open_timings[$days[$i]] : '' ) : old("open_time.$i+1") }}">

                                </div>
                                <div class="col-sm-4">
                                    <input type="text"
                                        class="form-control timepicker day_time"
                                        name="close_time[{{$i+1}}]"
                                        placeholder="Close"
                                        value="{{ (isset($store_close_timings)) ? ((array_key_exists($days[$i],$store_close_timings)) ? $store_close_timings[$days[$i]] : '' ) : old("close_time.$i+1") }}">
                                </div>
                            </div>
                        @endfor

                    </div>
                    </div>
                  </div>
                  <div class="row">  
                      <div class="col-6">
                        <div class="form-group">
                            <label for="packaging_charge">Packaging Charge</label>
                            <input type="text" class="form-control" name="packaging_charge" value="{{$shop->shipping_cost}}" id="store_banner">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="packaging_charge">Minimum Order</label>
                            <input type="number" class="form-control" name="order_min_amount" value="{{$shop->order_min_amount}}" id="order_min_amount">
                        </div>
                      </div>
                  </div>
                  <div class="row">  
                      <div class="col-12">
                        <div class="form-group">
                            <label for="store_banner">Desktop Banner</label>
                            <p>(1370x200)</p>
                            <input type="file" class="1370-200-137-20-desktop_banner_preview-crop_desktop_logo" name="" id="image_logo">
                        </div>
                        <div class="col-8 d-flex justify-content-center">
                            @if(isset($shop->banner_img->file_name))
                            <img src="{{assetUrl().$shop->banner_img->file_name}}"  id="desktop_banner_preview" style="height:100px;">
                            @else
                            <img src=""  id="desktop_banner_preview" />
                            @endif
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                            <label for="mobile_banner">Mobile Banner</label>
                            <p>(480x240)</p>
                            <input type="file" class="480-240-2-1-mobile_banner_preview-crop_mobile_logo" name="" id="image_logo">
                        </div>
                        <div class="col-8 d-flex justify-content-center">
                            @if(isset($shop->banner_img_mobile->file_name))
                            <img src="{{assetUrl().$shop->banner_img_mobile->file_name}}"  id="mobile_banner_preview" style="height:100px;">
                            @else
                            <img src=""  id="mobile_banner_preview" style="height:100px;">
                            @endif
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                            <label for="store_logo">Store Logo</label>
                            <p>(100x100px)</p>
                            <input type="file" class="100-100-1-1-logo_preview-crop_logo" name="" id="image_logo">
                        </div>
                        <div class="col-8 d-flex justify-content-center">
                            @if(isset($shop->logo_img->file_name))
                            <img src="{{assetUrl().$shop->logo_img->file_name}}"  id="logo_preview" style="height:100px;">
                             @else
                            <img src=""  id="logo_preview"  style="height:100px;"/>
                            @endif
                        </div>
                      </div>
                  </div>
                  <div class="row">
                   
                  @foreach($shop->seller_documents as $seller_document)
                    @php 
                        $shop_document_id = []; 
                        foreach($shop->seller_documents as $seller_doc)
                        {
                            $shop_document_id[] = $seller_doc->required_document_id;
                        }
                    @endphp
                  @endforeach

                    @foreach($shop->seller_service->service_category->documents as $single_doc) 
                        @if($shop->seller_documents && count($shop->seller_documents) > 0)
                            @foreach($shop->seller_documents as $seller_document)
                                @if($seller_document->required_document_id == $single_doc->id)
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="service_document_files">{{$seller_document->required_document->name}}</label>
                                            <br><embed src="{{assetUrl().$seller_document->doc_file->file_name}}" style="width:150px;height:100px" />
                                        </div>
                                    </div>    
                                @endif
                            @endforeach
                            @if(!in_array($single_doc->id, $shop_document_id))
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="service_document_files">{{$single_doc->name}}</label>
                                        <input type="hidden" name="document_ids[]" value="{{$single_doc->id}}" />
                                        <input type="file" class="form-control" name="service_document_files[]">
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="col-12">
                            <div class="form-group">
                                <label for="service_document_files">{{$single_doc->name}}</label>
                                <input type="hidden" name="document_ids[]" value="{{$single_doc->id}}" />
                                <input type="file" class="form-control" name="service_document_files[]">
                            </div>
                            </div>
                        @endif    
                    @endforeach
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="store_address">Store Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$shop->address}}" placeholder="Choose from map">
                            <input type="hidden" name="address_long" id="lng" value="{{$shop->address_long}}" class="form-control">
                            <input type="hidden" name="address_lat" id="lat" value="{{$shop->address_lat}}" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <label>Select Your Store Address</label>
                    </div>
                    <div class="col-md-12">
                        <input id="searchInput" value="{{$shop->address}}" name="store_address"
                                class="form-control col-sm-6 mt-2"
                                type="text" placeholder="Enter a location">
                        <div class="map" id="map"
                                style="width: 100%; height: 300px;"></div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{$shop->meta_title}}" placeholder="Enter Meta Title">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Description">{{$shop->meta_description}}</textarea>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label>Social Media Link</label>
                        <hr>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$shop->facebook}}" placeholder="Enter Facebook Link">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{$shop->twitter}}" placeholder="Enter Twitter Link">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="google">Google</label>
                        <input type="text" class="form-control" name="google" id="google" value="{{$shop->google}}" placeholder="Enter Google Link">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="youtube">Youtube</label>
                        <input type="text" class="form-control" name="youtube" id="youtube" value="{{$shop->youtube}}" placeholder="Enter Youtube Link">
                        </div>
                    </div>
                  </div>
                  <br>
                    <!-- Crop -->
                    <!-- Crop -->
                    <input type="hidden" name="crop_logo" class="crop_logo">
                    <input type="hidden" name="crop_desktop_logo" class="crop_desktop_logo">
                    <input type="hidden" name="crop_mobile_logo" class="crop_mobile_logo">
                    <!-- Crop -->
                    <!-- Crop -->
                  <div class="row">
                      <div class="col-12" style="text-align:right;">
                          <input type="submit" class="btn" style="background-color: #061880;border-color: #061880;color:white;" value="Update" />
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- product information end -->
        </div>
        </div>
        <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<!-- MODAL START -->
<!-- MODAL START -->
<div class="modal fade" id="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                <button type="button" class="close" id="crop_modal_cancel" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL END -->
<!-- MODAL END -->




@endsection

@section('css_js_down')
<!-- Summernote -->
<script src="{{asset('store_owner_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('store_owner_assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Tags Input -->
<script src="{{asset('store_owner_assets/tags_input/tagsinput.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('store_owner_assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<script src="//maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places"></script>
<script>

    // google map
    function initialize() {
        @if(isset($shop) && $shop->address_lat != Null && $shop->address_long != Null)
            var lati = '{{ $shop->address_lat }}';
            var longi = '{{ $shop->address_long }}';
            var latlng = new google.maps.LatLng(lati, longi);
        @else
            var latlng = new google.maps.LatLng(18.0179, -76.8099);
        @endif

        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 17
        });

        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });
        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var geocoder = new google.maps.Geocoder();
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);
        });
        // this function will work on marker move event into map
        google.maps.event.addListener(marker, 'dragend', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        // console.log(results);
                        bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }

    function bindDataToForm(address, lat, lng) {
        document.getElementById('address').value = address;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        document.getElementById('searchInput').value = address;
        // console.log(address);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    // google map end
</script>
<script>
    $("#store_details_form").hide();
    function setServiceId(id)
    {
        $("#seller_service_id").val(id);
        $("#store_details_form").show();
        $.ajax({
            url: '{{url("get-service-document")}}'+'/'+id,
            success: function(data){
                console.log(data);
                if(data.service_documents)
                {
                    console.log(data.service_documents.document.length);
                    if(data.service_documents.document.length > 0)
                    {
                         $("#document_area").html("");
                         var append_files = "<br>";
                         for(var i=0; i < data.service_documents.document.length; i++)
                         {
                            append_files += '<label>'+data.service_documents.document[i].name+'</label><input type="file" class="form-control" name="service_document_files[]" /><input type="hidden" name="document_ids[]" value="'+data.service_documents.document[i].id+'"><br>';
                         }
                         $("#document_area").html(append_files);
                    }
                    else
                    {
                        $("#document_area").html("");
                    }
                }
            }
        });
    }
</script>

 <!-- store timing script    -->
 <script type="text/javascript">
    $(function () {
        $("#checkbox_every").click(function () {
            if ($(this).is(":checked")) {
                $("#day_wise").hide();
                $(".every_d_cls_time").show();
                $(".every_d_opn_time").show();
                $(".day_time").val("");

            } else {
                $("#day_wise").show();
                $(".every_d_cls_time").hide();
                $(".every_d_opn_time").hide();
                $("#every_open_time").val("");
                $("#every_close_time").val("");
            }
        });

        $("#checkbox_every").click(function () {
            if ($(this).is(":checked")) {
                $("#day_wise").hide();
                $("#day_wise .checkbox_all").removeClass('required');
                $(".every_d_cls_time").show();
                $(".every_d_opn_time").show();
                $(".every_d_cls_time .time_all").addClass('required');
                $(".every_d_opn_time .time_all").addClass('required');
            } else {
                $("#day_wise").show();
                $("#day_wise .checkbox_all").addClass('required');
                $(".every_d_cls_time .time_all").removeClass('required');
                $(".every_d_opn_time .time_all").removeClass('required');
                $(".every_d_cls_time").hide();
                $(".every_d_opn_time").hide();
            }
        });
    });
</script>
 <!-- store timing script end -->

 <!-- time picker plugin -->
 <script src="{{ asset('assets/js/plugin/mdtimepicker.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.timepicker').mdtimepicker(); //Initializes the time picker
    });
</script>
 <!-- time picker plugin end -->

 <!-- upload banner image script -->
 <script src="{{ asset('assets/js/upload_image.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#image-upload-1", // Default: .image-upload
            preview_box: "#image-preview-1", // Default: .image-preview
            label_field: "#image-label-1", // Default: .image-label
            label_default: "Choose Image", // Default: Choose File
            label_selected: "Change Image", // Default: Change File
            no_label: false // Default: false
        });
        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose Image", // Default: Choose File
            label_selected: "Change Image", // Default: Change File
            no_label: false // Default: false
        });
    });
</script>
 <!-- upload banner image end -->


@if(Session::get('success_message'))
<script>
  iziToast.success({
      title: 'Success',
      position: 'topRight',
      message: '{{Session::get("success_message")}}',
  });
</script>
@endif
@if(Session::get('error_message'))
<script>
  iziToast.error({
      title: 'Error',
      position: 'topRight',
      message: '{{Session::get("error_message")}}',
  });
</script>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>


<script type="text/javascript">       
//modal & crop logo
var image = document.getElementById('image');
var $modal1 = $('#modal');
var width;
var height;
var ratioLeft;
var ratioRight;
var preview;
var copped;
$("body").on("change", "#image_logo", function(e){
    var classAtt = $(this).attr('class');
    // alert(classAtt);
    var att = classAtt.split("-");
    width = att[0];
    height = att[1];
    ratioLeft = att[2];
    ratioRight = att[3];
    preview = att[4];
    copped = att[5];
    var cropper;
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        $modal1.modal('show');
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
        done(URL.createObjectURL(file));
        } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
        done(reader.result);
        };
        reader.readAsDataURL(file);
        }
    }
});
$modal1.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        aspectRatio: Number(ratioLeft)/Number(ratioRight),
        viewMode: 1,
        preview: '.preview',
        dragMode: 'move',
        autoCropArea: 0.3,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        data:{ //define cropbox size
            width: Number(width) ,
            height:  Number(height),
        },
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});
$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
        width: width,
        height: height,
    });
    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob); 
        reader.onloadend = function() {
            var base64data = reader.result; 
            $modal1.modal('hide');
 
            $("." +copped).val(base64data);  

            document.getElementById(preview).style.display = 'block';
            document.getElementById(preview).src = base64data;

        }
    });
})
</script>

<script>
    $("#crop_modal_cancel").click(function() {
        $("#modal").modal("hide");
    });
</script>

<script>
    function pickupFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("pickup_status");
  // Get the output text
  var pickup_time_start = document.getElementById("pickup_time_start");
  var pickup_time_end = document.getElementById("pickup_time_end");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    pickup_time_start.disabled  = false;
    pickup_time_end.disabled  = false;
    pickup_time_start.value  = '';
    pickup_time_end.value  = '';
  } else {
    pickup_time_start.disabled  = true;
    pickup_time_end.disabled  = true;
    pickup_time_start.value  = '';
    pickup_time_end.value  = '';
  }
}
</script>

@endsection

