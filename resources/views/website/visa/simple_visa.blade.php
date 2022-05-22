@extends('website.app') @section('website.content')

<!-- Sign Up -->
<section class="sign-out py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h1 class="text-main-color font-weight-bold">طلب تأشيرة جديدة</h1>
            <p>برجاء إدخال البيانات لإنشاء التأشيرة</p>
        </div>
        <!-- ./Section Heading -->
        <div class="row">
            <div class="col-md-5 mx-auto">
                <!-- Sign Up Form -->

                <div class="sign-out-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">
                    @if (session()->has('alert_message'))
                    <div class="alert alert-success text-center">
                        {{session()->get('alert_message')}}
                    </div>
                    @endif
                    @if($errors->has('not_robot_error'))
                        <div class="alert alert-danger text-center">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if (session()->has('visa_id'))
                        
                    
                        <form id="form-container" method="post" action="{{route('order-visa-checkout')}}">
                            @csrf
                            <input type="hidden" name="token_id" id="token_input" />
                            <input type="hidden" name="visa_id" value="{{session()->get('visa_id')}}" />
                            <div id="element-container" class="w-100"></div>
                            <div id="error-handler" role="alert"></div>
                            <button id="tap-btn" type="submit" class="btn bg-main-color text-white w-100 rounded-10">
                                دفع
                            </button>
                        </form>
                    @else
                        <form class="my-4" method="POST" action="{{ route('order-visa.store') }}">
                            @csrf
                            <label>الاسم</label>
                            <div class="form-group">
                                <input name="name"
                                @if($student)
                                value="{{ $student->name }}"   
                                readonly  
                                @else
                                value="{{ old('name') }}" 
                                @endif                           
                                type="text" class="form-control  rounded-10 border pl-3 pr-3 btn-light @error('name') pr-5 pr-5 is-invalid @enderror" placeholder="الاسم بالكامل" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label>البريد الإلكتروني</label>
                            <div class="form-group">
                                <input name="email"
                                @if($student)
                                value="{{ $student->email }}" 
                                readonly    
                                @else
                                value="{{ old('email') }}"
                                @endif      


                                
                                 type="email" class="form-control rounded-10 border pl-3 pr-3 btn-light @error('email') pr-5 is-invalid @enderror" placeholder="البريد الإلكتروني" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label>رقم الجوال </label>
                            <div class="form-group">
                                <input name="phone" 
                                @if($student)
                                value="{{ $student->phone }}"  
                                readonly   
                                @else
                                value="{{ old('phone') }}"
                                @endif      
                                
                                type="tel" class="form-control rounded-10 border pl-3 pr-3 btn-light @error('phone') pr-5 is-invalid @enderror" placeholder="رقم الجوال" />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label>الدولة</label>
                            <div class="form-group">
                                <select class="form-control visa-country rounded-10 border pl-3 pr-3 btn-light @error('country') pr-5 is-invalid @enderror" name="country">
                                    <option value="" selected readonly>اختر الدوله</option>
                                    <option {{ old('country') == "England" ? 'selected' : '' }} value="England"> بريطانيا   </option>
                                    <option {{ old('country') == "USA" ? 'selected' : '' }} value="USA"> أمريكا </option>
                                    <option {{ old('country') == "Schengen" ? 'selected' : '' }} value="Schengen"> شنغن </option>
                                </select>

                                {{-- <input name="country" value="{{ old('country') }}" type="text" class="form-control rounded-10 border pl-3 pr-3 btn-light @error('country') pr-5 is-invalid @enderror" placeholder="الدولة" /> --}} @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>  
                            <div class="form-group" style="display:none;"   id="sheingen">
                                <select class="form-control rounded-10 border pl-3 pr-3 btn-light @error('') pr-5 is-invalid @enderror schengen_country"   name="schengen_country">
                                    <option  value="" selected readonly> اختر من دول شنغن</option>
                                    <option {{ old('schengen_country') == "Germany" ? 'selected' : '' }} value="Germany"> المانيا  </option>
                                    <option {{ old('schengen_country') == "France" ? 'selected' : '' }} value="France"> فرنسا </option>
                                    <option {{ old('schengen_country') == "Italy" ? 'selected' : '' }} value="Italy"> إيطاليا </option>
                                    <option {{ old('schengen_country') == "Spain" ? 'selected' : '' }} value="Spain"> إسبانيا  </option>
                                    <option {{ old('schengen_country') == "Estonia" ? 'selected' : '' }} value="Estonia"> إستونيا </option>
                                    <option {{ old('schengen_country') == "Belgium" ? 'selected' : '' }} value="Belgium"> بلجيكا </option>
                                    <option {{ old('schengen_country') == "Greece" ? 'selected' : '' }} value="Greece"> اليونان </option>
                                    <option {{ old('schengen_country') == "Denmark" ? 'selected' : '' }} value="Denmark"> الدنمارك </option>
                                    <option {{ old('schengen_country') == "Finland" ? 'selected' : '' }} value="Finland"> فنلندا </option>
                                    <option {{ old('schengen_country') == "Portugal" ? 'selected' : '' }} value="Portugal"> البرتغال </option>
                                    <option {{ old('schengen_country') == "Malta" ? 'selected' : '' }} value="Malta"> 	مالطا </option>
                                    <option {{ old('schengen_country') == "Switzerland" ? 'selected' : '' }} value="Switzerland"> سويسرا </option>
                                    <option {{ old('schengen_country') == "Sweden" ? 'selected' : '' }} value="Sweden"> السويد </option>
                                    <option {{ old('schengen_country') == "Slovakia" ? 'selected' : '' }} value="Slovakia"> سلوفاكيا </option>
                                    <option {{ old('schengen_country') == "Poland" ? 'selected' : '' }} value="Poland"> بولندا </option>
                                    <option {{ old('schengen_country') == "Iceland" ? 'selected' : '' }} value="Iceland"> 	آيسلندا </option>
                                    <option {{ old('schengen_country') == "Netherlands" ? 'selected' : '' }} value="Netherlands"> هولندا </option>
                                    <option {{ old('schengen_country') == "Norway" ? 'selected' : '' }} value="Norway"> النرويج </option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                </span>    
                             
                            </div>
                            <label>نوع التأشيرة</label>
                            <div class="form-group">
                                <select  name="visatype"  id="visID" readonly class="visatype form-control rounded-10 border pl-3 pr-3 btn-light @error('visatype') pr-5 is-invalid @enderror"  >
                                    <option value="" selected readonly>اختر التأشيرة </option>
                                    <option {{ old('visatype') == "سياحي ستة أشهر" ? 'selected' : '' }} visa-price="820"   class="uk" value="سياحي ستة أشهر">سياحي ستة أشهر  </option>
                                    <option {{ old('visatype') == "دراسي ستة أشهر" ? 'selected' : '' }} visa-price="820"    class="uk" value="دراسي ستة أشهر">دراسي ستة أشهر  </option>
                                    <option {{ old('visatype') == "سياحي سنتين" ? 'selected' : '' }} visa-price="2480"    class="uk" value="سياحي سنتين"> سياحي سنتين</option>
                                    <option {{ old('visatype') == "سياحي خمس سنوات" ? 'selected' : '' }} visa-price="4310"    class="uk" value="سياحي خمس سنوات"> سياحي خمس سنوات </option>
                                    <option {{ old('visatype') == "سياحي عَشْر سنين" ? 'selected' : '' }} visa-price="5350"    class="uk" value="سياحي عَشْر سنين"> سياحي عَشْر سنين </option>
                                    <option {{ old('visatype') == "تأشيرة طالب أقل من ستة أشهر" ? 'selected' : '' }} visa-price="2260"   class="uk" value="تأشيرة طالب أقل من ستة أشهر">تأشيرة طالب أقل من ستة أشهر  </option>
                                    <option {{ old('visatype') == "تأشيرة طالب لسنة واحدة" ? 'selected' : '' }} visa-price="4900"   class="uk" value="تأشيرة طالب لسنة واحدة">تأشيرة طالب لسنة واحدة  </option>
                                    <option {{ old('visatype') == "تأشيرة طالب لسنتين" ? 'selected' : '' }} visa-price="8960"   class="uk" value="تأشيرة طالب لسنتين"> تأشيرة طالب لسنتين  </option>
                                    <option {{ old('visatype') == "تأشيرة طالب لثلاث سنوات" ? 'selected' : '' }} visa-price="11640"   class="uk" value="تأشيرة طالب لثلاث سنوات"> تأشيرة طالب لثلاث سنوات </option>
                                    <option {{ old('visatype') == "تأشيرة طالب لأربع سنوات" ? 'selected' : '' }} visa-price="14250"   class="uk" value="تأشيرة طالب لأربع سنوات"> تأشيرة طالب لأربع سنوات </option>
                                    <option {{ old('visatype') == "دراسي أحد عشر شهراً" ? 'selected' : '' }} visa-price="3940"   class="uk" value="دراسي أحد عشر شهراً"> دراسي أحد عشر شهراً </option>

                                    <option {{ old('visatype') == "دراسي شامل السفيس" ? 'selected' : '' }} visa-price="2220"  class="usa" value="دراسي شامل السفيس"> دراسي شامل السفيس </option>
                                    <option {{ old('visatype') == "مُرافق" ? 'selected' : '' }} visa-price="838"   class="usa" value="مُرافق"> مُرافق</option>
                                    <option {{ old('visatype') == "سياحي" ? 'selected' : '' }} visa-price="838"   class="usa" value="سياحي"> سياحي</option>
                                    <option {{ old('visatype') == "سياحي " ? 'selected' : '' }} visa-price="500"   class="schengen" value="سياحي "> سياحي</option>
                                </select>
                                <input type="hidden" id="price_visa" name="price" />

                                @error('visatype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <span id="text_hidden" style="display: none; color:#212529; margin:0; padding:0;">
                                السعر :
                                <b id="price_text" style="color:#006FFF"></b>   ريال سعودي
                                
                            </span>
                            <label>ملاحظة</label>
                            <div class="form-group">
                                <textarea name="notes" value="{{ old('notes') }}" type="text" class="form-control rounded-10 border pl-3 pr-3 btn-light @error('notes') pr-5 is-invalid @enderror" placeholder="ملاحظات"> {{old("notes")}} </textarea>
                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"></div>
                            <button type="submit" class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">انشاء</button>
                            <button type="button" class="btn bg-main-color text-white w-100 rounded-10"
                                    data-toggle="modal" data-target="#office_numbers">
                                    طرق الدفع
                                </button>
                            <div class="modal fade" id="office_numbers" tabindex="-1" aria-labelledby="successModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body py-5 px-4 text-center">
                                            <div class="cheched-img">
                                                <img src="{{asset('storage/icons/check.png')}}" alt="" class="img-fluid" />
                                            </div>
                                            <div class="cheched-heading">
                                                <h3 class="text-main-color font-weight-bold">كلاسات</h3>
                                                <p>الرجاء التواصل بالمكتب الخاص بنا عن طريق الارقام الاتية</p>
                                            </div>
                                            <ul class="p-0">
                                                <li>
                                                    <hr />
                                                    <div class="social-links">
                                                        <a class="bg-main-color d-inline-block text-center ml-3" href="tel:966555484931">
                                                            <span class="text-white font-weight-bold"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                        </a>
                                                        <a dir="ltr" href="tel:+966555484931">+966 55 548 4931</a>
                                                    </div>
                                                    <hr />
                                                    <div class="social-links">
                                                        <a class="bg-main-color d-inline-block text-center ml-3" href="tel:966555484931">
                                                            <span class="text-white font-weight-bold"><i class="fab fa-whatsapp"></i></span>
                                                        </a>
                                                        <a dir="ltr" target="_blank" href="https://wa.me/+966555484931">+966 55 548 4931</a>
                                                    </div>
                                                    <hr />
                                                    <div class="cheched-heading">
                                                        <p>او يمكنك التحويل مباشرة علي الحسابات الاتية</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <div class="cost-body px-3 pt-3"><div>
                                                            <img class="mb-4" src="{{asset('storage/bank-logos/NBC.png')}}" width="150px" alt="">
                                                            <span class="font-weight-bold d-block text-main-color">الاسم :  <span class="text-dark"> مؤسسة سات للخدمات التجارية</span> </span> 
                                                            <span class="font-weight-bold d-block text-main-color">رقم الحساب :  <span class="text-dark"> 05800000176208</span> </span> 
                                                            <span class="font-weight-bold d-block text-main-color">رقم الآيبان  :  <span class="text-dark"> SAT for Trading Services</span> </span> 
                                                            <span class="font-weight-bold d-block">SA0610000005800000176208</span> 
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="text-right">
                                                        <div class="cost-body px-3 pt-3"><div>
                                                            <img class="mb-4" src="{{asset('storage/bank-logos/Rajhi.png')}}" width="150px" alt="">
                                                            <span class="font-weight-bold d-block text-main-color">الاسم :  <span class="text-dark"> وكالة سات للسياحة و السفر</span> </span> 
                                                            <span class="font-weight-bold d-block text-main-color">رقم الحساب :  <span class="text-dark"> 562608010266542</span> </span> 
                                                            <span class="font-weight-bold d-block text-main-color">رقم الآيبان  :  <span class="text-dark"> SAT Agency for Travel and Tourism</span> </span> 
                                                            <span class="font-weight-bold d-block">SA2780000562608010266542</span> 
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="text-right">
                                                        <div class="cost-body px-3 pt-3"><div>
                                                            <img class="mb-4" src="{{asset('storage/bank-logos/riyad.png')}}" width="150px" alt="">
                                                            <span class="font-weight-bold d-block text-main-color">الاسم :  <span class="text-dark"> وكالة سات للسفر و السياحة</span> </span> 
                                                            <span class="font-weight-bold d-block text-main-color">رقم الحساب :  <span class="text-dark"> 05800000176208</span> </span> 
                                                            <span class="font-weight-bold d-block text-main-color">رقم الآيبان  :  <span class="text-dark"> SAT Agency</span> </span> 
                                                            <span class="font-weight-bold d-block">SA2120000003184470469940</span> 
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                    
                    
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

    function visaCountry() {
        var visa = $('.visa-country').val();
        
        if('{{old("visatype")}}' == ''){
            $('.visatype').val('')
        }
        $("#price_text").text('');
        $('#text_hidden').hide()
        $('#sheingen').css('display','none');
        if (visa == "England") {
            $("#visID").removeAttr("readonly");
            $(".usa").css("display", "none");
            $(".schengen").css("display", "none");
            $(".uk").css("display", "");
        }
        if (visa == "USA") {
            $("#visID").removeAttr("readonly");
            $(".uk").css("display", "none");
            $(".schengen").css("display", "none");
            $(".usa").css("display", "");
        }
        if (visa == "Schengen") {
            $("#visID").removeAttr("readonly");
            $(".uk").css("display", "none");
            $(".usa").css("display", "none");
            $(".schengen").css("display", "");
            
            $('#sheingen').css('display','block');
            if('{{old("schengen_country")}}' == ''){
                $('.schengen_country').val('')
            }
        }
    }

    
    function schengenCountry(){
        var schengenCountry = $('.schengen_country').val()
        if(schengenCountry != ''){
            var value = 500
            if(schengenCountry == 'Germany'){value = 550}
            if(schengenCountry == 'Spain'){value = 430}
            if($('.visatype').val() != null){
                $("#price_text").text(value);
                $('#text_hidden').show()
            }
        }
    }

    function visatype() {
        var selectedVisaType = $(".visatype").children("option:selected");
        if(selectedVisaType.hasClass('schengen')){
            var schengenCountry = $('.schengen_country').val()
            if(schengenCountry != ''){
                var value = 500
                if(schengenCountry == 'Germany'){value = 550}
                if(schengenCountry == 'Spain'){value = 430}
                $("#price_text").text(value);
                $('#text_hidden').show()
            }
        }else{
            var value = (document.getElementById("price_visa").value = selectedVisaType.attr('visa-price'));
            $("#price_text").text(value);
            $('#text_hidden').show()
        }
    }

    

    $('.visa-country').on( 'change' ,function(){
        visaCountry()
    })
    $('.schengen_country').change(function(){
        schengenCountry()
    })
    $(".visatype").change(function(){
        visatype()
    });


    visaCountry()
    schengenCountry()
    visatype()
</script>
@endsection