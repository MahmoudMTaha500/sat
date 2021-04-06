@extends('website.app') @section('website.content')
<!-- payment confirmation -->
<section class="confirm-reservation py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <div class="row px-xl-5 justify-content-md-center">
            <div class="col-lg-5">
                <div class="bg-white text-center p-xl-5 p-3 rounded-10 my-5">
                    <div class="text-center">
                        <div class="cheched-img">
                            <img src="{{asset('website/imgs/checked.png')}}" alt="" class="img-fluid" />
                        </div>
                        <h3 class="text-main-color font-weight-bold">تم دفع المبلغ بنجاح</h3>
                        <div class="cheched-heading">
                            <p>
                                شكرا لوثوقكم بنا,
                                لقد تم استلام طلبكم بنجاح
                                و تم دفع المبلغ بنجاح,
                                , تم ارسال الفاتورة الخاصة بطلبكم علي بريدك الالكتروني
                                يمكنك متابعة طلبك عن طريق حسابك الخاص علي موقعنا,
                                يمكنك تصفح بريدك الالكتروني للحصول علي معلومات تسجيل الدخول لحسابك ,
                            </p>
                            <a target="_blank" href="{{route('student_invoice')}}"  class="btn w-100 bg-secondary-color text-white rounded-10 ml-3 px-3 mb-4">عرض الفاتورة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./payment confirmation -->
@endsection
