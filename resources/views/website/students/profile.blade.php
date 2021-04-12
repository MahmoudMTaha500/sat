@extends('website.app')

@section('website.content')


<!-- Profile -->
<section class="profile py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <div class="row  px-xl-5 mb-4">
            <!-- Section Heading -->
            <div class="col-12 d-lg-block d-none">
                <h3 class="text-main-color font-weight-bold">الملف الشخصي</h3>
            </div>
            <!-- ./Section Heading -->
        </div>
        <div class="row px-xl-5">
            <!-- Side Nav -->
            <div class="col-lg-3 mb-4 d-lg-block d-none">
                <div class="bg-white rounded-10 py-4 shadow-sm">
                    <div class="profile-img pt-4 text-center position-relative mx-auto">
                        <input type="file" class="d-none upload">
                        <div class="overlay text-center text-white position-absolute"><i class="far fa-image"></i></div>
                        <img src="imgs/users/user2.png" alt="" class="img-fluid rounded-circle img-uploaded">
                        <h6 class="text-main-color font-weight-bold mt-2">احمد مجدي</h6>
                    </div>
                    <ul class="list-group list-group-flush p-0 border-0">
                        <li class="list-group-item py-3  border-bottom active"><a href="profile.html"  class="text-dark">البيانات الشخصية</a></li>
                        <li class="list-group-item py-3 border-bottom"><a href="favourite.html" class="text-dark">المفضلة</a></li>
                        <li class="list-group-item py-3 border-bottom"><a href="reservation.html" class="text-dark">الحجوزات</a></li>
                        <li class="list-group-item py-3"><a href="notification.html" class="text-dark">الاشعارات</a></li>
                      </ul>
                </div>
            </div>
            <!-- ./Side Nav -->
            <div class="col-lg-9 ">
                <!-- Section Heading -->
                <h5 class="text-main-color font-weight-bold mb-4">البيانات الشخصية</h5>
                <!-- ./Section Heading -->
                <div class="bg-white shadow-sm p-xl-5 px-3 py-5 rounded-10">
                    <form action="" >
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-10" value="احمد مجدي">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-10" value="Ahmedmagdy@gmail.com">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-10" value="95515561155">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-10" value="الرياض, السعودية">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                                <div class="oveflow-hidden">
    
                                    <button type="submit" class="btn rounded-10 bg-secondary-color text-center text-white float-left px-5">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         
    </div>
</section>
<!-- ./Profile -->


@endsection




