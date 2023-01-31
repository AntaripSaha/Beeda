<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Beeda Technology, A complete Mega-App platform</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta name="description" content="Beeda is a Mega App with 50+ Services to satisfy everyones need. Some of our best services are E-commerce, Food Delivery, Ride Sharing, Travel and more">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicons -->
    <link rel="icon"
          href=""
          type="image/x-icon">
    <link
        href=""
        rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('assets/front/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('assets/front/css/style.css?v=1') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <style>
        #logo img {
            width: 180px;
        }

        .mockup-image {
            height: 500px;
        }

        .wow h1 {
            margin-top: 20px !important;
        }

        .product-screen-1 img, .product-screen-2 img, .product-screen-3 img {
            width: 280px;
        }

        #about .about-img {
            height: 450px;
        }

        .app-store {
            width: 200px;
        }

        .padding-3 {
            padding-top: 3px;
        }

        /*new add*/
        #header #logo h1 {
            margin: -10px 0 0 0;
        }

        /*contact*/
        #contact .contact-about h3 {
            color: #183bdd;
        }

        #contact .info i {
            color: #183bdd;
        }

        #contact .social-links a {
            /*color: #1dc8cd;*/
            color: #ffffff;
            /*border: 1px solid #1dc8cd;*/
            border: 1px solid #010a57;
        }

        #contact .social-links a:hover {
            /*background: #1dc8cd;*/
            background: #ffffff;
            color: #010a57;
        }

        /*back to top*/
        .back-to-top {
            /*background: linear-gradient(45deg, #1de099, #1dc8cd);*/
            background: linear-gradient(45deg, #e0eff5ed, #183bdd)
        }

        .back-to-top:focus {
            /*background: linear-gradient(45deg, #1de099, #1dc8cd);*/
            background: linear-gradient(45deg, #e0eff5ed, #183bdd)
        }

        .back-to-top:hover {
            /*background: #1dc8cd;*/
            background: #183bdd;
        }

        {{--/*new*/--}}
        {{--/*header*/--}}
        {{--#header #logo h1 {--}}
        {{--    margin: -12px 0 0 0;--}}
        {{--    /*margin: -4px 0 0 0;*/--}}
        {{--}--}}
{{--        #header.header-fixed {--}}
{{--            background: linear-gradient(45deg, #41e28e, #183bdd);--}}
{{--        }--}}
                       /*intro*/
        #intro {
            background: linear-gradient(90deg, rgba(6, 24, 129, 2.5), #000854);
            /*background-color: coral;*/
            background-size: cover;
            position: relative;
        }

        #intro .btn-get-started:hover {
            color: #183bdd;
            background: #fff;
        }

        /*call to action*/
        {{--#call-to-action {--}}
        {{--    overflow: hidden;--}}
        {{--    background: url({{asset('public/assets/front/img/call-action-bg.png')}}) fixed center center;--}}
        {{--background: linear-gradient(rgba(30, 130, 152, 0.7), rgba(5, 70, 111, 0.5)), url(../img/call-to-action-bg.jpg) fixed center center;--}}
        {{--    background-size: cover;--}}
        {{--    padding: 80px 0;--}}
        {{--}--}}
        #call-to-action .cta-btn:hover {
            background: #ffffff;
            color: #183bdd;
            border: 2px solid #ffffff;
        }

        /*section header divider*/
        .section-header .section-divider {
            background: none;
        }

        #header nav ul li a {
            color: white;
        }

        .header-fixed nav ul li a {
            color: white !important;
        }
    </style>
    <style>
        /* Dropdown Button */
        .dropbtn {
            background-color: unset;
            border: none;
            text-decoration: none;
            display: inline-block;
            color: #700c0c;
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 14px;
            outline: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown button:focus {
            outline: none;
            outline: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            /*background-color: #f1f1f1;*/
            /*min-width: 160px;*/
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #ffffff;
            /*padding: 12px 16px;*/
            padding: 9px 16px;
            text-decoration: none;
            display: block;
            background-color: #000854;
            margin-top: 2px;
        }

        .dropdown-content a:hover {
            background-color: #ffffff;
            color: #000854 !important;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: unset;
            cursor: pointer
        }
    </style>
    <style>
        .banner_beeda_logo {
            height: 150px;
            padding-bottom: 22px;
            padding-left: 16px;
        }

        .banner_span {
            color: #FFFFFF;
            font-weight: 700;
            font-size: 60px;
            display: flex;
        }

        .banner_span span {
            align-self: flex-end;
        }

        #intro p {
            font-weight: 700;
            font-size: 60px;
            color: #fff;
            margin-bottom: 0;
            padding: 0;
        }
    </style>
    <style>
        @media (max-width: 576px) {
            #logo img {
                width: 100px;
            }

            #header #logo img {
                padding-top: 10px;
            }
        }

        @media (max-width: 768px) {
            #logo img {
                width: 128px;
            }
        }
    </style>
    <style>
        @media (max-width: 576px) {
            .banner_beeda_logo {
                height: 77px;
                padding-bottom: 11px;
                padding-left: 12px;
            }

            .banner_span span {
                font-weight: 600;
                font-size: 30px;
                text-align: left !important;
                word-spacing: 4px;
                letter-spacing: 1px;
            }

            #intro p {
                font-weight: 700;
                font-size: 28px;
                text-align: left;
                /*word-spacing: 1px !important;*/
                letter-spacing: 1px !important;
            }

            #intro .intro-text {
                /*-webkit-align-items: unset;*/
                /*-ms-flex-align: start;*/
                align-items: normal;
                padding-left: 20px !important;
            }

            .banner_span {
                padding-left: 16px !important;
            }
        }

        @media (max-width: 768px) {
            #intro p {
                line-height: unset !important;
            }
        }
    </style>
    <style>
        #featured_section {
            border-radius: 60px;
            background: #ffffff;
            position: relative;
            z-index: 0;
            margin-top: -58px !important;
            padding: 60px 0;
        }

        #about_images {
            position: relative !important;
            top: -164px !important;
            /*padding: 0 80px 0 80px;*/
        }

        .about_images_12 {
            height: 0px;
        }

        #about_images p {
            font-size: 20px;
            /*margin-top: 10px;*/
            /*margin-bottom: 10px;*/
            font-weight: 700;

        }

        /*.about_images_12{*/
        /*    position: relative !important;*/
        /*    top: -164px !important;*/
        /*    padding: 0 80px 0 80px;*/
        /*}*/
        @media (max-width: 992px) {
            .about_images_12 {
                height: 248px;
            }

            /*section #featured_section {*/
            /*    height: 248px;*/
            /*}*/
        }

        @media (max-width: 576px) {
            #about_images {
                padding: 0px !important;
                top: -106px !important;
            }

            .about_images {
                width: 140px;
            }

        }
    </style>
    <style>
        .section-header .section-description {
            padding-bottom: 0px;
        }

        /*.services_card .row div {*/
        /*    margin: auto;*/
        /*}*/

        .services_card .row div {
            /*margin: auto;*/
            /*margin-left: 5px;*/
            padding-left: 16px;
            padding-right: 16px;
            margin-bottom: 20px;
        }

        .services_card .row {
            /*padding: 0 80px 0 80px;*/
            /*width: 100%;*/
        }

        .column {
            float: left;
            width: 20% !important;
            padding: 0 10px;
        }

        .column .card .card-body .card-title {
            font-size: 16px;
            font-weight: 700;
            color: black;
        }

        .column .card .card-body {
            text-align: left;
        }

        .section-header .section-title {
            font-size: 36px;
            font-weight: 600;
        }

        /*.row:after {*/
        /*    content: "";*/
        /*    display: table;*/
        /*    clear: both;*/
        /*}*/
        .column .card {
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2);
            /*padding: 16px;*/
            /*text-align: center;*/
            border: none;
            background-color: #ffffff;
        }

        .column .card .card-img-top {
            padding: 20px;
        }

        .column .card div {
            padding: 0px !important;
        }

        @media (max-width: 576px) {
            .services_card .row {
                padding: 0;
            }

            .row {
                width: fit-content;
            }

            .section-header .section-title {
                font-size: 22px;
            }
        }

        /*.container-fluid .services_card {*/
        /*    display: flex;*/
        /*    justify-content: space-between;*/
        /*    flex-direction: row;*/
        /*    flex-wrap: wrap;*/
        /*}*/
        .column {
            display: flex;
        }
    </style>
    <style>
        #call-to-action {
            /*position: relative;*/
            /*z-index: -1;*/
            /*margin-top: -58px;*/
            color: white;
        }

        #call-to-action .container {
            margin-top: 166px;
        }

        #call-to-action .container .join_the_change {
            margin-bottom: 149px;
        }

        #call-to-action .container .join_the_change h1 {
            font-size: 40px;
            font-weight: 700;
        }

        #login-container {
            background-color: #1d242f;
            border-radius: 20px;
        }

        #login-container h1 {
            font-size: 24px;
            font-weight: 700;
        }

        #login-container {
            padding-left: 25px;
            padding-right: 25px;
            margin-bottom: 60px;
        }

        #login-container .description {
            font-size: 16px;
            font-weight: 400;
            padding-bottom: 10px;
            color: #8c8e92;
        }

        #login-container a {
            background: #3b8528;
            border-radius: 50px;
            padding: 10px 24px 10px 24px;
            border: none;
            color: #ffffff;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .profile-img-top {
            margin-top: -44px;
            padding-bottom: 40px;
        }

        #login-container {
            display: flow-root;
        }

        #login-container .profile-img {
            text-align: unset;
        }

        @media (max-width: 575.98px) {
            #call-to-action .container {
                margin-top: 46px;
            }

            #call-to-action .container .join_the_change {
                margin-bottom: 90px;
            }

            #call-to-action .container .join_the_change h1 {
                font-size: 28px;
            }
        }

        @media (max-width: 991.98px) {
            #call-to-action .container {
                margin-top: 56px;
            }

            #call-to-action .container .join_the_change {
                margin-bottom: 100px;
            }
        }


    </style>
    <style>
        /*.features-row-1{*/
        /*    position: relative;*/
        /*    z-index: -1;*/
        /*    margin-top: -58px;*/
        /*    color: white;*/

        /*}*/
        section#advanced-features .features-row-1 {
            margin-top: -58px !important;
            position: relative;
            z-index: 1;
            color: #111111;
            background-color: #ecffff;
            border-radius: 60px 60px 0 0 !important;
        }

        section#advanced-features .features-row-2 {
            /*margin-top: -58px !important;*/
            /*position: relative;*/
            /*z-index: -1;*/
            color: #111111;
            background-color: #e8f2fe;
            border-radius: 60px !important;
        }

        section#advanced-features .features-row-3 {
            /*margin-top: -58px !important;*/
            /*position: relative;*/
            /*z-index: -1;*/
            color: #111111;
            background-color: #eff5f5;
            border-radius: 0 0 50px 50px !important;
            position: relative;
            margin-bottom: -40px;
        }

        #advanced-features {
            overflow: visible;
        }

        .features-h1 {
            font-weight: 700;
        }

        @media (max-width: 576px) {
            .app-store {
                padding-bottom: 10px;
            }
        }

        .voucher1 img {
            width: 100%;
        }

        .voucher2 img {
            width: 85%;
        }

        .voucher-text span {
            font-size: 42px;
            color: black;
            line-height: initial;
            font-weight: 700;
        }

        .voucher-text p {
            font-size: 16px;
            color: #525252;
        }

        .voucher-col-12 {
            display: contents;
        }

        #voucher {
            border-radius: 0 0 60px 60px !important;
            margin-bottom: -52px;
            /*z-index: 1;*/
            background: #FFFFFF;
            position: relative;
        }

        #advanced-features .features-row {
            padding: 30px 0 50px 0;
        }

        @media (max-width: 767.98px) {
            .voucher2 img {
                width: 100%;
            }

            .voucher-text span {
                font-size: 30px;
            }

            .voucher-text p {
                font-size: 14px;
            }
        }
    </style>
    <style>
        #rectangle div img {
        {{--background-image: url({{ asset('assets/front/img/5th_section/rectangle.png') }});--}}

  /* Full height */
            /*    height: 500px;*/
            width: 100%;
            height: fit-content;
            background-position: center center;
            /*background-position: center;*/
            background-repeat: no-repeat;
            background-size: cover;
            object-fit: cover;
        }

        @media (max-width: 575.98px) {
            #rectangle div img {
                height: 300px !important
            }

            #voucher {
                border-radius: 0 0 30px 30px !important;
                margin-bottom: -28px;
            }

            #supper-featuress {
                border-radius: 30px 30px 30px 30px !important;
                top: -28px;
            }

            #featured_section {
                border-radius: 30px;
            }

            #about {
                border-radius: 30px;
            }

            section#advanced-features .features-row-1 {
                border-radius: 30px 30px 0 0 !important;
            }

            section#advanced-features .features-row-2 {
                border-radius: 30px !important;
            }

            #contact .social-links a {
                font-size: 14px;
                padding: 6px 0;
                margin-right: 1px;
                width: 27px;
                height: 27px;
            }
        }

    </style>
    <style>
        #supper-featuress {
            border-radius: 60px 60px 60px 60px;
            background: #70c7e0;
            z-index: 1;
            position: relative;
            top: -50px;
            margin: 0;
            background: linear-gradient(to bottom, #70c7e0 35%, #031270 0%);

            height: auto;
            color: #fff;
        }

        .all_service {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .supperapp-tagline {
            font-weight: 600;
            font-size: 46px;
            color: black;
            text-align: center
        }

        .supperapp-text {
            text-align: center;
            font-weight: 600;
            /*font-size: 46px;*/
            color: white;
        }

        @media only screen and (max-width: 990px) {
            #supper-featuress {
                background: linear-gradient(to bottom, #70c7e0 25%, #031270 0%);
            }

            .two {
                order: 2 !important;
            }

            .three {
                order: 1 !important;
            }

            .device, .device_2, .features-p {
                display: none;
            }

            .all_service {
                display: none;
            }

            .service-appstore {
                margin-top: 30px;
                width: 100%;
            }

            .deliver-bottom {
                padding-bottom: 70px;
            }
        }

        @media only screen and (min-width: 990px) and (max-width: 1200px) {
            .device {
                position: absolute;
                top: 220px;
                width: 20%;
            }

            .three {
                display: none;
            }

            .all_service {
                display: block;
            }

            .features-p {
                padding-top: 300px;
            }

            .appstore-btn {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .supperapp-text {
                text-align: left;
            }
        }

        @media only screen and (min-width: 1200px) {

            .features-p {
                padding-top: 300px;
            }

            .device {
                position: absolute;
                top: 220px;
                width: 18%;
            }

            .three {
                display: none;
            }

            .appstore-btn {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .supperapp-text {
                text-align: left;
            }
        }

        @media only screen and (min-width: 1600px) {

            .features-p {
                padding-top: 300px;
            }

            .device {
                position: absolute;
                top: 160px;
                width: 18%;
            }

            .three {
                display: none;
            }

            .appstore-btn {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .supperapp-text {
                text-align: left;
            }
        }

    </style>
    <style>
        #login-container-2 {
            /*background-color: #1d242f;*/
            border-radius: 20px !important;
        }

        #login-container-2 h1 {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
        }

        #login-container-2 {
            padding-left: 25px;
            padding-right: 25px;
            margin-bottom: 60px;
        }

        #login-container-2 .description {
            font-size: 15px;
            font-weight: 400;
            padding-bottom: 10px;
            color: #263520;
        }

        #login-container-2 button {
            background: #3b8528;
            border-radius: 50px;
            padding: 10px 24px 10px 24px;
            border: none;
            color: #ffffff;
            font-size: 14px;
            margin-bottom: 80px;
        }

        .profile-img-top-1 {
            margin-top: -44px;
            padding-bottom: 40px;
        }

        .profile-img {
            margin: auto;
            text-align: center;
        }

        #more-features .part-1 {
            background-color: #8fc877;
        }

        #more-features .part-2 {
            background-color: #b27fb0;
        }

        #more-features .part-3 {
            background-color: #f2953e;
        }

        #more-features .part-4 {
            background-color: #6fc5e1;
        }

        .covid_content {
            margin-left: 0 !important;
        }

        .covid_image {
            text-align: center;
        }

        .smart_pos_group {
            border: 1px solid #858585;
            border-radius: 12px;
            padding: 12px 20px 12px 20px;
        }

        .smart_pos_arrow {
            float: right;
            padding-top: 4px;
        }

        .smart_pos_hading {
            float: left;
        }

        .smart_pos_hading span {
            font-size: 20px;
            font-weight: 700;
            color: #434041;
        }

        .col-lg-6.smart_pos_group {
            /*margin-left: 10px !important;*/
            /*margin-right: 10px !important;*/
            margin: auto;
            flex: 0 0 45%;
        }

        .smart_pos_arrow i {
            color: #434041;
        }

        .smart_pos {
            padding-bottom: 40px;
        }

        .covid_h1 {
            color: #ed5564;
            font-weight: 700;
        }

        .covid_h6 {
            color: #3e872b;
            font-weight: 700;
        }

        .covid_content {
            color: #3c3c3c;
        }

        #login-container-2 {
            /*display: flex;*/
            height: 280px;
        }

        @media (max-width: 992px) {
            .smart_pos_hading span {
                font-size: 18px;
            }

            .col-lg-6.smart_pos_group {
                margin-left: 10px !important;
                margin-right: 10px !important;
                /*margin: auto;*/
                flex: 0 0 95%;
            }

            .col-lg-6.col-md-12.col-12.smart_pos_group {
                margin-bottom: 14px;
            }

            .covid_content {
                text-align: left !important;
            }
        }

        @media (max-width: 576px) {
            .smart_pos_hading span {
                font-size: 16px;
            }

            #login-container-2 {
                margin-left: 36px;
                margin-right: 36px;
            }
        }
    </style>
    <style>
        .contact-about a {
            color: #ffffff;
            font-weight: 200;
            font-size: 14px;
        }

        #contact .contact-about p {
            color: #ffffff !important;
            padding: 0;
            margin: 0;
        }

        .contact-about {
            padding-bottom: 14px;
        }

        .beeda_logo {
            padding-bottom: 20px;
        }
    </style>
    <style>
        .copyright {
            padding: 20px 0 0 0px !important;
            color: #ffffff;
            font-size: 14px;
        }
        .back-to-top{
            z-index: 999;
        }
    </style>
    @if(Route::currentRouteName() == 'home.index')
        <script type='application/ld+json'> 
        {
            "@context": "http://www.schema.org/",
            "@type": “MobileApplication”,
            "name": "Beeda Mega App",
            "url": "https://beeda.com/",
            "logo": "https://beeda.com/assets/front/img/beeda_white_logo.png",
            "description": "Beeda is a Mega App with 50+ Services to satisfy everyone's needs. Some of our best services are E-commerce, Food Delivery, Ride Sharing, Travel, and more.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "16 Madison Square West Associates, 16 Madison Square West",
                "addressLocality": "New York",
                "addressRegion": "New York",
                "postalCode": "NY 10010",
                "addressCountry": "United States"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "40.7429219",
                "longitude": "73.9915369"
            },
            "hasMap": "https://www.google.com/search?q=Beeda+INC+1115+Broadway+16+Madison+Square+West+11th+Floor+%E2%80%93+New+York%2C+NY+10010.&rlz=1C1CHBD_enBD1036BD1036&oq=Beeda+INC+1115+Broadway+16+Madison+Square+West+11th+Floor+%E2%80%93+New+York%2C+NY+10010.&aqs=chrome.0.69i59j69i60l3.1670j0j7&sourceid=chrome&ie=UTF-8",
            "openingHours": "Mo, Tu, We, Th, Fr, Sa, Su 01:00-23:59",
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "Customer Service",
                "telephone": "+1 754-399-1127"
            }
        }
        </script>
    @endif
</head>
<!-- english -->
    <body>
    <header id="header">
        <div class="container">
            <div id="logo" class="pull-left">
                <h1>
                    <a href="#intro" class="scrollto">
                        <img src="{{ asset('assets/front/img/beeda_white_logo.png') }}" alt="Beeda"/>
                    </a>
                </h1>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Home</a></li>
                    <li class="dropdown">
                        <button class="dropbtn">
                            <a href="#call-to-action" class="" data-toggle="dropdown">
                                Partner with us&nbsp;
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        </button>
                        {{--                    <div class="dropdown-content">--}}
                        {{--                        <a href="">Profile</a>--}}
                        {{--                        <a href="">Orders</a>--}}
                        {{--                    </div>--}}
                    </li>
                    <li><a href="#featured_section">About Us</a></li>
                    {{--                <li><a href="#advanced-features">More Features</a></li>--}}
                    <li class="dropdown">
                        <button class="dropbtn">
                            <a href="#about" class="" data-toggle="dropdown">
                                More Features&nbsp;
                                {{--                            <i class="fa fa-angle-down"></i>--}}
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        </button>
                        {{--                    <div class="dropdown-content">--}}
                        {{--                        <a href="">Profile</a>--}}
                        {{--                        <a href="">Orders</a>--}}
                        {{--                    </div>--}}
                    </li>
                    <li><a href="{{route('login.login')}}" target="_blank">Store Login</a></li>
                    <li><a href="" target="_blank">Contact Us</a></li>
                    <li class="dropdown">
                        <button class="dropbtn">
                            <a href="" class="" data-toggle="dropdown">
                                <img class="" src="{{ asset('assets/front/img/vector.svg') }}" alt=" "/>
                                EN&nbsp;
                                {{--                            <i class="fa fa-angle-down"></i>--}}
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        </button>
                            <div class="dropdown-content">
                                <a href="">ES</a>
                                <a href="">FR</a>
                            </div>
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header>

    <section id="intro" style="background: url('https://d2t5292uahafuy.cloudfront.net/public/img/home_banner.png');background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="intro-text ">
            <div class="row">
                <div class="banner_span">
                    <span>We're</span>
                </div>
                <div>
                    <img class="banner_beeda_logo" src="{{ asset('assets/front/img/beeda_logo.svg') }}" alt="beeda"/>
                </div>
            </div>
            <p class="banner_text">The world's first & only Mega-App</p>
        </div>
    </section>

    <section id="featured_section" class="">
        <div class="container">
            <div class="col-lg-12 about_images_12">
                <div id="about_images">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center wow fadeInUp">
                            <img class="about_images"
                                 src="{{ asset('assets/front/img/1st_section/vendor_platform.png') }}" alt="">
                            <p class="about_images_p">Vendors Platform</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center wow fadeInUp">
                            <img class="about_images"
                                 src="{{ asset('assets/front/img/1st_section/mobile_smart_pos.png') }}" alt="">
                            <p class="about_images_p">Mobile Smart Pos</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center wow fadeInUp">
                            <img class="about_images"
                                 src="{{ asset('assets/front/img/1st_section/digital_payment.png') }}" alt="">
                            <p class="about_images_p">Digital Payment</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center wow fadeInUp">
                            <img class="about_images"
                                 src="{{ asset('assets/front/img/1st_section/military_grade_encryption.png') }}" alt="">
                            <p class="about_images_p">Military Grade Encryption</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section-bg">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">One App 30+ Services</h3>
                <span class="section-divider"></span>
                <p class="section-description"></p>
            </div>
            <div class="services_card">
                <div class="row">
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/taxi_ride.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Taxi Ride</h5>
                                <p class="card-text">Book a ride on demand , schedule in advance , verified drivers
                                    share
                                    ride with friends .</p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/hourly_taxi.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Hourly taxi</h5>
                                <p class="card-text">Rent a car with driver by the hour , book instant or by appointment
                                    ,
                                    pay cashless with Beeda Pay . </p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top"
                                 src="{{ asset('assets/front/img/2nd_section/food_delivery.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Food Delivery</h5>
                                <p class="card-text">Order your favorite food from restaurants nearby and have lot
                                    delivered
                                    at your doorstep , contactless payment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/grocery.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Grocery</h5>
                                <p class="card-text">With Grocery on demand , the best supermarkets are available at
                                    your
                                    fingertips , order in advance or get minimun 2 hour delivery .</p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/gas.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Gas</h5>
                                <p class="card-text">LPG Gas on demand allow you to get gas delivered to your doorstep ,
                                    by
                                    approved service providers safe and securely.</p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/lanscaping.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Landscaping</h5>
                                <p class="card-text">Finding a good landscaper is hard , with Beeda its easy . choose
                                    from
                                    star rated providers and get the best . </p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/cleaner.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Cleaners</h5>
                                <p class="card-text">Book a clean up crew on demand for your home , busineses, parties ,
                                    wedding , whatever we have a team to do it.</p>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('assets/front/img/2nd_section/laundry.png') }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Laundry</h5>
                                <p class="card-text">Can be tough at at time , lets us take care of that for you with ,
                                    our
                                    pick up and drop off service done by proffesionals.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="call-to-action">
        <div class="container">
            <div class="join_the_change">
                <h1>Join the change</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div id="login-container">
                        <div class="profile-img">
                            <img class="profile-img-top"
                                 src="{{ asset('assets/front/img/3rd_section/employees.png') }}"
                                 alt="">
                        </div>
                        <h1>Employees</h1>
                        <div class="description">
                            At Beeda , our employees are our most valuable assets , our team is commited to delivering
                            the
                            best products and services to our customers , join us to help make a difference .
                        </div>
                        <a href="" target="_blank" class="button_profile">Join as an
                            employee</a>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div id="login-container">
                        <div class="profile-img">
                            <img class="profile-img-top"
                                 src="{{ asset('assets/front/img/3rd_section/driver_partners.png') }}" alt="">
                        </div>
                        <h1>Driver Partners</h1>
                        <div class="description">
                            You can choose to work partime or fulltime driving , or delivering , at Beeda we give
                            everyone
                            the oppurtunity to work on thier own time , join us to start serving today .
                        </div>
                        <a target="_blank"
                           href="">Join
                            as a diver</a>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div id="login-container">
                        <div class="profile-img">
                            <img class="profile-img-top"
                                 src="{{ asset('assets/front/img/3rd_section/merchants.png') }}"
                                 alt="">
                        </div>
                        <h1>Merchants</h1>
                        <div class="description">
                            Have a store , a product , a business list it on our platform to reach thousand of consumers
                            and
                            get paid virtually , place ads chat and communicate directly with customers.
                        </div>
                        <a target="_blank" href="">Join as a Merchant</a>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="advanced-features">
        <div class="features-row section-bg features-row-1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img class="advanced-feature-img-right wow fadeInRight mockup-image"
                             src="{{ asset('assets/front/img/store_mockup.png') }}" alt="">
                        <div class="col-lg-6 wow fadeInLeft">
                            <h1 class="features-h1">Store App</h1>
                            <p>With Beeda store app . It allows merchants to take thier stores online for fashion ,
                                Pharmacies , grocery , restaurant , bars , supermarket . Ga station , flower shop ,
                                hardwares , etc. </p>
                            <p>As a store vendor , you can view all new orders , accepted orders , and processing orders
                                .
                                You can manage or modify the basic details of the store like estimate delivery time ,
                                store
                                timing , packaging charges and order amount from the app . You have the option to manage
                                profile status as Online / Offline .</p>
                            <div>
                                <a href=""
                                   target="_blank"><img class="app-store padding-3"
                                                        src="{{ asset('assets/front/img/play_store.png') }}"></a>
                                <a href=""
                                   target="_blank"><img class="app-store"
                                                        src="{{ asset('assets/front/img/app_store.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="features-row section-bg features-row-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img class="advanced-feature-img-right wow fadeInRight mockup-image"
                             src="https://d2t5292uahafuy.cloudfront.net/public/img/user_app.png" alt="">
                        <div class="col-lg-6 wow fadeInLeft">
                            <h1 class="features-h1">
                                User App
                            </h1>
                            <p>Beeda allows you order on demand services nearby , With Beeda Super - App you can access
                                the
                                nearest transport , shops , restaurant clinic , and other provider services in a single
                                app
                                .</p>
                            <p>You have the option to manage profile , manage back details , invite friends , schedule
                                order
                                , and view order history . Also , you can use promo code to get a discounts . You can
                                see
                                all provider and store review & rating.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="features-row features-row-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img class="advanced-feature-img-right wow fadeInRight mockup-image"
                             src="{{ asset('assets/front/img/driver_mockup.png') }}" alt="">
                        <div class="col-lg-6 wow fadeInLeft">
                            <h1 class="features-h1">Driver App</h1>
                            <p>With Beeda driver app , you've got an effortless system to manage ride or delivery
                                request .
                                To use Beeda driver app , you can log in / sign up into app through social account ,
                                like
                                Facebook , Google or via Email.</p>
                            <p>After login , you have to select a vehicle and upload documents for verification . You
                                can
                                choose to offer multiple services , on yourtime as you see fit . Taxi ride . food
                                delivery ,
                                medicine delivery , alcohol delivery and other services .</p>
                            <p>You have the option to manage new ride / delivery based on your availability . Join the
                                Beeda
                                driver app and make extra money in your free time .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="voucher" class="features-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 voucher-col-12">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="voucher-text">
                                <div class="voucher2">
                                    <img class="" src="{{ asset('assets/front/img/7th_section/voucher1.png') }}"
                                         alt="">
                                </div>
                                <div class="voucher-text">
                                    <span>Don't have a Credit Card?</span>
                                    <p>Purchase a Beeda gift Card/ Voucher, add to wallet to pay for goods and services,
                                        pay
                                        bills or transfer to a friend.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="voucher1">
                                <img class="" src="{{ asset('assets/front/img/7th_section/voucher2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="rectangle">
        <div>
            <img class="rectangle-img" src="{{ asset('assets/front/img/5th_section/rectangle.png') }}" alt="">
        </div>
    </section>

    <section id="supper-featuress" class="">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12" style="padding-top: 130px;">
                            <div class="deliver-part">
                                <h1 class="supperapp-tagline">Crossing boundaries to deliver smiles.</h1>
                            </div>
                        </div>
                        <div class="col-lg-12 features-p"></div>
                        <div class="col-lg-12 two" style="padding-top: 150px;">
                            <div class="deliver-bottom">
                                <h1 class="supperapp-text">Superapp for Life </h1>
                                <h1 class="supperapp-text">Download</h1>
                                <h1 class="supperapp-text">The Beeda app today.</h1>
                                <div class="row appstore-btn">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                        <a href=""
                                           target="_blank"><img class="app-store padding-3 service-appstore"
                                                                src="{{ asset('assets/front/img/5th_section/play_store.png') }}"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                        <a href=""
                                           target="_blank"><img class="app-store service-appstore"
                                                                src="{{ asset('assets/front/img/5th_section/app_store.png') }}">
                                        </a>
                                    </div>
                                </div>
                                <img class="device_2" style="width: 100%; text-align: right; margin-bottom: 10px;"
                                     src="{{ asset('assets/front/img/5th_section/device_2.png') }}" alt="">
                            </div>
                        </div>

                        <div class="col-lg-12 three">
                            <img style="width: 100%;" src="{{ asset('assets/front/img/5th_section/all_devices.png') }}"
                                 alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 all_service">
                    <img style="width: 100%;" src="{{ asset('assets/front/img/5th_section/all_devices.png') }}" alt="">
                </div>
            </div>
        </div>
        <img class="device" src="{{ asset('assets/front/img/5th_section/device.png') }}" alt="">
    </section>

    <section id="more-features" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div id="login-container-2" class="part-1">
                        <div class="profile-img ">
                            <img class="profile-img-top-1"
                                 src="{{ asset('assets/front/img/6th_section/real_time_tracking.png') }}" alt="">
                        </div>
                        <h1>Realtime Tracking</h1>
                        <div class="description">
                            Track your orders , Rides and services in realtime .
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div id="login-container-2" class="part-2">
                        <div class="profile-img ">
                            <img class="profile-img-top-1"
                                 src="{{ asset('assets/front/img/6th_section/user_rating.png') }}" alt="">
                        </div>
                        <h1>User Rating</h1>
                        <div class="description">
                            Users can leave rating on service providers profiles.
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div id="login-container-2" class="part-3">
                        <div class="profile-img">
                            <img class="profile-img-top-1"
                                 src="{{ asset('assets/front/img/6th_section/30_services.png') }}" alt="">
                        </div>
                        <h1>30+ Services</h1>
                        <div class="description">
                            Our Super - app Allows you access to 32 plus on demands services .
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div id="login-container-2" class="part-4">
                        <div class="profile-img">
                            <img class="profile-img-top-1"
                                 src="{{ asset('assets/front/img/6th_section/live_chat.png') }}"
                                 alt="">
                        </div>
                        <h1>Live Chat</h1>
                        <div class="description">
                            Chat directly with your delivery peerson or service providers .
                        </div>
                    </div>
                </div>
            </div>

            <div class="row smart_pos">
                <div class="col-lg-6 col-md-12 col-12 smart_pos_group">
                    <a href="" target="_blank">
                        <div class="smart_pos_hading">
                            <span class="smart_pos">Order our Smart Pos</span>
                        </div>
                        <div class="smart_pos_arrow"><i class="fa fa-arrow-right"></i></div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12 col-12 smart_pos_group">
                    <a href=""
                       target="_blank">
                        <div class="smart_pos_hading">
                            <span class="smart_pos">Sign Up as a service provider</span>
                        </div>
                        <div class="smart_pos_arrow"><i class="fa fa-arrow-right"></i></div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 covid_image">
                    <img class="covid_img" src="{{ asset('assets/front/img/6th_section/Covid_19.png') }}" alt="">
                </div>
                <div class="col-lg-6">
                    <h1 class="covid_h1">Covid-19</h1>
                    <h6 class="covid_h6">SAFETY FIRST</h6>
                    <p class="covid_content">All our service providers are provided with mask and are reminded daily to
                        wear
                        seat belts and helmets. Health and safety of our providers and customers is priority. When
                        riding as
                        a customer please..mask up, and crack a window to enjoy some fresh air. For a free set of mask
                        please contact us.</p>
                </div>
            </div>

        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-lg-12 col-md-12 col-12">
                    <img class="beeda_logo" src="{{ asset('assets/front/img/6th_section/beeda_logo.png') }}" alt="">
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <div class="contact-about">
                        <h3>Learn More</h3>
                        <div>
                            <a href="" target="_blank">About Us</a>
                        </div>
                        <div>
                            <a href="" target="_blank">Press Releases</a>
                        </div>
                        <div>
                            <a href="" target="_blank">Jobs</a>
                        </div>
                        <div>
                            <a href="{{ route('drivers_centre') }}" target="_blank">Drivers Centre</a>
                        </div>
                        <div>
                            <a href="{{ route('investors_relation') }}" target="_blank">Investor Relation</a>
                        </div>
                        <div>
                            <a href="{{ route('beeda_ads') }}" target="_blank">Beeda Ads</a>
                        </div>
                        <div>
                            <a href="{{ route('beeda_pay') }}" target="_blank">Beeda Pay</a>
                        </div>
                        <div>
                            <a href="{{ route('fraud_prevention') }}" target="_blank">Fraud Prevention</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="contact-about">
                        <h3>Policies</h3>
                        <div>
                            <a href="" target="_blank">Privacy Policy</a>
                        </div>
                        <div>
                            <a href="" target="_blank">Terms Of Use</a>
                        </div>
                        <div>
                            <a href="" target="_blank">Refund Policy</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="contact-about">
                        <h3>FAQ'S</h3>
                        <div>
                            <a href="" target="_blank">How it works</a>
                        </div>
                        <div>
                            <a href="" target="_blank">Trust & Safety</a>
                        </div>
                        <div>
                            <a href="" target="_blank">Locations</a>
                        </div>
                        <div>
                            <a href="{{ route('data_security') }}" target="_blank">Data Security</a>
                        </div>
                        <div>
                            <a href="{{ route('sustainability') }}" target="_blank">Sustanability</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="contact-about">
                        <h3>Contact Us</h3>
                        <div>
                            <p>Customer Support: +17543991127</p>
                        </div>
                        <div>
                            <p>Merchant Support: +1800beeda</p>
                        </div>
                        <div>
                            <p>Email: support@beeda.com</p>
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-3 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-6">
                            <div class="contact-about">
                                <h3>Social</h3>
                                    <div class="social-links">
                                        <a href=""
                                           class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href=""
                                           class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href=""
                                           class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href=""
                                           class="linkedin" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-6">
                            <div class="contact-about">
                                <!-- <h3>Download App</h3>
                                    </div>
                                        <a href=""
                                           class="app-store" target="_blank"><img style="background-color:none;" class="img-thumbnail" src="{{assetUrl('')}}assets/img/image20.png" alt=""></a>
                                        <a href=""
                                           class="play-store" target="_blank"><img style="background-color:none;" class="img-thumbnail" src="{{assetUrl('')}}assets/img/image21.png" alt=""></a>
                                           <a href=""
                                           class="play-store" target="_blank"><img style="background-color:none;" class="img-thumbnail" src="{{assetUrl('')}}assets/img/image22.png" alt=""></a>
                                    </div>
                            </div> -->
                        </div>
                    </div>
                </div>


                {{--            <div class="col-lg-5 col-md-8">--}}
                {{--                <div class="form">--}}
                {{--                    <img src="{{ asset('assets/front/img/map.png') }}">--}}
                {{--                </div>--}}
                {{--            </div>--}}

            </div>

        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row mt-1">
                <div class="col-lg-6 text-lg-left text-center">
                    <div style="padding-top:10px" class="text-white">
                        Beeda Inc . All Rights Reserved. 2019-2022
                    </div>
                </div>
                <div class="col-lg-6 text-lg-right text-center">
                    <img src="{{assetUrl('')}}assets/img/image20.png" alt="">
                    <img src="{{assetUrl('')}}assets/img/image21.png" alt="">
                    <img src="{{assetUrl('')}}assets/img/image22.png" alt="">
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a>

    <script type='application/ld+json'> 
    {
        "@context": "http://www.schema.org",
        "@type": “MobileApplication”,
        "name": "Beeda Mega App",
        "url": "https://beeda.com/",
        "logo": "https://beeda.com/assets/front/img/beeda_white_logo.png",
        "description": "Beeda is a Mega App with 50+ Services to satisfy everyone's needs. Some of our best services are E-commerce, Food Delivery, Ride Sharing, Travel, and more.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "16 Madison Square West Associates, 16 Madison Square West",
            "addressLocality": "New York",
            "addressRegion": "New York",
            "postalCode": "NY 10010",
            "addressCountry": "United States"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "40.741909",
            "longitude": "-73.987267"
        },
        "hasMap": "https://goo.gl/maps/MZ9BhbTFjsqpHj1W7",
        "openingHours": "Mo, Tu, We, Th, Fr, Sa, Su 01:00-23:59",
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "Customer Service Phone Number",
            "telephone": "+1 754-399-1127"
        }
    }
 </script>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/easing.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('assets/front/js/superfish.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/magnific-popup.min.js') }}"></script>

    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('assets/front/js/contactform.js') }}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ asset('assets/front/js/main.js') }}"></script>
    </body>
</html>
