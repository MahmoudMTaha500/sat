@extends('website.app')

@section('website.content')


<section class="sign-in py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h1 class="text-main-color font-weight-bold">تسجيل الدخول</h1>
            <p>برجاء ادخال بريدك الإلكتروني، وكلمة المرور للدخول لحسابك </p>
        </div>
        <!-- ./Section Heading -->
        <div class="row ">
            <div class="col-md-5 mx-auto">
                <!-- Sign In Form -->
                <div class="sign-in-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">

                    @error('login_error')
                        <div class="alert alert-danger text-cnter">
                            {{ $message }}
                        </div>
                    @enderror

                    <form class="my-4" method="POST" action="{{ route('student.login') }}">
                        @csrf
                        <!-- Email Input -->
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control border-0 bg-transparent @error('email') is-invalid @enderror" placeholder="البريد الألكتروني">
                        </div>
                        
                        <!-- ./Email Input -->
                        <!-- password Input -->
                        <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" name="password" class="form-control border-0 bg-transparent @error('email') is-invalid @enderror"  id='password' placeholder="كلمة المرور">
                            <div class="input-group-append ">
                                <span class="input-group-text border-0 bg-white p-0 bg-transparent  toggle-password"  toggle="#password-field"><i class="far fa-eye" id="togglePassword"></i></span>
                            </div>
                            
                        </div>
                       
                        <!-- ./password Input -->
                        <!-- Forget Password Link -->
                        <div class="overflow-hidden mb-3">
                            <a href="{{route('student.reset_password')}}" class="text-secondary-color float-left @error('password') is-invalid @enderror">نسيت كلمة المرور؟</a>
                        </div>
                        <!-- ./Forget Password Link -->
                        <!-- Submit Btn -->
                        <button type="submit"
                            class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">تسجيل الدخول</button>
                        <!-- ./Submit Btn -->
                        <!-- Register Link -->
                        <p class="text-center">ليس لديك حساب؟ <a href="{{route('student.register')}}" class="text-secondary-color">إنشاء حساب جديد</a></p>
                        <!-- Register Link -->
                    </form>
                </div>
                <!-- ./Sign In Form -->
            </div>
        </div>
    </div>
</section>


@endsection
@section('website.includes.page_scripts')
<script>
$("#togglePassword").click(function() {
    var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
});


</script>

@endsection 



