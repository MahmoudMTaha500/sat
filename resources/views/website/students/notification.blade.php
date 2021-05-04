@extends('website.app') @section('website.content')

<!-- Profile -->
<section class="profile py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <div class="row px-xl-5 mb-4">
            <!-- Section Heading -->
            <div class="col-12 d-lg-block d-none">
                <h3 class="text-main-color font-weight-bold">الملف الشخصي</h3>
            </div>
            <!-- ./Section Heading -->
        </div>
        <div class="row px-xl-5">
            <!-- Side Nav -->
            <div class="col-lg-3 mb-4 d-lg-block d-none">
                @include('website.students.student-sidebar')
            </div>
            <!-- ./Side Nav -->
            <div class="col-lg-9 ">
                <!-- Section Heading -->
                <div class="heading overflow-hidden  mb-4">
                    <h5 class="text-main-color font-weight-bold">
                        الاشعارات

                    </h5>
                  

                </div>
                <!-- ./Section Heading -->
                <!-- Notification  -->
                <div class="notification">
                    <ul class="list-group list-group-flush p-0 rounded-10">
                        <li class="list-group-item "> <span>لقد تم تأكيد طلبك و الدفع لدورة اللغة الأنجلييزية </span>  <small class="text-muted mr-4"> منذ 30 دقيقة</small></li>
                        <li class="list-group-item ">لم يتم تأكيد طلبك و الدفع لدورة اللغة الأنجلييزية برجاءالتواصل معنا للدعم <small class="text-muted mr-4"> منذ 30 دقيقة</small></li>
                        <li class="list-group-item ">لقد تم تأكيد طلبك و الدفع لدورة اللغة الأنجلييزية <small class="text-muted mr-4"> منذ 30 دقيقة</small></li>
                        <li class="list-group-item ">لم يتم تأكيد طلبك و الدفع لدورة اللغة الأنجلييزية برجاءالتواصل معنا للدعم <small class="text-muted mr-4"> منذ 30 دقيقة</small></li>
                        <li class="list-group-item ">لقد تم تأكيد طلبك و الدفع لدورة اللغة الأنجلييزية <small class="text-muted mr-4"> منذ 30 دقيقة</small></li>
                        <li class="list-group-item ">لم يتم تأكيد طلبك و الدفع لدورة اللغة الأنجلييزية برجاءالتواصل معنا للدعم <small class="text-muted mr-4"> منذ 30 دقيقة</small></li>
                      </ul>
                    <!-- <div class="card rounded-10 border-0">
                        <div class="card-body">
                            
                            
                        </div>
                    </div> -->
                </div>
                <!-- ./Notification -->

            </div>
        </div>
    </div>
</section>
<!-- ./Profile -->

@endsection
