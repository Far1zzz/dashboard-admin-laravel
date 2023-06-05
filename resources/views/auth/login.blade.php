<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <link href="{{ asset('images/banyuasin.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="LEFT4CODE">
    <title>Login</title>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('template/dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/css/core.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container px-sm-10">
        <div class="grid columns-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="g-col-2 g-col-xl-1 d-none d-xl-flex flex-column min-vh-screen">
                <a href="#" class="-intro-x d-flex align-items-center pt-5">
                    <img alt="Rubick Bootstrap HTML Admin Template" class="w-10"
                        src="{{ asset('template/dist/images/LOGO_BANYUASIN.png') }}">
                    <span class="text-white fs-2xl ms-3">Kabupaten Banyuasin</span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Bootstrap HTML Admin Template" class="-intro-x w-3/4 mt-n16"
                        src="{{ asset('template/dist/images/FOTO_LANDING_LOGIN.png') }}">
                    <div class="-intro-x text-white fw-medium fs-4xl lh-base mt-10">
                        Selamat Datang
                        <br>
                        Di Dashboard
                    </div>
                    <div class="-intro-x mt-5 fs-lg text-white text-opacity-70 dark-text-gray-500">Admin E-tamu
                        Kabupaten Banyuasin</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="g-col-2 g-col-xl-1 h-screen h-xl-auto d-flex py-5 py-xl-0 my-10 my-xl-0">
                <div
                    class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
                    <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start">
                        Sign In
                    </h2>


                    <div class="intro-x mt-2 text-gray-500 d-xl-none text-center">Selamat Datang Di Dashboard Admin
                        E-Tamu Sekretariat Daerah</div>
                    {{-- {{ dd(session('loginError')) }} --}}


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                        <div class="intro-x mt-8">
                            @if ($errors->has('loginError'))
                                <div id="flash-message" class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            @if (session()->has('info'))
                                <div id="flash-message" class="text-danger">
                                    {{ session()->get('info') }}
                                </div>
                            @endif
                            <input id="email" type="email" placeholder="Email"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mb-2"
                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            <input id="password" type="password" placeholder="Password"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block"
                                name="password" autocomplete="current-password">
                            @if ($errors->any())
                                <span class="text-danger">
                                    <strong>
                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </strong>

                                </span>
                            @endif
                        </div>

                        <div class="intro-x d-flex text-gray-700 dark-text-gray-600 fs-xs fs-sm-sm mt-4">
                            <div class="d-flex align-items-center me-auto">
                                <input class="form-check-input border me-2" type="checkbox" name="remember"
                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="cursor-pointer select-none" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                            <button type="submit" class="btn btn-danger py-2 px-2 w-full w-xl-32 me-xl-3 align-top">
                                {{ __('Login') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('template/dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>

</html>
