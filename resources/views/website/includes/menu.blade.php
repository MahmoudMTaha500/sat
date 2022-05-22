
<header>
    <div class="container-fluid">
        <div class="row px-lg-0 px-xl-5">
            <div class="col-12 p-0">
                <!-- NavBar -->
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-0">
                    <a class="navbar-brand mb-3" href="{{route('website.home')}}"><img src="{{asset('website')}}/imgs/logo.png" alt="Classat Logo" class="img-fluid" /></a>

                    <div class="mobile-header-bottom">
                        <button class="navbar-toggler" type="button"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        @if(Auth::guard('student')->check())
                            <!-- User Logged In Mobile Screen -->
                            <div class="loged position-relative mt-1 d-lg-none d-block">
                                {{-- <a class="text-main-color text-decoration-none notification align-middle" href="notification-full.html">
                                    <i class="text-main-color fas fa-bell"></i> <span class="badge badge-primary badge-pill rounded-circle bg-secondary-color text-center font-weight-bold p-0 position-absolute">14</span>
                                </a> --}}
                                <div class="dropdown open-sidemenu d-inline-block">
                                    <a class="btn bg-transparent" href="" onclick="return false;">
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
                                                <li class="list-group-item py-3 border-bottom text-center"><a href="{{route('student.favourite')}}" class="text-dark">المفضلة</a></li>
                                                <li class="list-group-item py-3 border-bottom text-center"><a href="{{route('student.reservation')}}" class="text-dark">الحجوزات</a></li>
                                                <li class="list-group-item py-3 text-center border-bottom"><a href="{{route('student.success.story')}}" class="text-dark">تجربتك مع كلاسات</a></li>
                                                <li class="list-group-item py-3 text-center"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-dark">تسجيل الخروج</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./User Logged In Mobile Screen -->
                        @endif
                        <a href="{{route('website.institutes')}}" class="btn rounded-10 bg-secondary-color text-white d-lg-none d-block">المعاهد</a>


                        <!-- Login & Register In Mobile Screen -->
                        <div class="contact d-lg-none d-block">
                            <a href="tel:966555484931" target="_blank"  class="btn rounded-circle text-muted border text-center p-0 position-relative"><i class="fas fa-phone-volume"></i></a>
                            <a href="https://wa.me/+966555484931" target="_blank" class="btn rounded-circle text-success border text-center p-0 mr-3 position-relative"><i class="fab fa-whatsapp"></i></a>
                        </div>
                        <!-- ./Login & Register In Mobile Screen -->
                    </div>

                    

                    <!-- Nav Menu  -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'home' ? 'active' : '') : ''}}">
                                <a class="nav-link text-main-color" alt="الرئيسية" href="{{route('website.home')}}">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'institutes' ? 'active' : '') : ''}}">
                                <a class="nav-link text-main-color" alt="المعاهد" href="{{route('website.institutes')}}">المعاهد</a>
                            </li>
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'visa' ? 'active' : '') : ''}}" >
                                <a class="nav-link text-main-color" alt="طلب تأشيرة" href="{{route('order-visa.create')}}">طلب تأشيرة</a>
                            </li>
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'offers' ? 'active' : '') : ''}}">
                                <a class="nav-link text-main-color" alt="العروض" href="{{route('website.offers')}}">العروض</a>
                            </li>
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'articles' ? 'active' : '') : ''}}">
                                <a class="nav-link text-main-color" alt="المقالات" href="{{route('website.articles')}}">المقالات</a>
                            </li>
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'contact-us' ? 'active' : '') : ''}}">
                                <a class="nav-link text-main-color" alt="تواصل معنا" href="{{route('website.contact.us')}}">تواصل معنا</a>
                            </li>
                            <li class="nav-item px-xl-2 {{isset($page_identity) ? ($page_identity['page_name'] == 'about-us' ? 'active' : '') : ''}}">
                                <a class="nav-link text-main-color" alt="من نحن" href="{{route('website.about.us')}}">من نحن</a>
                            </li>
                            
                          
                            <li class="nav-item px-xl-2 social-links d-xl-block d-none">
                                <a class="bg-main-color d-inline-block text-center ml-3" target="_blank" href="https://www.snapchat.com/add/classat">
                                    <span class="text-white font-weight-bold"><i class="fab fa-snapchat-ghost"></i></span>
                                </a>
                                <a class="bg-main-color d-inline-block text-center ml-3" target="_blank" href="https://twitter.com/clas_sat">
                                    <span class="text-white font-weight-bold"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a class="bg-main-color d-inline-block text-center ml-3" target="_blank" href="https://www.instagram.com/class_at/">
                                    <span class="text-white font-weight-bold"><i class="fab fa-instagram"></i></span>
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
                                <a href="{{route('student.login')}}" class="btn rounded-10 text-secondary-color border-secondary-color">تسجيل الدخول</a>
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
