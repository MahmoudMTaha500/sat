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
                
                 <!-- Pay Now Form -->
                 <div class="bg-white  p-xl-5 p-3 rounded-10">
                    <p class="text-main-color">برجاء اختيار المبلغ الذي تريد دفعه الآن</p>
                    @include('admin.includes.errors')
                    <form action="{{route('checkout')}}" method="post">
                        @csrf
                        <input type="hidden" name="request_id" value= "{{$request_id}}">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="custom-control custom-radio">
                                    <input value="{{round($course_details['total_price']/2)}}" type="radio" id="deposit" name="paid_price" class="custom-control-input">
                                    <label class="custom-control-label" for="deposit">الحد الأدني {{round($course_details['total_price']/2)}} ريال سعودي ( قيمة العربون )</label>
                                  </div>
                            </div>
                            <div class="col-lg-6 mb-4 text-left">
                                <div class="custom-control custom-radio">
                                    <input  value="{{round($course_details['total_price'])}}" type="radio" id="total_price" name="paid_price" class="custom-control-input">
                                    <label class="custom-control-label" for="total_price">المبلغ بالكامل {{round($course_details['total_price'])}} ريال سعودي</label>
                                  </div>
                            </div>

                            
                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input type="text" class="form-control border-0 bg-transparent"
                                        placeholder="رقم البطاقة">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input type="text" class="form-control border-0 bg-transparent"
                                        placeholder="اسم حامل البطاقة">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input type="text" class="form-control border-0 bg-transparent"
                                        placeholder="CVV">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                                    <input type="text" class="form-control border-0 bg-transparent credit" data-toggle="datepicker" placeholder="تاريخ البداية">
                                    <div class="input-group-append ">
                                        <span class="input-group-text border-0 bg-white p-0 bg-transparent" id="basic-addon2"><i class="far fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input {{ old('refund_policy') != null  ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="customCheck1" name="refund_policy">
                                    <label class="custom-control-label" for="customCheck1"><a data-toggle="modal" data-target="#successModal" href="#">أوافق على الشروط والأحكام و سياسة الاسترداد</a></label>
                                  </div>
                            </div>
                            <!-- Modal of terms and conditions -->
                            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body py-5 px-4 text-center">
                                        
                                        <div class="cheched-heading">
                                            <h3 class="text-main-color font-weight-bold">الشروط والأحكام و سياسة الاسترداد</h3>
                                            <p>شروط بيع برنامج الشراء بالكميات

                                                أ. شروط البيع الخاصة بـ iTunes Store وMac App Store وApp Store وiBooks Store
                                                
                                                ب. البنود والشروط الخاصة بـ iTunes Store
                                                
                                                ج. البنود والشروط الخاصة بـ Mac App Store وApp Store وiBooks Store
                                                
                                                ملحق لأحكام وشروط APP STORE
                                                
                                                تنظم الاتفاقية القانونية المبينة فيما يلي أدناه شراءكم للمحتوى بالجملة لاستخدامه فيما يتعلق ببرنامج الشراء بالكميات. وعليه فإنه للموافقة على تلك الشروط، يمكنكم النقر فقط على كلمة "موافق". أما في حال عدم موافقتكم على تلك الشروط، فلا داعي للنقر على كلمة "موافق"، ولا أن تستخدموا برنامج الشراء بالكميات.
                                                
                                                1- شروط بيع برنامج الشراء بالكميات
                                                
                                                تعتبر Apple Distribution International Ltd
                                                
                                                بطاقة APPLE التعريفية الخاصة ببرنامج الشراء بالكميات
                                                
                                                توافقون بموجبه على أنكم سوف تستخدمون بطاقة APPLE التعريفية الخاصة ببرنامج الشراء بالكميات (يشار إليها فيما يلي بعبارة " بطاقة VPP Apple ID") أو مُعرفات MAID التي تم منحها امتيازات مناسبة بغرض شراء محتوى الكميات من خدمة برنامج الشراء بالكميات. كما إنكم توافقون على تقديم المعلومات الدقيقة والصحيحة لإعداد بطاقة VPP Apple ID أو مُعرفات MAID، مثل اسم الشركة والعنوان الفعلي ورقم D-U-N-S وبيانات الدفع الخاصة بالشركة أو المعلومات الأخرى بحسب ما يتم طلبها. ولمزيد من المعلومات حول عملية التسجيل والإدراج، يمكنكم زيارة الرابط التالي (https://www.apple.com/ae/business/vpp/) أو الرابط التالي (https://www.apple.com/ae/education/volume-purchase-program/) حسبما ما يكون معمولاً به.
                                                
                                                سوف يتم استخدام VPP Apple ID الخاصة بك (والمختلفة عن كلمة المرور الخاصة بكم، التي يجب عليكم عدم الإفصاح عنها لأي شخص آخر) من قبل مقدمي المحتوى للتحقق من حسابكم بهدف تخصيص توزيع المحتوى من خلال الخدمة. ولمزيد من المعلومات حول هذا الأمر يمكنكم زيارة الرابط التالي: (https://www.apple.com/ae/business/vpp/).
                                                
                                                للبيع في الامارات العربية المتحدة فقط
                                                
                                                تكون خدمة برنامج الشراء بالكميات متاحة لكم فقط في الإمارات العربية المتحدة فقط، ويمكن استرداد iBooks Store ومحتوى الكمية فقط من قبل مستخدميكم النهائيين في الإمارات العربية المتحدة. يمكن استرداد رموز محتوى كميات App Store فقط من قبل مستخدميكم النهائيين المعتمدين في الإمارات العربية المتحدة، ولكن يمكن تعيين محتوى كمية App Store عبر نظام التوزيع المدار إلى المستخدمين النهائيين المعتمدين لديك في أي دولة يتوفر فيها محتوى الكمية تجاريًا وهذا الأمر عرضة للتغيير في أي وقت. يكون استخدامك لخدمة برنامج الشراء بالكميات لمحتوى التطبيق في App Store فقط في الإمارات العربية المتحدة وأي تنزيلات أو تعيينات لاحقة لا تمثل أي اتفاق مستقل ولا معاملات مبيعات بينك وبين أي كيان iTunes آخر. أنت توافق على عدم استخدام خدمة برنامج الشراء بالكميات للتحايل على قوانين أي دولة أو القيود التي نص عليها موفرو محتوى الكمية.</p>
                                        </div>
                                        <div class="checked-btns">
                                            <a href="index.html" class="btn bg-white text-secondary-color border-secondary-color px-5 rounded-10 mb-4">الغاء</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-12 ">
                                <button type="submit" class="btn bg-secondary-color text-white w-100 rounded-10">
                                    دفع
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- ./Pay Now Form -->
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
                        <p class="text-dark"><span class="font-weight-bold">تاريخ بداية الكورس : </span> {{$course_details['started_date']}}</p>
                        @if (isset($course_details['airport']['name_ar']))
                        <p class="text-dark"><span class="font-weight-bold">الاستقبال : </span> {{$course_details['airport']['name_ar']}} - {{$course_details['airport']['price']}} ريال سعودي</p>
                        @endif @if ( isset($course_details['residence']['name_ar']))
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
