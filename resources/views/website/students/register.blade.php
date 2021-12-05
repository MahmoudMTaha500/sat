




@extends('website.app') @section('website.content')

<!-- Sign Up -->
<section class="sign-out py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h1 class="text-main-color font-weight-bold">إنشاء حساب جديد</h1>
            <p>برجاء ادخال البيانات لانشاء حساب جديد  </p>
        </div>
        <!-- ./Section Heading -->
        <div class="row ">
            <div class="col-md-5 mx-auto">
                <!-- Sign Up Form -->
                <div class="sign-out-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">

                    <form class="my-4" method="POST" action="{{ route('student.register') }}">
                        @csrf
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control border-0 bg-transparent @error('name') is-invalid @enderror" placeholder="الاسم بالكامل">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control border-0 bg-transparent @error('email') is-invalid @enderror" placeholder="البريد الألكتروني">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="phone" value="{{ old('phone') }}"  type="tel" class="form-control border-0 bg-transparent @error('phone') is-invalid @enderror" placeholder="رقم الجوال">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="country" value="{{ old('country') }}"  type="text" class="form-control border-0 bg-transparent @error('country') is-invalid @enderror" placeholder="الدولة">
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="city" value="{{ old('city') }}"  type="text" class="form-control border-0 bg-transparent @error('city') is-invalid @enderror" placeholder="المدينة">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="address" value="{{ old('address') }}"  type="text" class="form-control border-0 bg-transparent @error('address') is-invalid @enderror" placeholder="العنوان">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="nationality" value="{{ old('nationality') }}"  type="text" class="form-control border-0 bg-transparent @error('nationality') is-invalid @enderror" placeholder="الجنسية">
                            @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="password" value="{{ old('password') }}"  type="password" class="form-control border-0 bg-transparent @error('password') is-invalid @enderror" placeholder="كلمة المرور">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <input name="password_confirmation" value="{{ old('password_confirmation') }}"  type="password" class="form-control border-0 bg-transparent @error('password_confirmation') is-invalid @enderror" placeholder="تاكيد كلمة المرور">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit"
                            class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">انشاء </button>
                        <!-- ./Submit Btn -->
                        <!-- Sign In Link -->
                        <p class="text-center">لديك حساب  بالفعل؟ <a href="{{route('student.login')}}" class="text-secondary-color">تسجيل الدخول</a></p>
                        <!-- ./Sign In Link -->
                    </form>




                    {{-- <form class="text-center" method="POST" action="{{ route('student.register') }}">
                        @csrf
                    
                        <input type="text" name="name" placeholder="الاسم">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="email" name="email" placeholder="البريد الاليكتروني">
                        @error('email')
                            <span style="color:red;display:block" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror <br>
                        <input type="text" name="phone" placeholder="الهاتف">
                        @error('phone')
                            <span style="color:red;display:block" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror <br>
                        <country-component 
                        ref="countries_component_ref"
                        get_countries_url = "{{route('vue.get.countries')}}"
                        option_null = "{{true}}"
                        >
                        </country-component><br>
                        <city-component 
                            ref="cities_component_ref"
                            get_cities_url = "{{route('vue.get.cities')}}"
                            option_null = "{{true}}"
                        >
                        </city-component><br>
                        <input type="text" name="address" placeholder="العنوان">
                        @error('address')
                            <span style="color:red;display:block" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror <br>
                        <input type="text" name="nationality" placeholder="الجنسية">
                        @error('nationality')
                            <span style="color:red;display:block" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror <br>
                        <input type="password" name="password" placeholder="كلمة السر">
                        @error('password')
                            <span style="color:red;display:block" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror <br>
                        <input type="password" name="password_confirmation" placeholder="اعادة كلمة السر">
                        @error('password_confirmation')
                            <span style="color:red;display:block" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror <br>
                        <button>انشاء حساب جديد</button>
                    </form> --}}
                </div>
                <!-- ./Sign Up Form -->
            </div>
        </div>
    </div>
</section>
<!-- ./Sign Up -->
@endsection
















