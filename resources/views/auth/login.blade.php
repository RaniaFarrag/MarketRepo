<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8"/>
    <title>Marketing HC | Login</title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->


    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('dashboard/assets/css/pages/login/classic/login-6.css?v=7.0.6') }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css?v=7.0.6') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('dashboard/assets/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{ asset('dashboard/assets/media/logos/favicon.ico') }}"/>

</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" style="background-image: url({{ asset('dashboard/assets/media/bg/bg-10.jpg') }})"
      class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-6 login-signin-on login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center"
             style="background-image: url({{ asset('dashboard/assets/media/bg/bg-3.jpg') }});">
            <!--begin:Aside-->
            <div class="d-flex w-100 flex-center p-15">
                <div class="login-wrapper">
                    <!--begin:Aside Content-->
                    <div class="text-dark-75">
                        <a href="#">
                            <img src="{{ asset('dashboard/assets/media/logos/logo-letter-13.png') }}" class="max-h-75px img-fluid"
                                 alt=""/>
                        </a>
                        <h3 class="mb-8 mt-22 font-weight-bold">Welcome In Marketing system</h3>

                    </div>
                    <!--end:Aside Content-->
                </div>
            </div>
            <!--end:Aside-->

            <!--begin:Divider-->
            <div class="login-divider">
                <div></div>
            </div>
            <!--end:Divider-->

            <!--begin:Content-->
            <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
                <div class="login-wrapper">
                    <!--begin:Sign In Form-->
                    <div class="login-signin">
                        <div class="text-center mb-10 mb-lg-20">
                            <h2 class="font-weight-bold">{{ trans('auth.Sign In') }}</h2>
                            <p class="text-muted font-weight-bold">{{ trans('auth.Enter your username and password') }}</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="form text-left"
                              id="">
                            @csrf
                            <div class="form-group py-2 m-0">
                                <input value="{{ old('email') }}" class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror"
                                       type="email" placeholder="{{ trans('auth.username') }}" name="email"
                                       autocomplete="off" required/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group py-2 border-top m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('password') is-invalid @enderror" type="Password"
                                       placeholder="{{ trans('auth.password') }}" name="password"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted font-weight-bold">
                                        <input type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        <span></span>
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a href="javascript:;" id="kt_login_forgot"--}}
                                       {{--class="text-muted text-hover-primary font-weight-bold">Forget Password ?</a>--}}
                                {{--@endif--}}
                            </div>
                            <div class="text-center mt-15">
                                <button type="submit" id="kt_login_signin_submit"
                                        class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">{{ trans('auth.Sign In') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end:Sign In Form-->

                    <!--begin:Sign Up Form-->
                    <div class="login-signup">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="">Sign Up</h3>
                            <p class="text-muted font-weight-bold">Enter your details to create your account</p>
                        </div>

                        <form class="form text-left" id="kt_login_signup_form">
                            <div class="form-group py-2 m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                       placeholder="Fullname" name="fullname"/>
                            </div>
                            <div class="form-group py-2 m-0 border-top">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                       placeholder="Email" name="email" autocomplete="off"/>
                            </div>
                            <div class="form-group py-2 m-0 border-top">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                       placeholder="Password" name="password"/>
                            </div>
                            <div class="form-group py-2 m-0 border-top">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                       placeholder="Confirm Password" name="cpassword"/>
                            </div>
                            <div class="form-group mt-5">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline font-weight-bold">
                                        <input type="checkbox" name="agree"/>
                                        <span></span>
                                        I Agree the <a href="#" class="ml-1">terms and conditions</a>.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center">
                                <button id="kt_login_signup_submit"
                                        class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit
                                </button>
                                <button id="kt_login_signup_cancel"
                                        class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end:Sign Up Form-->

                    <!--begin:Forgot Password Form-->
                    <div class="login-forgot">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="">Forgotten Password ?</h3>
                            <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                        </div>

                        <form class="form text-left" id="kt_login_forgot_form">
                            <div class="form-group py-2 m-0 border-bottom">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                       placeholder="Email" name="email" autocomplete="off"/>
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button id="kt_login_forgot_submit"
                                        class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit
                                </button>
                                <button id="kt_login_forgot_cancel"
                                        class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end:Forgot Password Form-->
                </div>
            </div>
            <!--end:Content-->
        </div>
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('dashboard/assets/plugins/global/plugins.bundle.js?v=7.0.6') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6') }}"></script>
<script src="{{ asset('dashboard/assets/js/scripts.bundle.js?v=7.0.6') }}"></script>
<!--end::Global Theme Bundle-->


<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('dashboard/assets/js/pages/custom/login/login-general.js?v=7.0.6') }}"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
