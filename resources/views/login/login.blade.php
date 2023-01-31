@extends('layouts.auth_master')
@section('title')
    Store Admin Login
@endsection
@section('page-css')
    <style>
        .btn-success {
            background-color: #061880;
            border-color: #061880;
        }

        .btn-success:hover, .btn-success:active, .btn-success:focus {
            background-color: #677ee4 !important;
            border-color: #677ee4 !important;
        }
        .error {
            color: #e65e5e;
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
                    <form class="md-float-material form-material" method="post"
                          action="{{route('login.post')}}">
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
                                        <h3 class="text-center txt-primary">Store Admin</h3>
                                        <h3 class="text-center txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                {{--<div class="row m-b-20">--}}
                                {{--<div class="col-md-6">--}}
                                {{--<a href="{{ url('/store-admin/auth/facebook') }}" class="btn btn-facebook m-b-20 btn-block"><i class="icofont icofont-social-facebook"></i> Facebook</a>--}}
                                {{--<button class="btn btn-facebook m-b-20 btn-block"><i class="icofont icofont-social-facebook"></i>facebook</button>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                {{--<a href="{{ url('/store-admin/auth/google') }}" class="btn btn-google-plus m-b-20 btn-block"><i class="icofont icofont-social-google"></i> Google</a>--}}
                                {{--<button class="btn btn-google-plus m-b-20 btn-block">--}}
                                {{--<i class="icofont icofont-social-google"></i>Google--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<p class="text-muted text-center p-b-5">Sign in with your regular account</p>--}}
                                <div class="form-group form-primary">
                                <input type="tel" name="contact_number" id="phone" class="form-control {{ $errors->first()!= Null ? "fill" : '' }}" value="{{old('contact_number') }}">
                                <input type="hidden" id="contact_numbers" name="contact_numbers">
                                <input type="hidden" id="country_code" name="country_code" />
                                <span class="error">{{ $errors->first('contact_number') }}</span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password"
                                           class="form-control {{ $errors->first()!= Null ? "fill" : '' }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                    <span class="error">{{ $errors->first('password') }}</span>
                                </div>
                                {{--<div class="row m-t-25 text-left">--}}
                                {{--<div class="col-12">--}}
                                {{--<div class="checkbox-fade fade-in-primary">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" value="">--}}
                                {{--<span class="cr"><i--}}
                                {{--class="cr-icon icofont icofont-ui-check txt-primary"></i></span>--}}
                                {{--<span class="text-inverse">Remember me</span>--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="forgot-phone text-right float-right">--}}
                                {{--<a href="auth-reset-password.html" class="text-right f-w-600"> Forgot--}}
                                {{--Password?</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                                class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">
                                            LOGIN
                                        </button>

                                    </div>
                                </div>
                                <p class="text-inverse text-left">Don't have an account?
                                    <a href="{{ route('register.register') }}">
                                        <b style="color: #061880;">Register here </b></a>for free!</p>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
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
                document.getElementById("country_code").value = '+'+intl.getSelectedCountryData()["dialCode"];
            }
        });
    </script>

@if(Session::get('error_message'))
    <script>
        iziToast.error({
            title: 'OK',
            position: 'topRight',
            message: '{{Session::get("error_message")}}',
        });
    </script>
 @endif

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


