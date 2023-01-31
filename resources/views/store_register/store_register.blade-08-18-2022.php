<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/plugin/mdtimepicker.min.css')}}" type="text/css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/jquery.steps.css')}}" type="text/css"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/widget/widget.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/file-upload/jquery.filer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/file-upload/jquery.filer-dragdropbox-theme.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

body{
	font-family: 'Roboto', sans-serif;
}
* {
	margin: 0;
	padding: 0;
}
i {
	margin-right: 10px;
}

.error_message
{
    color: #e65e5e;
}

/*------------------------*/
input:focus,
button:focus,
.form-control:focus{
	outline: none;
	box-shadow: none;
}
.form-control:disabled, .form-control[readonly]{
	background-color: #fff;
}
/*----------step-wizard------------*/
.d-flex{
	display: flex;
}
.justify-content-center{
	justify-content: center;
}
.align-items-center{
	align-items: center;
}

/*---------signup-step-------------*/
.bg-color{
	background-color: #333;
}
.signup-step-container{
	padding: 150px 0px;
	padding-bottom: 60px;
}




    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard > div.wizard-inner {
            position: relative;
    margin-bottom: 50px;
    text-align: center;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 77%;
    /* margin: 0 auto; */
    left: 0;
    right: 0;
    top: 15px;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    border-radius: 50%;
    background: #fff;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 16px;
    color: #0e214b;
    font-weight: 500;
    border: 1px solid #ddd;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #3b8528;
    color: #fff;
    border-color: #3b8528;
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}
.wizard .nav-tabs > li.active > a i{
	color: #0db02b;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: red;
    transition: 0.1s ease-in-out;
}



.wizard .nav-tabs > li a {
    width: 30px;
    height: 30px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
    background-color: transparent;
    position: relative;
    top: 0;
}
.wizard .nav-tabs > li a i{
	position: absolute;
    top: -15px;
    font-style: normal;
    font-weight: 400;
    white-space: nowrap;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
    font-weight: 700;
    color: #000;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 20px;
}


.wizard h3 {
    margin-top: 0;
}
.prev-step,
.next-step{
    font-size: 13px;
    padding: 8px 24px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
}
.next-step{
	background-color: #3b8528;
}
.skip-btn{
	background-color: #cec12d;
}
.step-head{
    font-size: 20px;
    text-align: center;
    font-weight: 500;
    margin-bottom: 20px;
}
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
input[type="checkbox"]:checked::before{
    background-color: #3b8528;
    border-color: #3b8528;
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

        #image-preview-3 {
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

        #image-preview-1 input, #image-preview-2 input, #image-preview-3 input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview-1 label, #image-preview-2 label, #image-preview-3 label {
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
</head>
<body>
@include('layouts.front_header')
<section class="signup-step-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="@if($page_type == null) active @endif">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Personal Details</i></a>
                                </li>
                                <li role="presentation" class="@if($page_type && $page_type == 'service') disabled active @else disabled @endif">
                                    <a href="#step2" data-toggle="tab" @if($page_type && $page_type == 'service') class="active show" @endif aria-controls="step2" role="tab" aria-expanded="@if($page_type && $page_type == 'service') true @else false @endif"><span class="round-tab">2</span> <i>Choose Services</i></a>
                                </li>
                                <li role="presentation" class="@if($page_type && $page_type == 'store') disabled active @else disabled @endif">
                                    <a href="#step3" data-toggle="tab" @if($page_type && $page_type == 'store') class="active show" @endif aria-controls="step3" aria-expanded="@if($page_type && $page_type == 'store') true @else false @endif" role="tab"><span class="round-tab">3</span> <i>Store Details</i></a>
                                </li>
                                <!-- <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Success</i></a>
                                </li> -->
                            </ul>
                        </div>

                        <!-- <form role="form" action="index.html" class="login-box"> -->
                            <div class="tab-content" id="main_form">
                                <div class="tab-pane @if($page_type == null) active @endif" role="tabpanel" id="step1">
                                    <!-- <h5 class="text-center">Personal Details</h5> -->
                                    <form action="{{route('register.update.personal.details')}}" id="personal_details_form" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" type="text" id="first_name" value="{{$user->first_name}}" name="first_name" placeholder="">
                                                    <small class="first_name_error_message error_message"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" id="last_name" value="{{$user->last_name}}" name="last_name" placeholder="">
                                                    <small class="last_name_error_message error_message"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email Address <small style="color:#80926c;">(Not editable)</small></label>
                                                    <input class="form-control" type="email" value="{{$user->email}}" placeholder="" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input class="form-control" type="text" id="contact_number" value="{{$user->contact_number}}" name="contact_number" placeholder="">
                                                    <small class="contact_number_error_message error_message"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender: &nbsp;<input type="radio" name="gender" value="1" @if($user->gender == 1) checked @endif>&nbsp;Male</label> &nbsp;&nbsp;&nbsp;<label><input type="radio" name="gender" value="2" @if($user->gender == 2) checked @endif>&nbsp;Female</label>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" style="color:white;cursor:pointer;" data-personal-details="personal_details" class="default-btn next-step">Update</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane @if($page_type && $page_type == 'service') active show @endif" role="tabpanel" id="step2">
                                    <!-- <h4 class="text-center">Services</h4> -->
                                    <div class="row">
                                    <div class="col-md-12">
                                    <form action="{{route('register.add.services')}}" id="service_form" method="post">
                                        @csrf
                                        <input type="hidden" name="service_user_id" value="{{session()->get('user_info')->user_id}}" />
                                        <div class="form-group">
                                            @foreach($services as $singleService)
                                                <input type="checkbox" class="service_checkbox" name="service_category_id[]" value="{{$singleService->id}}" @if(in_array($singleService->id, $selected_services_ids)) disabled checked @endif/>&nbsp;{{$singleService->name}}
                                                &nbsp;&nbsp;
                                            @endforeach
                                        </div>
                                    </form>

                                    </div>
                                   </div>


                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                        <li><button type="button" style="color:white;cursor:pointer;" data-service="services" class="default-btn next-step">Add</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane @if($page_type && $page_type == 'store') active show @endif" role="tabpanel" id="step3">
                                    <!-- <h4 class="text-center">Store Details</h4> -->
                                    <div class="row">
                                        <div class="col-md-12" style="text-align:center;">
                                            <label>Choose service category: </label>
                                            @foreach($seller_services as $service)
                                                @if($service->shop)
                                                    <button class="btn btn-sm btn-info" disabled><i class="fas fa-check" style="color:#ff7716"></i>{{$service->service_category->name}}</button>
                                                @else
                                                    <a href="javascript:;" onclick="setServiceId('{{$service->service_category_id}}')" class="btn btn-sm btn-info">{{$service->service_category->name}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                    <form action="{{route('register.add.store.details')}}" id="store_details_form" method="post" enctype="multipart/form-data">
                                        @csrf   
                                    <input type="hidden" name="user_id" value="{{session()->get('user_info')->user_id}}" /> 
                                    <input type="hidden" name="service_category_id" id="service_category_id" />   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Store Name <span
                                                            style="color: red">*</span></label>
                                                <input class="form-control" type="text" id="store_name" name="store_name" placeholder="">
                                                <small class="store_name_error_message error_message"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Delivery Radius <span
                                                            style="color: red">*</span></label>
                                                <input class="form-control" type="number" min="1" step="any" id="delivery_radius" name="delivery_radius" placeholder="">
                                                <small class="delivery_radius_error_message error_message"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Radius Unit <span style="color: red">*</span></label>
                                                <select class="form-control" id="radius_unit" name="radius_unit">
                                                    <option value="Mile">Mile</option>
                                                    <option value="KM">KM</option>
                                                </select>
                                                <small class="radius_unit_error_message error_message"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estimated Delivery Time <span style="color: red">*</span></label>
                                                <input class="form-control" type="number" min="1" step="any" id="delivery_time" name="delivery_time" placeholder="">
                                                <small class="delivery_time_error_message error_message"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Time Unit <span style="color: red">*</span></label>
                                                <select class="form-control" id="time_unit" name="time_unit">
                                                    <option value="MIN">MIN</option>
                                                    <option value="HOUR">HOUR</option>
                                                    <option value="DAYS">DAYS</option>
                                                </select>
                                                <small class="time_unit_error_message error_message"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- <div class="form-group">
                                                <label>Information</label>
                                                <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Select file</label>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <label>Order Minimum Amount</label>
                                                <input class="form-control" type="text" name="order_min_amount" placeholder="">
                                            </div> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Packaging Charges </label>
                                                <input class="form-control" type="number" min="1" step="any" name="packaging_charge" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Short Description</label>
                                                <textarea class="form-control" name="short_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Store Timings <span style="color: red">*</span></label>
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
                                            {{--style="display: none"--}}
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
                                        <!-- timing area end -->
                                </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="store_name">Store Banner for desktop view(1370x200px)<span
                                                        style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="image-preview-1">
                                                <label for="image-upload-1"
                                                        id="image-label">Upload
                                                    Image</label>
                                                <input type="file"
                                                        id="image-upload-1"
                                                        name="store_banner"
                                                        class="form-control required"
                                                />
                                            </div>
                                            <small class="store_banner_error_message error_message"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="store_name">Store Banner for mobile view (197x100)<span
                                                        style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="image-preview-3">
                                                <label for="image-upload-3"
                                                        id="image-label">Upload
                                                    Image</label>
                                                <input type="file"
                                                        id="image-upload-3"
                                                        name="store_banner_mobile"
                                                        class="form-control required"
                                                />
                                            </div>
                                            <small class="store_banner_mobile_error_message error_message"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="store_logo">Store
                                                Logo (100x100)<span
                                                        style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="image-preview-2">
                                                <label for="image-upload-2"
                                                        id="image-label">Upload
                                                    Image</label>
                                                <input type="file"
                                                        id="image-upload-2"
                                                        name="store_logo"
                                                        required
                                                        class="form-control store_logo required"
                                                />
                                            </div>
                                            <small class="store_logo_error_message error_message"></small>
                                            <!-- <span class="note">[Note: Image dimensions between 250*250 to 512*512]</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="document_area">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label>Store Address <span
                                                    style="color: red">*</span></label> -->
                                        <!-- <input class="form-control" id="address" placeholder="Choose from map" type="text">
                                        <small class="address_error_message error_message"></small> -->
                                        <input type="hidden" name="address_lat" id="lat" class="form-control">
                                        <input type="hidden" name="address_long" id="lng" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Select Your Store Address <span
                                                        style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="searchInput" name="store_address"
                                                    class="form-control col-sm-6 mt-2"
                                                    type="text" placeholder="Search location" style="padding: 9px;">
                                            <div class="map" id="map"
                                                    style="width: 100%; height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                                                
                            </div>



                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                            <li><button type="button" style="color:white;cursor:pointer;" data-store-details="store_details"  class="default-btn next-step">Save</button></li>
                                        </ul>
                                    
                        </form>                
                    </div>
                                <!-- <div class="tab-pane" role="tabpanel" id="step4">
                                    <h4 class="text-center">Step 4</h4>
                                    <div class="all-info-container">
                                        <div class="list-content">
                                            <a href="#listone" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Collapse 1 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listone">
                                                <div class="list-box">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First and Last Name *</label>
                                                                <input class="form-control" type="text"  name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Phone Number *</label>
                                                                <input class="form-control" type="text" name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <a href="#listtwo" data-toggle="collapse" aria-expanded="false" aria-controls="listtwo">Collapse 2 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listtwo">
                                                <div class="list-box">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Address 1 *</label>
                                                                <input class="form-control" type="text" name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City / Town *</label>
                                                                <input class="form-control" type="text" name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Country *</label>
                                                                <select name="country2" class="form-control" id="country2" disabled="disabled">
                                                                    <option value="NG" selected="selected">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="KP">North Korea</option>
                                                                    <option value="MP">Northern Mariana Islands</option>
                                                                    <option value="NO">Norway</option>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Legal Form</label>
                                                                <select name="legalform2" class="form-control" id="legalform2" disabled="disabled">
                                                                    <option value="" selected="selected">-Select an Answer-</option>
                                                                    <option value="AG">Limited liability company</option>
                                                                    <option value="GmbH">Public Company</option>
                                                                    <option value="GbR">No minimum capital, unlimited liability of partners, non-busines</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Business Registration No.</label>
                                                                <input class="form-control" type="text" name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Registered</label>
                                                                <select name="vat2" class="form-control" id="vat2" disabled="disabled">
                                                                    <option value="" selected="selected">-Select an Answer-</option>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Seller</label>
                                                                <input class="form-control" type="text" name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Company Name *</label>
                                                                <input class="form-control" type="password" name="name" placeholder="" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <a href="#listthree" data-toggle="collapse" aria-expanded="false" aria-controls="listthree">Collapse 3 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listthree">
                                                <div class="list-box">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Name *</label>
                                                                <input class="form-control" type="text" name="name" placeholder="">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Number *</label>
                                                                <input class="form-control" type="text" name="name" placeholder="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" class="default-btn next-step">Finish</button></li>
                                    </ul>
                                </div> -->
                                <div class="clearfix"></div>
                            </div>

                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="//maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
    <script>

    // google map
    function initialize() {
                @if(isset($store_details) && $store_details->address_lat != Null && $store_details->address_long != Null)
                    var lati = '{{ $store_details->address_lat }}';
                    var longi = '{{ $store_details->address_long }}';
                    var latlng = new google.maps.LatLng(lati, longi);
                @else
                    var latlng = new google.maps.LatLng(18.0179, -76.8099);
                @endif
        var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 10
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
        // document.getElementById('address').value = address;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        document.getElementById('searchInput').value = address;
        // console.log(address);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    // google map end

    var totalServices = [];
    //service checkbox
    $(".service_checkbox").change(function() {
        var numberOfChecked = $('.service_checkbox:checked').length;
        if(numberOfChecked > 4)
        {
            swal({  
                title: "Oops!",  
                text: "You can choose maximum 4 services",  
                icon: "error",  
                button: "oh no!", 
                allowOutsideClick: false
            });
            $(this).prop('checked', false);
            return;
        }
    });


        // ------------step-wizard-------------
$(document).ready(function () {


    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);

        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        if($(this).attr('data-service') == 'services')
        {
            var numberOfChecked = $('.service_checkbox:checked').length;
            if(numberOfChecked == 0)
            {
                alert('Please select min 1 service');
                return;
            }
            else
            {
                $('#service_form').submit();
                return;
            }
        }
        else if($(this).attr('data-store-details') == "store_details")
        {
            var message = "The field is required";
            $('.store_name_error_message').text("");
            $('.delivery_radius_error_message').text("");
            $('.radius_unit_error_message').text("");
            $('.delivery_time_error_message').text("");
            $('.time_unit_error_message').text("");
            $('.store_banner_error_message').text("");
            $('.store_banner_mobile_error_message').text("");
            $('.store_logo_error_message').text("");
            $('.address_error_message').text("");
            if($('#store_name').val() == "")
            {
                $('.store_name_error_message').text(message);
                return;
            }
            else if($('#lat').val() == '' && $('#lng').val() == '')
            {
                alert('Please select correct address from map');
                return;
            }
            else if($('#delivery_radius').val() == "")
            {
                $('.delivery_radius_error_message').text(message);
                return;
            }
            else if($('#radius_unit').val() == "")
            {
                $('.radius_unit_error_message').text(message);     
                return;          
            }
            else if($('#delivery_time').val() == "")
            {
                $('.delivery_time_error_message').text(message);
                return;
            }
            else if($('#time_unit').val() == "")
            {
                $('.time_unit_error_message').text(message);
                return;
            }
            else if($('#image-upload-1').val() == "")
            {
                $('.store_banner_error_message').text(message);
                return;
            }
            else if($('#image-upload-3').val() == "")
            {
                $('.store_banner_mobile_error_message').text(message);
                return;
            }
            else if($('#image-upload-2').val() == "")
            {
                $('.store_logo_error_message').text(message);
                return;               
            }
            else if($('#address').val() == "")
            {
                $('.address_error_message').text(message);
                return;
            }
            $("#store_details_form").submit();
            return;
        }
        else if($(this).attr('data-personal-details') == "personal_details")
        {
            var message = 'The field is required';
            $('.first_name_error_message').text("");
            $('.last_name_error_message').text("");
            $('.contact_number_error_message').text("");
            if($('#first_name').val() == "")
            {
                $('.first_name_error_message').text(message);
                return;
            }
            else if($('#last_name').val() == "")
            {
                $('.last_name_error_message').text(message);
                return;
            }
            else if($('#contact_number').val() == "")
            {
                $('.contact_number_error_message').text(message);
                return;
            }
            $("#personal_details_form").submit();
            return;
        }
        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});



    </script>
 
<script>
    $("#store_details_form").hide();
    function setServiceId(id)
    {
        $("#service_category_id").val(id);
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
        $.uploadPreview({
            input_field: "#image-upload-3", // Default: .image-upload
            preview_box: "#image-preview-3", // Default: .image-preview
            label_field: "#image-label-3", // Default: .image-label
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
            title: 'OK',
            position: 'topRight',
            message: '{{Session::get("success_message")}}',
        });
    </script>
 @endif
</body>
</html>