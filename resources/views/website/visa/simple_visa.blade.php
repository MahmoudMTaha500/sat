<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
<script src="https://secure.gosell.io/js/sdk/tap.min.js"></script>

@extends('website.app') @section('website.content')

<!-- Sign Up -->
<section class="sign-out py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="col-12 text-center">
            <h3 class="text-main-color font-weight-bold">طلب تاشيره جديد</h3>
            <p>برجاء ادخال البيانات لانشاء التاشيره</p>
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
                            
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control border-0 bg-transparent @error('name') is-invalid @enderror" placeholder="الاسم بالكامل" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control border-0 bg-transparent @error('email') is-invalid @enderror" placeholder="البريد الألكتروني" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                <input name="phone" value="{{ old('phone') }}" type="tel" class="form-control border-0 bg-transparent @error('phone') is-invalid @enderror" placeholder="رقم الجوال" />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                <select class="form-control visa-country border-0 bg-transparent @error('country') is-invalid @enderror" name="country" required>
                                    <option value="" selected disabled>اختر الدوله</option>
                                    <option value="England"> بريطانايا  </option>
                                    <option value="USA"> امريكا </option>
                                    <option value="Schengen"> شنغن </option>
                                </select>

                                {{-- <input name="country" value="{{ old('country') }}" type="text" class="form-control border-0 bg-transparent @error('country') is-invalid @enderror" placeholder="الدولة" /> --}} @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>   
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light" style="display:none;"   id="sheingen">
                                <select class="form-control border-0 bg-transparent @error('') is-invalid @enderror"   name="country_sheingen" required>
                                    <option value="" selected disabled> اختر من دول شنغن</option>
                                    <option value="Germany"> المانيا  </option>
                                    <option value="France"> فرنسا </option>
                                    <option   value="Italy"> ايطاليا </option>
                                    <option   value="Spain"> اسبانيا </option>
                                    <option   value="Estonia"> إستونيا </option>
                                    <option   value="Belgium"> بلجيكا </option>
                                    <option   value="Greece"> اليونان </option>
                                    <option   value="Denmark"> الدنمارك </option>
                                    <option   value="Finland"> فنلندا </option>
                                    <option   value="Portugal"> البرتغال </option>
                                    <option   value="Malta"> 	مالطا </option>
                                    <option   value="Switzerland"> سويسرا </option>
                                    <option   value="Sweden"> السويد </option>
                                    <option   value="Slovakia"> سلوفاكيا </option>
                                    <option   value="Poland"> بولندا </option>
                                    <option   value="Iceland"> 	آيسلندا </option>
                                    <option   value="Netherlands"> هولندا </option>
                                    <option   value="Norway"> النرويج </option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                </span>    
                             
                            </div>
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                <select  name="visatype" required id="visID" disabled class="visatype form-control border-0 bg-transparent @error('visatype') is-invalid @enderror"  >
                                    <option value="" selected disabled>اختر التاشيرة</option>
                                    <option visa-price="820"   class="uk" value=" سياحي 6 شهور">سياحي 6 شهور </option>
                                    <option visa-price="820"    class="uk" value=" دراسي 6 شهور">دراسي 6 شهور </option>
                                    <option visa-price="2480"    class="uk" value="  سياحي سنتين"> سياحي سنتين</option>
                                    <option visa-price="4310"    class="uk" value="  سياحي 5 سنوات"> سياحي 5 سنوات </option>
                                    <option visa-price="5350"    class="uk" value="  سياحي 10 سنوات"> سياحي 10 سنوات </option>
                                    <option visa-price="2260"   class="uk" value=" تاشيره طالب اقل من سته شهور">تاشيره طالب اقل من سته شهور  </option>
                                    <option visa-price="4900"   class="uk" value=" تاشيره طالب سنه">تاشيره طالب سنه  </option>
                                    <option visa-price="8960"   class="uk" value="  تاشيره طالب سنتين"> تاشيره طالب سنتين  </option>
                                    <option visa-price="11640"   class="uk" value=" تاشيره طالب ثلاث سنوات"> تاشيره طالب ثلاث سنوات </option>
                                    <option visa-price="14250"   class="uk" value="  تاشيره طالب اربع سنوات"> تاشيره طالب اربع سنوات </option>
                                    <option visa-price="3940"   class="uk" value="  دراسي 11 شهر"> دراسي 11 شهر </option>

                                    <option visa-price="2220"  class="usa" value="  دراسي شامل السفيس"> دراسي شامل السفيس </option>
                                    <option visa-price="838"   class="usa" value=" مرافق"> مرافق</option>
                                    <option visa-price="838"   class="usa" value=" سياحي"> سياحي</option>
                                    <option visa-price="730"   class="schengen" value=" سياحي"> سياحي</option>
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
                            <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                <textarea name="notes" value="{{ old('notes') }}" type="text" class="form-control border-0 bg-transparent @error('notes') is-invalid @enderror" placeholder="ملاحظات"> </textarea>
                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12"><label>وسيلة الدفع</label> <br /></div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline mr-0 ml-4">
                                        <input v-model="insurance_price_checker"  name="payment_method" type="radio" id="inlineCheckbox1" value="online" class="form-check-input mr-0 ml-3 bg-secondary" /> <label class="form-check-label">الدفع اونلاين</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline mr-0 ml-4">
                                        <input v-model="insurance_price_checker" name="payment_method" type="radio" id="inlineCheckbox1" value="office" class="form-check-input mr-0 ml-3 bg-secondary" /> <label class="form-check-label">الدفع عن طريق مكتب</label>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <div>
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">انشاء</button>
                            <button type="button" class="btn bg-main-color text-white w-100 rounded-10"
                                    data-toggle="modal" data-target="#office_numbers">
                                    ارقام المكتب
                                </button>
                            <div class="modal fade" id="office_numbers" tabindex="-1" aria-labelledby="successModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body py-5 px-4 text-center">
                                            <div class="cheched-img ">
                                                <img src="imgs/checked.png" alt="" class="img-fluid">
                                            </div>
                                            <div class="cheched-heading">
                                                <h3 class="text-main-color font-weight-bold">كلاسات</h3>
                                                <p>الرجاء التواصل بالمكتب الخاص بنا عن طريق الارقام الاتية</p>
                                            </div>
                                            <ul class="p-0">
                                                <li><hr><a href="tel:966555484931">+966 55 548 4931</a> <hr></li>
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




<script>
    //pass your public key from tap's dashboard
    var tap = Tapjsli("pk_test_pu0ALqysgrz5UWKvjotBZTQY");

    var elements = tap.elements({});
    var style = {
        base: {
            color: "#535353",
            lineHeight: "18px",
            fontFamily: "sans-serif",
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "rgba(0, 0, 0, 0.26)",
                fontSize: "15px",
            },
        },
        invalid: {
            color: "red",
        },
    };
    // input labels/placeholders
    var labels = {
        cardNumber: "Card Number",
        expirationDate: "MM/YY",
        cvv: "CVV",
        cardHolder: "Card Holder Name",
    };
    //payment options
    var paymentOptions = {
        currencyCode: ["KWD", "USD", "SAR"],
        labels: labels,
        TextDirection: "ltr",
    };
    //create element, pass style and payment options
    var card = elements.create("card", { style: style }, paymentOptions);
    //mount element
    card.mount("#element-container");
    //card change event listener
    card.addEventListener("change", function (event) {
        if (event.BIN) {
            console.log(event.BIN);
        }
        if (event.loaded) {
            console.log("UI loaded :" + event.loaded);
            console.log("current currency is :" + card.getCurrency());
        }
        var displayError = document.getElementById("error-handler");
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    });


   
</script>



@endsection




@section('website.includes.page_scripts')

<script>

var form = $("#form-container")

form.submit(function(e){
            e.preventDefault();
            
            
         tap.createToken(card).then(function (result) {
            
            console.log(result);
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById("error-handler");
                errorElement.textContent = result.error.message;
            } else {
                console.log(result.id)
                // Send the token to your server
                function get_token_id(result , form_submition){
                    document.getElementById("token_input").value = result.id;
                    form_submition(form)
                }
                get_token_id(result , function(form){form.unbind('submit').submit();})
            }
        });
    });

    $('.visa-country').change(function(){
        var visa = event.target.value;
        $('#sheingen').css('display','none');
        if (visa == "England") {
            $("#visID").removeAttr("disabled");
            $(".usa").css("display", "none");
            $(".schengen").css("display", "none");
            $(".uk").css("display", "");
        }
        if (visa == "USA") {
            $("#visID").removeAttr("disabled");
            $(".uk").css("display", "none");
            $(".schengen").css("display", "none");
            $(".usa").css("display", "");
        }
        if (visa == "Schengen") {
            $("#visID").removeAttr("disabled");
            $(".uk").css("display", "none");
            $(".usa").css("display", "none");
            $(".schengen").css("display", "");
            $('#sheingen').css('display','block');
        }
    })
    $(".visatype").change(function(){
        var selectedVisaType = $(this).children("option:selected");
        var value = (document.getElementById("price_visa").value = selectedVisaType.attr('visa-price'));

        $("#price_text").text(value);
        $('#text_hidden').show()
    });
    
</script>
@endsection