@extends('website.app')

@section('website.content')


<section class="sign-in py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h1 class="text-main-color font-weight-bold"> اعاده انشاء كلمه المرور</h1>
            <p>برجاء ادخال بريدك الالكتروني    لارسال كلمه المرور الجديده  </p>
        </div>
        <!-- ./Section Heading -->
        <div class="row ">
            <div class="col-md-5 mx-auto">
                <!-- Sign In Form -->
                <div class="sign-in-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">

                    @if (session()->has('alert_message'))
                        <div class="alert alert-success text-center">
                            {{session()->get('alert_message')}}
                        </div>
                    @endif

                    <form class="my-4" method="POST" action="{{ route('student.reset_password') }}">
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
                 
                       
                        <!-- ./password Input -->
                        <!-- Forget Password Link -->
                       
                        <!-- ./Forget Password Link -->
                        <!-- Submit Btn -->
                        <button type="submit"
                            class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white"> ارسال</button>
                            @if (session()->has('alert_message'))
                            <p class="text-center">لتسجيل الدخول <a href="{{route('student.login')}}" class="text-secondary-color">  اضغط هنا</a></p>

                            @endif
                        <!-- ./Submit Btn -->
                        <!-- Register Link -->
                        <!-- Register Link -->
                    </form>
                </div>
                <!-- ./Sign In Form -->
            </div>
        </div>
    </div>
</section>


@endsection




