@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <style>
            *,
            *:before,
            *:after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                background: #333;
                font-family: 'Open Sans', Helvetica, Arial, sans-serif;
            }

            .buttons {
                margin-top: 50px;
                text-align: center;
                border-radius: 30px;
            }

            .blob-btn {
                position: relative;
                padding: 20px 46px;
                margin-bottom: 30px;
                text-align: center;
                text-transform: uppercase;
                color: #0505A9;
                font-size: 16px;
                font-weight: bold;
                background-color: transparent;
                outline: none;
                border: none;
                transition: color 0.5s;
                cursor: pointer;
                border-radius: 30px;
            }

            .blob-btn:before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                border: 2px solid #0505A9;
                border-radius: 30px;
            }

            .blob-btn:after {
                content: "";
                position: absolute;
                z-index: -2;
                left: 3px;
                top: 3px;
                width: 100%;
                height: 100%;
                transition: all 0.3s 0.2s;
                border-radius: 30px;
            }

            .blob-btn:hover {
                color: #FFFFFF;
                border-radius: 30px;
            }

            .blob-btn:hover:after {
                transition: all 0.3s;
                left: 0;
                top: 0;
                border-radius: 30px;
            }

            .blob-btn__inner {
                position: absolute;
                z-index: -1;
                overflow: hidden;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                border-radius: 30px;
                background: #ac5151;
            }

            .blob-btn__blobs {
                position: relative;
                display: block;
                height: 100%;
                filter: url('#goo');
            }

            .blob-btn__blob {
                position: absolute;
                top: 2px;
                width: 25%;
                height: 100%;
                background: #23238d;
                border-radius: 100%;
                transform: translate3d(0, 150%, 0) scale(1.7);
                transition: transform 0.45s;
            }

            .blob-btn__blob:nth-child(1) {
                left: 0%;
                transition-delay: 0s;
            }

            .blob-btn__blob:nth-child(2) {
                left: 25%;
                transition-delay: 0.08s;
            }

            .blob-btn__blob:nth-child(3) {
                left: 50%;
                transition-delay: 0.16s;
            }

            .blob-btn__blob:nth-child(4) {
                left: 75%;
                transition-delay: 0.24s;
            }

            .blob-btn:hover .blob-btn__blob {
                transform: translateZ(0) scale(1.7);
            }
        </style> --}}
        <div class="row justify-content-center align-content-center vh-100">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                    <div class="card-body p-5">
                        <h1 class="text-center">
                            <img src={{ asset('dist/img/gicLogo.png') }} alt="gic Logo"
                                class="brand-image img-circle elevation-3" width="50px"
                                height="50px"style="opacity: .8; border-radius:50%">
                            <span style="color:#006400">G</span>
                            <span style="color:#DC143C">i</span>
                            <span style="color:#4B0082">C</span>
                            Shopping
                        </h1>
                        <form method="POST" action="{{ route('login') }}" class="p-4">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                            {{-- This is button trying --}}

                            {{-- <div class="buttons">
                                <button class="blob-btn">
                                    Blob Button
                                    <span class="blob-btn__inner">
                                        <span class="blob-btn__blobs">
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                        </span>
                                    </span>
                                </button>
                                <br />

                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10">
                                            </feGaussianBlur>
                                            <feColorMatrix in="blur" mode="matrix"
                                                values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                                            </feColorMatrix>
                                            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
