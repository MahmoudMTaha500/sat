@extends('website.app')

@section('website.content')


<section class="sign-in py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h3 class="text-main-color font-weight-bold">تسجيل الدخول</h3>
            <p>برجاء ادخال بريدك الالكتروني والكلمة المرور للدخول لحسابك </p>
        </div>
        <!-- ./Section Heading -->
        <div class="row ">
            <div class="col-md-5 mx-auto">
                <!-- Sign In Form -->
                <div class="sign-in-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">

                    <form class="my-4" method="POST" action="{{ route('student.login') }}">
                        @csrf
                        <!-- Email Input -->
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control border-0 bg-transparent @error('email') is-invalid @enderror" placeholder="البريد الألكتروني">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- ./Email Input -->
                        <!-- password Input -->
                        <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                            <input type="password" name="password" class="form-control border-0 bg-transparent" placeholder="كلمة المرور">
                            <div class="input-group-append ">
                                <span class="input-group-text border-0 bg-white p-0 bg-transparent" id="basic-addon2"><i class="far fa-eye"></i></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <!-- ./password Input -->
                        <!-- Forget Password Link -->
                        <div class="overflow-hidden mb-3">
                            <a href="password-reset.html" class="text-secondary-color float-left @error('password') is-invalid @enderror">نسيت كلمة المرور؟</a>
                        </div>
                        <!-- ./Forget Password Link -->
                        <!-- Submit Btn -->
                        <button type="submit"
                            class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">تسجيل الدخول</button>
                        <!-- ./Submit Btn -->
                        <!-- Register Link -->
                        <p class="text-center">ليس لديك حساب؟ <a href="sign-out.html" class="text-secondary-color">انشاء حساب جديد</a></p>
                        <!-- Register Link -->
                    </form>
                </div>
                <!-- ./Sign In Form -->
            </div>
        </div>
    </div>
</section>

{{-- <form method="POST" action="{{ route('student.login') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</form> --}}
@endsection




