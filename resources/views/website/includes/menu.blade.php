<ul class="navbar-nav ml-auto">
    <li class="nav-item px-xl-2 active">
      <a class="nav-link text-main-color" alt="الرئيسية" href="{{route('website.home')}}">الرئيسية <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="المعاهد" href="{{route('website.institutes')}}">المعاهد</a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="طلب تأشيرة" href="#">طلب تأشيرة</a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="العروض" href="#">العروض</a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="المقالات" href="#">المقالات</a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="تواصل معنا" href="#">تواصل معنا</a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="من نحن" href="#">من نحن</a>
    </li>
    <li class="nav-item px-xl-2 px-0">
      <a class="nav-link text-main-color" alt="من نحن" href="{{route('student.login')}}">تسجيل الدخول</a>
    </li>
    <li class="nav-item px-xl-2 social-links">
      <a class="nav-link d-inline-block bg-main-color text-center ml-2" href="#"><span class="text-white"><i class="fab fa-facebook-f"></i></span></a>
      <a class="nav-link d-inline-block bg-main-color text-center ml-2" href="#"><span class="text-white"><i class="fab fa-twitter"></i></span></a>
      <a class="nav-link d-inline-block bg-main-color text-center ml-2" href="#"><span class="text-white"><i class="fab fa-instagram"></i></span></a>
    </li>

    @if(Auth::guard('student')->check())
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::guard('student')->user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @else
      <li class="nav-item">
        <a class="nav-link text-main-color" alt="من نحن" href="{{route('student.login')}}">تسجيل الدخول</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('student.register') }}">انشاء حساب جديد</a>
      </li>
    @endif


   
  </ul>

  <ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>