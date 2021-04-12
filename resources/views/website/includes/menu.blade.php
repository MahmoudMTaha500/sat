












<header>
    <div class="container-fluid">
        <div class="row px-lg-0 px-xl-5">
            <div class="col-12">
                <!-- NavBar -->
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-0">
                    <a class="navbar-brand mb-3" href="#"><img src="{{asset('website')}}/imgs/logo.png" alt="" class="img-fluid" /></a>

                    <button class="navbar-toggler" type="button"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Login & Register In Mobile Screen -->
                    <div class="contact d-lg-none d-block">
                        <a href="" data-toggle="modal" data-target="#phoneNumbers" class="btn rounded-circle text-muted border text-center p-0 position-relative"><i class="fas fa-phone-volume"></i></a>
                        <a href="" data-toggle="modal" data-target="#Whatsup" class="btn rounded-circle text-success border text-center p-0 mr-3 position-relative"><i class="fab fa-whatsapp"></i></a>
                    </div>
                    <!-- ./Login & Register In Mobile Screen -->

                    @if(Auth::guard('student')->check())
                    <!-- User Logged In Mobile Screen -->
                    <div class="loged position-relative mt-1 d-lg-none d-block">
                        {{-- <a class="text-main-color text-decoration-none notification align-middle" href="notification-full.html">
                            <i class="text-main-color fas fa-bell"></i> <span class="badge badge-primary badge-pill rounded-circle bg-secondary-color text-center font-weight-bold p-0 position-absolute">14</span>
                        </a> --}}
                        <div class="dropdown open-sidemenu d-inline-block">
                            <a class="btn bg-transparent" href="#">
                                <img src="{{auth()->guard('student')->user()->profile_image == null ? asset('storage/default__user_image.jpg') : asset(auth()->guard('student')->user()->profile_image)}}" alt="" class="rounded-circle" />
                            </a>
                            <div class="sidemenu position-fixed">
                                <div class="sidemenu-nav bg-white">
                                    <div class="profile-img py-4 text-center position-relative mx-auto">
                                        <input type="file" class="d-none upload" />
                                        <div class="overlay text-center text-white position-absolute"><i class="far fa-image"></i></div>
                                        <img
                                            src="{{auth()->guard('student')->user()->profile_image == null ? asset('storage/default__user_image.jpg') : asset(auth()->guard('student')->user()->profile_image)}}"
                                            alt=""
                                            class="img-fluid rounded-circle img-uploaded"
                                        />
                                        <h6 class="text-main-color font-weight-bold mt-2">{{auth()->guard('student')->user()->name}}</h6>
                                    </div>
                                    <ul class="list-group list-group-flush p-0 border-0">
                                        <li class="list-group-item py-3 border-bottom text-center"><a href="{{route('student.profile')}}" class="text-dark">البيانات الشخصية</a></li>
                                        <li class="list-group-item py-3 border-bottom text-center"><a href="favourite.html" class="text-dark">المفضلة</a></li>
                                        <li class="list-group-item py-3 border-bottom text-center"><a href="reservation.html" class="text-dark">الحجوزات</a></li>
                                        <li class="list-group-item py-3 text-center border-bottom"><a href="notification.html" class="text-dark">الاشعارات</a></li>
                                        <li class="list-group-item py-3 text-center"><a href="#" class="text-dark">تسجيل الخروج</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./User Logged In Mobile Screen -->

                    @endif

                    <!-- Nav Menu  -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item px-xl-2 active">
                                <a class="nav-link text-main-color" alt="الرئيسية" href="{{route('website.home')}}">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item px-xl-2">
                                <a class="nav-link text-main-color" alt="المعاهد" href="{{route('website.institutes')}}">المعاهد</a>
                            </li>
                            <li class="nav-item px-xl-2">
                                <a class="nav-link text-main-color" alt="طلب تأشيرة" href="order-visa.html">طلب تأشيرة</a>
                            </li>
                            <li class="nav-item px-xl-2">
                                <a class="nav-link text-main-color" alt="العروض" href="offers.html">العروض</a>
                            </li>
                            <li class="nav-item px-xl-2">
                                <a class="nav-link text-main-color" alt="المقالات" href="{{route('website.articles')}}">المقالات</a>
                            </li>
                            <li class="nav-item px-xl-2">
                                <a class="nav-link text-main-color" alt="تواصل معنا" href="contact-us.html">تواصل معنا</a>
                            </li>
                            <li class="nav-item px-xl-2">
                                <a class="nav-link text-main-color" alt="من نحن" href="about-us.html">من نحن</a>
                            </li>
                            <li class="nav-item px-xl-2 social-links d-xl-block d-none">
                                <a class="nav-link d-inline-block bg-main-color text-center ml-2" href="#">
                                    <span class="text-white"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a class="nav-link d-inline-block bg-main-color text-center ml-2" href="#">
                                    <span class="text-white"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a class="nav-link d-inline-block bg-main-color text-center ml-2" href="#">
                                    <span class="text-white"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            {{-- @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                            @endforeach --}} @if(!(Auth::guard('student')->check()))
                            <li class="nav-item d-lg-none d-block">
                                <a href="{{route('student.login')}}" class="btn rounded-10 text-secondary-color border-secondary-color mb-3">تسجيل الدخول</a>
                            </li>
                            <li class="nav-item d-lg-none d-block">
                                <a href="{{route('student.register')}}" class="btn rounded-10 bg-secondary-color text-white">إنشاء حساب جديد</a>
                            </li>
                            @endif
                        </ul>

                        <div class="my-2 my-xl-0">
                            @if(!(Auth::guard('student')->check()))
                            <!-- Login & Register In Large Screen -->
                            <div class="not-logged d-lg-block d-none">
                                <a href="{{route('student.login')}}" class="btn rounded-10 text-secondary-color">تسجيل الدخول</a>
                                <a href="{{route('student.register')}}" class="btn rounded-10 bg-secondary-color text-white">إنشاء حساب جديد</a>
                            </div>
                            <!-- ./Login & Register In Large Screen -->
                            @endif @if(Auth::guard('student')->check())
                            <!-- User Loged in Large Screen-->
                            <div class="loged position-relative mt-1 d-lg-block d-none">
                                {{-- <a class="text-main-color text-decoration-none notification align-middle" href="notification-full.html">
                                    <i class="text-main-color fas fa-bell"></i> <span class="badge badge-primary badge-pill rounded-circle bg-secondary-color text-center font-weight-bold p-0 position-absolute">14</span>
                                </a> --}}
                                <div class="dropdown d-inline-block">
                                    <a class="btn bg-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img
                                            src="{{auth()->guard('student')->user()->profile_image == null ? asset('storage/default__user_image.jpg') : asset(auth()->guard('student')->user()->profile_image)}}"
                                            alt=""
                                            class="rounded-circle"
                                        />
                                        {{auth()->guard('student')->user()->name}}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('student.profile') }}">الصفحة الشخصية</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> تسجيل الخروج </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- ./User Loged in Large Screen-->
                            @endif
                        </div>
                    </div>
                    <!-- ./Nav Menu  -->
                </nav>
                <!-- ./NavBar -->
            </div>
        </div>
    </div>
</header>
