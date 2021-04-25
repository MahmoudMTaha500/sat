
@extends('website.app') @section('website.content')

<!-- Sign Up -->
<section class="sign-out py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h3 class="text-main-color font-weight-bold"> طلب تاشيره جديد</h3>
            <p>برجاء ادخال البيانات لانشاء التاشيره   </p>
        </div>
        <!-- ./Section Heading -->
        <div class="row ">
            <div class="col-md-5 mx-auto">
                <!-- Sign Up Form -->
                <div class="sign-out-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">
                    @if (session()->has('alert_message'))
                    <div class="alert alert-success text-center">
                        {{session()->get('alert_message')}}
                    </div>
                @endif
                    <form class="my-4" method="POST" action="{{ route('order-visa.store') }}">
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
                            <select class="form-control border-0 bg-transparent @error('country') is-invalid @enderror"  onchange="visatype22(event)" name="country" required>
                                <option value="" selected disabled>اختر الدوله</option>
                                <option  value="England"  > انجلترا  </option>
                                <option value="USA"  > امريكا  </option>
                                <option value="Schengen"  > شنغن </option>
                         
                            </select>

                            {{-- <input name="country" value="{{ old('country') }}"  type="text" class="form-control border-0 bg-transparent @error('country') is-invalid @enderror" placeholder="الدولة"> --}}
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <select   name="visatype" required   id="visID" disabled class="form-control border-0 bg-transparent @error('visatype') is-invalid @enderror">
                                <option  value=""  selected disabled>اختر التاشيرة</option>
                                <option   onclick="visaprice(820)"  class="uk" value=" سياحي 6 شهور-السعر-820   "   >سياحي 6 شهور-السعر-820 </option>
                                <option  onclick="visaprice(820)"  class="uk" value=" دراسي 6 شهور-السعر-820   "   >دراسي 6 شهور-السعر-820 </option>
                                <option  onclick="visaprice(2480)"  class="uk" value="  سياحي سنتين -السعر-2480"   > سياحي سنتين -السعر-2480</option>
                                <option  onclick="visaprice(4310)"  class="uk" value="  سياحي 5 سنوات-4310"   >   سياحي 5 سنوات-4310</option>
                                <option   onclick="visaprice(5350)" class="uk" value="  سياحي 10 سنوات-5350"   >   سياحي 10 سنوات-5350</option>
                                <option  onclick="visaprice(2260)"  class="uk" value=" تاشيره طالب اقل من سته شهور-السعر-2260 "   >تاشيره طالب اقل من سته شهور-السعر-2260 </option>
                                <option  onclick="visaprice(4900)"  class="uk" value=" تاشيره طالب سنه-السعر-السعر-4900 "   >تاشيره طالب سنه-السعر-السعر-4900 </option>
                                <option  onclick="visaprice(8960)"  class="uk" value="  تاشيره طالب سنتين-السعر-8960"   > تاشيره طالب سنتين-السعر-8960 </option>
                                <option   onclick="visaprice(11640)" class="uk" value=" تاشيره طالب ثلاث سنوات-السعر-11640"   >  تاشيره طالب ثلاث سنوات-السعر-11640</option>
                                <option  onclick="visaprice(14250)"  class="uk" value="  تاشيره طالب اربع سنوات-السعر-14250"   >  تاشيره طالب اربع سنوات-السعر-14250</option>
                                <option   onclick="visaprice(3940)" class="uk" value="  دراسي 11 شهر-السعر-3940"   >  دراسي 11 شهر-السعر-3940 </option>

                                <option  onclick="visaprice(2220)"  class="usa" value="  دراسي شامل السفيس-السعر-2220"   >  دراسي شامل السفيس-السعر-2220</option>
                                <option  onclick="visaprice(838)"  class="usa" value=" مرافق-السعر-838"   > مرافق-السعر-838</option>
                                <option  onclick="visaprice(838)"  class="usa" value=" سياحي-السعر-838"   > سياحي-السعر-838</option>
                                <option   onclick="visaprice(730)"  class="schengen" value=" سياحي-السعر-730"   > سياحي-السعر-730</option>
                            </select>
                            <input type="hidden" id="price_visa" name="price">

                            @error('visatype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                            <textarea name="notes" value="{{ old('notes') }}"  type="text" class="form-control border-0 bg-transparent @error('notes') is-invalid @enderror" placeholder="ملاحظات"> </textarea>
                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit"
                            class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">انشاء </button>
                        <!-- ./Submit Btn -->
                        <!-- Sign In Link -->
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
@section('website.includes.page_scripts')
    
<script>
  
    function visatype22(event){
    var visa =event.target.value;
        if( visa =='England'){
         $("#visID").removeAttr('disabled');
         $('.usa').css('display','none');
         $('.schengen').css('display','none');
         $('.uk').css('display','');
        } 
         if(visa == 'USA'){
            $("#visID").removeAttr('disabled');
            $('.uk').css('display','none');
         $('.schengen').css('display','none'); 
         $('.usa').css('display','');
        } 
        if(visa == 'Schengen'){
            $("#visID").removeAttr('disabled');

            $('.uk').css('display','none');
         $('.usa').css('display','none'); 
         $('.schengen').css('display','');
        }
    }
    function visaprice(price){
    var  value= document.getElementById('price_visa').value =price;
    }
    
    </script>
    @endsection














