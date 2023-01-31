@extends('layouts.auth_master')
@section('title')
    Phone Verification
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

        .resent_opt {
            background-color: #fff;
            padding: 5px 20px;
            border: 1px solid #061880;
            color: #061880;
            font-weight: 600;
            cursor: pointer;
        }
    </style>

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
                    <form class="md-float-material form-material" method="post" action="{{route('register.storePhoneVerifySubmit')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="device_token" id="device_token" />
                        <div class="text-center">
                                <img src="{{ asset('assets/images/website-logo-icon/')}}" alt="">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Phone Verification</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="verification_code" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Verification Code</label>
                                    <span class="error">{{ $errors->first('verification_code') }}</span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">
                                            VERIFY OTP
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                    {{-- Reset Start --}}
                    <div class="row m-t-30" style="justify-content: center">
                        <button onclick="reset_opt()" class="resent_opt">RESENT OTP</button>
                    </div>
                    {{-- Reset End --}}
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

@if(Session::get('error_message'))
    <script>
        iziToast.error({
            title: 'OK',
            position: 'topRight',
            message: '{{Session::get("error_message")}}',
        });
    </script>
 @endif

 @if(Session::get('success_message'))
    <script>
        iziToast.success({
            title: 'OK',
            position: 'topRight',
            message: '{{Session::get("success_message")}}',
        });
    </script>
 @endif

 <script type="text/javascript">
    function reset_opt(){
        $.ajax({
            url: '{{route("register.resent_otp")}}',
            method: 'POST',
            data: {
                'type': 'phone',
                '_token': '{{csrf_token()}}'
            },
            success: function(data) {
                iziToast.success({
                title: 'OK',
                position: 'topRight',
                message: 'OTP sent successfully',
            });
            }
        });
    }
    </script>
@endsection


