<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ $page_name == 'dashboard' ? 'active' : ''}}">
                <a href="{{route('dashboard')}}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.changelog.main">لوحة التحكم</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="animation.html">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.animation.main">الموقع</span>
                </a>
            </li>
            <li class="nav-item {{ $department_name == 'institutes' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم المعاهد</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ $page_name == 'institute' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('institute.index')}}" data-i18n="nav.navbars.nav_light"> المعاهد</a>
                    </li>
                    <li class="{{ $page_name == 'add-institute' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('institute.create')}}" data-i18n="nav.navbars.nav_dark">اضافة معهد جديد</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/institutes/comments.php?page=institutes" data-i18n="nav.navbars.nav_dark">التعليقات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/institutes/rating.php?page=institutes" data-i18n="nav.navbars.nav_dark">التقيمات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/institutes/archives.php?page=institutes" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ $department_name == 'courses' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم الدورات</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ $page_name == 'courses' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('courses.index')}}" data-i18n="nav.navbars.nav_light">الدورات</a>
                    </li>
                    <li class="{{ $page_name == 'add-course' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('courses.create')}}" data-i18n="nav.navbars.nav_dark">اضافة دورة جديدة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/courses/archives.php?page=courses" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#"><i class="la la-institution"></i><span class="menu-title" data-i18n="nav.navbars.main">قسم العروض</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="navbar-light.html" data-i18n="nav.navbars.nav_light">كل العروض</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-dark.html" data-i18n="nav.navbars.nav_dark">اضافة عرض جديد</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم الفواتير</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="navbar-light.html" data-i18n="nav.navbars.nav_light">كل الفواتير</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-dark.html" data-i18n="nav.navbars.nav_dark">انشاء فاتورة جديدة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $department_name == 'country' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم الدول والمدن</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('countries.index')}}" data-i18n="nav.navbars.nav_light">كل الدول</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('countries.create')}}" data-i18n="nav.navbars.nav_dark">انشاء دوله جديدة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('cities.index')}}" data-i18n="nav.navbars.nav_semi">كل المدن</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('cities.create')}}" data-i18n="nav.navbars.nav_semi">اضافة مدينه جديده </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $department_name == 'blogs' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">المقلات</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="/sat/blogs/?page=blogs" data-i18n="nav.navbars.nav_light">كل المقلات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/blogs/create.php?page=blogs" data-i18n="nav.navbars.nav_dark">اضافة مقالة جديدة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/blogs/comments.php?page=blogs" data-i18n="nav.navbars.nav_dark">التعليقات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/blog-categories/?page=blogs" data-i18n="nav.navbars.nav_dark">التصنيفات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/blog-categories/create.php?page=blogs" data-i18n="nav.navbars.nav_dark">اضافة تصنيف جديد</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/blogs/archives.php?page=blogs" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $department_name == 'students' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم الطلاب</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="/sat/students?page=students" data-i18n="nav.navbars.nav_light">كل الطلاب</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/students/create.php?page=students" data-i18n="nav.navbars.nav_dark">اضافة طالب جديد</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/students/success_stories.php?page=students" data-i18n="nav.navbars.nav_dark">قصص النجاح</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/students/archives.php?page=students" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $department_name == 'employees' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم الموظفين</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="/sat/employees/index.php?page=employees" data-i18n="nav.navbars.nav_dark">كل الموظفين</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/employees/create.php?page=employees" data-i18n="nav.navbars.nav_light">اضافة موظف</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $department_name == 'student_requests' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم الطلابات</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="/sat/student-requests?page=student_requests" data-i18n="nav.navbars.nav_light">كل الطلابات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/student-requests?page=student_requests" data-i18n="nav.navbars.nav_dark">الطلبات المقبولة </a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/student-requests?page=student_requests" data-i18n="nav.navbars.nav_semi">الطلابات المعلقة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/student-requests?page=student_requests" data-i18n="nav.navbars.nav_semi">الطلابات المرفوضة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/student-requests?page=student_requests" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $department_name == 'visa' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم التاشيرات</span>
                </a>
                <ul class="menu-content">

                    <li class="{{ $page_name == 'visa' ? 'active' : ''}}" >
                        <a class="menu-item" href="{{route('visas.index')}}" data-i18n="nav.navbars.nav_light"> التاشيرات</a>
                    </li>
                    <li class="{{ $page_name == 'add-visa' ? 'active' : ''}}" >
                        <a class="menu-item" href="{{route('visas.create')}}" data-i18n="nav.navbars.nav_dark">اضافة تاشيرة جديدة </a>
                    </li>
                    <li class="{{ $page_name == 'visa-categories' ? 'active' : ''}}" >
                        <a class="menu-item" href="{{route('visa_categories.index')}}" data-i18n="nav.navbars.nav_semi">تصنيفات التاشيرات</a>
                    </li>
                    <li class="{{ $page_name == 'create-visa-category' ? 'active' : ''}}" >
                        <a class="menu-item" href="{{route('visa_categories.create')}}" data-i18n="nav.navbars.nav_semi">اضافةتصنيف جديد</a>
                    </li>
                    <li class="{{ $page_name == 'visa-archive' ? 'active' : ''}}" >
                        <a class="menu-item" href="{{route('visas.index')}}" data-i18n="nav.navbars.nav_semi">ارشيف التاشيرات</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item {{ $department_name == 'visa-requests' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">قسم طلبات التاشيرات</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="/sat/visa/index.php?page=visa" data-i18n="nav.navbars.nav_light">طلبات التاشيرات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/visa/archivesRequests.php?page=visa" data-i18n="nav.navbars.nav_semi">ارشيف الطلابات</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="animation.html">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.animation.main">دردشة مباشرة</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="animation.html">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.animation.main">اعدادات الموقع</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">المحفظة</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">المحفظة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">المحفظة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">المحفظة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">المحفظة</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="animation.html">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.animation.main">تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </div>
</div>
