@extends('layouts.auth_master')
@section('title')
    Store Provider Register
@endsection
@section('page-css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        .login-block .auth-box {
            max-width: 650px;
        }

        .error {
            color: #e65e5e;
        }
        .btn-success {
            background-color: #061880;
            border-color: #061880;
        }

        .btn-success:hover, .btn-success:active, .btn-success:focus {
            background-color: #677ee4 !important;
            border-color: #677ee4 !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/country-code/intlTelInput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/country-code/demo.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #phone:focus {
            border-bottom: 2px solid #183bdd
        }
    </style>
@endsection
@section('page-content')
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <form class="md-float-material form-material" action="{{route('register.post')}}"
                          method="post">
                        @csrf
                        <input type="hidden" name="device_token" id="device_token" />
                        <div class="text-center">
                                <img src="{{ asset('assets/images/website-logo-icon/')}}"
                                     alt="">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up As Store Provider</h3>
                                    </div>
                                </div>
                                {{--<div class="row m-b-20">--}}
                                {{--<div class="col-md-6">--}}
                                {{--<a href="#!" class="btn btn-facebook m-b-20 btn-block waves-effect waves-light"><i class="fab fa-facebook-f"></i> Login with Facebook</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                {{--<a href="#!" class="btn btn-google-plus m-b-0 btn-block waves-effect waves-light">--}}
                                {{--<i class="fab fa-google"></i> Sign in with Google</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="email"
                                                   class="form-control {{ $errors->first()!= Null ? "fill" : '' }}"
                                                   value="{{old('email') }}">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Email<sup
                                                            class="error">*</sup></label>
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="tel" name="contact_number" id="phone"
                                                   class="form-control {{ $errors->first()!= Null ? "fill" : '' }}"
                                                 >
                                            <input type="hidden" id="contact_numbers" name="contact_numbers">
                                            <input type="hidden" id="country_code" name="country_code" />
                                            <span class="form-bar"></span>
                                            {{--<label class="float-label">Contact Number</label>--}}
                                            <span id="phone_error" class="error">{{ $errors->first('contact_number') }}</span>
                                            <span class="error">{{ $errors->first('full_number') }}</span>
                                            <span class="error">{{ $errors->first('contact_numbers') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                        <input type="hidden" id="selected_lang" name="selected_lang" />
                                            <input type="text" name="first_name"
                                                   class="form-control {{ $errors->first()!= Null ? "fill" : '' }}" value="{{old('first_name') }}">
                                            <span class="form-bar"></span>
                                            <label class="float-label">First Name<sup
                                                            class="error">*</sup></label>
                                            <span class="error">{{ $errors->first('first_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <div class="form-group form-primary">
                                            <input type="text" name="last_name"
                                                   class="form-control {{ $errors->first()!= Null ? "fill" : '' }}"
                                                   value="{{old('last_name') }}">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Last Name<sup
                                                            class="error">*</sup></label>
                                            <span class="error">{{ $errors->first('last_name') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <div class="row"
                                                 style="margin:0;">
                                                <label class="col-sm-4 col-form-label"
                                                       style="padding-left: 0 ; padding-top: 10px">Gender:<sup
                                                            class="error">*</sup></label>
                                                <div class="col-sm-8">
                                                    <div class="form-radio">

                                                        <div class="row">
                                                            <div class="radio radio-inline"
                                                                 style="padding-left: 0 ; padding-top: 7px">
                                                                <label>
                                                                    <input type="radio" value="1"
                                                                           {{old('gender') == '1' ? "checked ": "" }}
                                                                           name="gender" {{ (isset($user_details)) ? ($user_details->gender == 1)? "checked ": "" : ""}}>
                                                                    <i class="helper"></i>Male
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline"
                                                                 style="padding-left: 0 ; padding-top: 7px">
                                                                <label>
                                                                    <input type="radio" value="2"
                                                                           {{old('gender') == '2' ? "checked ": "" }}
                                                                           name="gender" {{ (isset($user_details)) ? ($user_details->gender == 2)? "checked ": "" : ""}}>
                                                                    <i class="helper"></i>Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="error">{{ $errors->first('gender') }}</span>
                                                <!-- <span class="form-bar"></span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password"
                                                   class="form-control {{ $errors->first()!= Null ? "fill" : '' }}"
                                                   value="{{ old('password') }}">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password<sup
                                                            class="error">*</sup></label>
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password_confirmation"
                                                   class="form-control {{ $errors->first()!= Null ? "fill" : '' }}"
                                             value="{{ old('password_confirmation') }}">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm Password<sup
                                                            class="error">*</sup></label>
                                            <span class="error">{{ $errors->first('confirm_password') }}</span>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="row m-t-25 text-left">--}}
                                {{--<div class="col-md-12">--}}
                                {{--<div class="checkbox-fade fade-in-primary">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" value="">--}}
                                {{--<span class="cr"><i--}}
                                {{--class="cr-icon icofont icofont-ui-check txt-primary"></i></span>--}}
                                {{--<span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-12">--}}
                                {{--<div class="checkbox-fade fade-in-primary">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" value="">--}}
                                {{--<span class="cr"><i--}}
                                {{--class="cr-icon icofont icofont-ui-check txt-primary"></i></span>--}}
                                {{--<span class="text-inverse">Send me the <a--}}
                                {{--href="#">Newsletter</a> weekly.</span>--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">
                                            Sign up now
                                        </button>
                                    </div>
                                </div>
                                <p class="text-inverse text-left">Already have an account?
                                    <a href="{{ route('login.login') }}">
                                        <b style="color: #061880;">Sign In </b></a>here!</p>
                            </div>
                        </div>
                    </form>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
@endsection
@section('page-js')


@if(Session::get('error_message'))
    <script>
        iziToast.error({
            title: 'OK',
            position: 'topRight',
            message: '{{Session::get("error_message")}}',
        });
    </script>
 @endif


<script>
 //to get currently selected language
window.setInterval(function(){
     var lang = $("select.goog-te-combo option:selected").val();
     var selected_lang = lang;
     $("#selected_lang").val(selected_lang);   
},5000);
 </script>
    <script type="text/javascript" src="{{ asset('assets/js/country-code/intlTelInput.min.js')}}"></script>
    <script type="text/javascript">
       
        
        var input = document.querySelector("#phone");
        var intl =  window.intlTelInput(input, {
            hiddenInput: "full_number",
            initialCountry: "auto",
            separateDialCode: true,
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    success(countryCode);
                });
            },
            utilsScript: "{{ asset('assets/js/country-code/utils.js')}}",
        });

        $("#phone").on('keyup', function (event) {
            var contact_number = $(this).val();
            var n = contact_number.indexOf("0", 0);
            // var n = contact_number.charAt(contact_number);
            if (n == 0) {
                document.getElementById("phone_error").innerHTML = 'Invalid Contact Number';
                document.getElementById("contact_numbers").value = "";
            } else {
                document.getElementById("contact_numbers").value = contact_number;
                document.getElementById("phone_error").innerHTML = '';
                document.getElementById("country_code").value = '+'+intl.getSelectedCountryData()["dialCode"];
            }
        });
    </script>

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBI62C3Y_Rz1N78xK6XC3JboMrFCbsTRFk",
        authDomain: "wrabbit-cc77f.firebaseapp.com",
        databaseURL: "https://wrabbit-cc77f.firebaseio.com",
        projectId: "wrabbit-cc77f",
        storageBucket: "wrabbit-cc77f.appspot.com",
        messagingSenderId: "1078792944510",
        appId: "1:1078792944510:web:35f0a1168ed751b6e0112f",
        measurementId: "G-7RWPT0E2YE"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function initFirebaseMessagingRegistration() {
            console.log(messaging);
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);
                $("#device_token").val(token);
            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }
    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

</script>
<script>
    $(document).ready(function(){
        initFirebaseMessagingRegistration();
    })
</script>
@endsection
