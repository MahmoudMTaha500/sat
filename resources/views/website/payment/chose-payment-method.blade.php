@extends('website.app') @section('website.content')
<!-- Confirm Reservation -->
<section class="confirm-reservation py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
    
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-institutes">
                    <h3 class="text-main-color font-weight-bold">تأكيد الحجز</h3>
                    <p class="mb-1">برجاء ادخل جميع البيانات لتأكيد حجزك وسيقوم فريق الموقع بالتواصل معك لتأكيد جميع التفاصيل لذا تأكد من صحة الجوال والبريد الإلكتروني</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-lg-8">
                @include('website.includes.errors')
                <!-- Confirm Reservation Form -->

                <div class="bg-white p-xl-5 p-3 rounded-10 mb-4 upload-payment-bill" @if(!$errors->any()) style="display: none" @endif>
                    <div class="text-center">
                        <h3 class="text-main-color font-weight-bold h5">برجاء اضافة فاتورة التحويل الخاصة بكم لاكمال الطلب</h3>
                        <p>او يمكنك الرجوع لفرق الدعم الخاص بنا لاستكمال طلبك </p>
                        <div class="mt-5">
                            <form class="form" action="{{route('student.upload.payment.bill' , $request_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control mb-3" name="payment_bill_file">
                                <button class="btn btn-primary w-100" type="submit">رفع</button>
                            </form>
                        </div>
                        <div class="my-5 alert alert-warning text-center">
                            يرجى ملاحظة ان مبلغ التحويل هو مجرد تامين للتقديم علي الدورة, و يتم ارسال تفاصيل السعر النهائي عند التواصل بفريق العمل الخاص بنا 
                        </div>
                    </div>
                </div>

                <div class="bg-white p-xl-5 p-3 rounded-10 mb-4">
                    
                    <div class="text-center">
                        <div class="cheched-img">
                            <img src="{{asset('website/imgs/checked.png')}}" alt="" class="img-fluid" />
                        </div>
                        <h3 class="text-main-color font-weight-bold">تم استلام طلبكم بنجاح</h3>
                        <div class="cheched-heading">
                            <p>لقد تم استلام طلبك بنجاح و سوف يقوم طاقم الموقع بالاتصال بك لمراجعة طلبك و تأكيد الحجز </p>
                            <a target="_blank" href="{{route('student_invoice' , ['request_id' => $request_id ])}}" class="btn w-100 bg-secondary-color text-white rounded-10 ml-3 px-3 mb-4">
                                عرض السعر
                            </a>
                            <button disabled type="button" class="btn bg-main-color text-white w-100 rounded-10 pay-now-btn" data-toggle="modal" data-target="#office_numbers">
                                ادفع الان
                            </button>
                            <a href="https://wa.me/+966555484931"  target="_blank">
                                <button type="button" class="btn bg-success text-white w-100 rounded-10 mt-3">
                                    تواصل مع خدمة العملاء
                                </button>
                            </a>
                            <div class="row mt-4">
                                <div class="col-auto">
                                    <input type="checkbox" class="refund-policy" value="1">
                                </div>
                                <div class="col-auto text-right">
                                    اقبل سياسة الاسترجاع للاستمرار في عملية الدفع <br>
                                    <a data-toggle="modal" data-target="#refund-policy" href="{{route('website.refund_policy')}}">اضغط هنا لعرض سياسة الاسترجاع</a>
                                </div>
                            </div>
                            <div class="modal fade" id="office_numbers" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">طرق الدفع</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body py-5 px-4 text-center">
                                            <div class="cheched-img mb-5">
                                                <img src="{{asset('storage/icons/check.png')}}"  alt="" class="img-fluid" />
                                            </div>
                                            <div>
                                                <div class="upload-payment-bill">
                                                    
                                                    <div class="text-right">
                                                        <div class="cost-body px-3 pt-3">
                                                            <span class="font-weight-bold d-block text-main-color">يرجى ارسال الفاتورة الخاصة بالتحويل لاكمال عملية الدفع</span> 
                                                            <span class=" d-block text-dark mb-5">يمكنك ارسال رسوم الدورة عن طريق الحسابات في الاسفل</span> 
                                                            <form class="form" action="{{route('student.upload.payment.bill' , $request_id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" class="form-control mb-3" name="payment_bill_file">
                                                                <button class="btn btn-primary w-100" type="submit">ارسل الفاتورة</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="my-5 alert alert-warning text-center">
                                                        يرجى ملاحظة ان مبلغ التحويل هو مجرد تامين للتقديم علي الدورة, و يتم ارسال تفاصيل السعر النهائي عند التواصل بفريق العمل الخاص بنا 
                                                    </div>
                                                    <hr>
                                                </div>
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
                            <div class="modal fade" id="refund-policy" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body py-5 px-4 text-center">
                                            <div class="cheched-img">
                                                <img src="imgs/checked.png" alt="" class="img-fluid" />
                                            </div>
                                            <div class="cheched-heading">
                                                <h3 class="text-main-color font-weight-bold">سياسة الاسترجاع</h3>
                                            </div>
                                            <div class="text-right">
                                                {!! $refund_policy !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="{{route('prev_step_form_chose_payment_method' , ['request_id' => $request_id ])}}" class="btn bg-dark text-white rounded-10 float-left">
                    الخطوة السابقة
                </a>
                <!-- ./Confirm Reservation Form -->
            </div>
            <div class="col-lg-4">
                <!-- Course Details -->
                <div class="bg-white py-4 rounded-10 mb-4">
                    <div class="cost-heading border-bottom pb-2 px-3">
                        <h5 class="font-weight-bold text-main-color">تفاصيل الكورس والحجز</h5>
                    </div>
                    <div class="cost-body px-3 pt-3">
                        <p class="text-dark"><span class="font-weight-bold">تكلفة الكورس الإجمالية : </span> {{round($course_details['total_price'])}} ريال سعودي</p>
                        <p class="text-dark"><span class="font-weight-bold">أسم المعهد : </span> {{$course_details['institute_name']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">اسم الكورس : </span> {{$course_details['course_name']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">الموقع : </span> {{$course_details['country']}} - {{$course_details['city']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">تاريخ بداية الكورس : </span> {{ArabicDate($course_details['from_date'])}}</p>
                        <p class="text-dark"><span class="font-weight-bold">تاريخ نهاية الكورس : </span> {{ArabicDate($course_details['to_date'])}}</p>
                        @if ($course_details['airport'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">الاستقبال : </span> {{$course_details['airport']['name_ar']}} - {{$course_details['airport']['price']}} ريال سعودي</p>
                        @endif @if ($course_details['residence'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">تفاصيل السكن : </span> {{$course_details['residence']['name_ar']}} - {{$course_details['residence']['price']*$course_details['weeks'] }} ريال سعودي</p>
                        @endif @if ($course_details['insurance_price'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">التامين : </span> {{$course_details['insurance_price']*$course_details['weeks']}} ريال سعودي</p>
                        @endif
                        <p class="text-dark"><span class="font-weight-bold">عدد الأسابيع : </span> {{$course_details['weeks']}} أسابيع</p>
                        <p class="text-dark"><span class="font-weight-bold">عدد الدروس : </span> {{$course_details['lessons_per_week']}} درس / أسبوع</p>
                        <p class="text-dark"><span class="font-weight-bold">عدد الساعات : </span> {{$course_details['hours_per_week']}} ساعة في الأسبوع</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ./Confirm Reservation -->
@endsection 
@section('website.includes.page_scripts') 
    @error('login_error')
        <button class="student_login_btn d-none" data-toggle="modal" data-target="#student_login">click</button>
        <script>
            $(".student_login_btn").trigger("click");
        </script>
    @enderror 
    <script>
        $('.pay-now-btn').click(function(){
            $('.upload-payment-bill').show()
        })
        $('.refund-policy').change(function(){
            if($(this).prop('checked') == true){
                $('.pay-now-btn').prop('disabled', false)
            }else{
                $('.pay-now-btn').prop('disabled', true)
            }
        })
    </script>
@endsection

