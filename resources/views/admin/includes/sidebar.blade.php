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
                <a href="{{route('website.home')}}">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.animation.main">الموقع</span>
                </a>
            </li>
           

            @if(auth()->user()->hasPermission('institutes-read'))
            <li class="nav-item {{ $department_name == 'institutes' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main"> المعاهد</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ $page_name == 'institute' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('institute.index')}}" data-i18n="nav.navbars.nav_light"> المعاهد</a>
                    </li>
                    @if(auth()->user()->hasPermission('institutes-create'))
                    <li class="{{ $page_name == 'add-institute' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('institute.create')}}" data-i18n="nav.navbars.nav_dark">اضافة معهد جديد</a>
                    </li>
                    @endif
                    <li   class="{{ $page_name == 'comment' ? 'active' : ''}}">
                        <a    class="menu-item" href="{{route('comment.index')}}" data-i18n="nav.navbars.nav_dark">التعليقات</a>
                    </li>
                    <li   class="{{ $page_name == 'rate' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('rate.index')}}" data-i18n="nav.navbars.nav_dark">التقيمات</a>
                    </li>
                    @if(auth()->user()->hasPermission('institutes-delete'))

                    <li  class="{{ $page_name == 'archive' ? 'active' : ''}}">
                        <a class="menu-item"  href="{{url('/dashboard/institute/archive')}}" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif  

            @if(auth()->user()->hasPermission('courses-read'))

            <li class="nav-item {{ $department_name == 'courses' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main"> الدورات</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ $page_name == 'courses' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('courses.index')}}" data-i18n="nav.navbars.nav_light">الدورات</a>
                    </li>
            @if(auth()->user()->hasPermission('courses-create'))

                    <li class="{{ $page_name == 'add-course' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('courses.create')}}" data-i18n="nav.navbars.nav_dark">اضافة دورة جديدة</a>
                    </li>
                    @endif
            @if(auth()->user()->hasPermission('courses-delete'))

                    <li class="{{ $page_name == 'archive_course' ? 'active' : ''}}">
                        <a class="menu-item" href="{{url('dashboard/courses/archive')}}" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <li class="nav-item {{ $department_name == 'country' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main"> الدول والمدن</span>
                </a>
                <ul class="menu-content">

                    <li>
                        <a class="menu-item" href="{{route('countries.index')}}" data-i18n="nav.navbars.nav_light">كل الدول</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{route('countries.create')}}" data-i18n="nav.navbars.nav_dark">اضافة دوله جديدة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('cities.index')}}" data-i18n="nav.navbars.nav_semi">كل المدن</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{route('cities.create')}}" data-i18n="nav.navbars.nav_semi">اضافة مدينه جديده </a>
                    </li>
                </ul>
            </li>

            @if(auth()->user()->hasPermission('articals-read'))

            <li class="nav-item {{ $department_name == 'blogs' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">المقالات</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ $page_name == 'blogs' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('blogs.index')}}" data-i18n="nav.navbars.nav_light">كل المقالات</a>
                    </li>
            @if(auth()->user()->hasPermission('articals-create'))
                    
                    <li class="{{ $page_name == 'add-blog' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('blogs.create')}}" data-i18n="nav.navbars.nav_dark">اضافة مقالة جديدة</a>
                    </li>
                    @endif
                    <li   class="{{ $page_name == 'blog-comment' ? 'active' : ''}}">
                        <a class="menu-item"  href="{{url('dashboard/blogs/comment')}}" data-i18n="nav.navbars.nav_dark">التعليقات</a>
                    </li>
                    <li class="{{ $page_name == 'blog-categories' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('blog_categories.index')}}" data-i18n="nav.navbars.nav_dark">التصنيفات</a>
                    </li>
            @if(auth()->user()->hasPermission('articals-create'))

                    <li class="{{ $page_name == 'edit-blog-category' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('blog_categories.create')}}" data-i18n="nav.navbars.nav_dark">اضافة تصنيف جديد</a>
                    </li>
                    @endif
                    @if(auth()->user()->hasPermission('articals-delete'))
                    <li   class="{{ $page_name == 'archive-blog' ? 'active' : ''}}">
                        <a class="menu-item" href="{{url('dashboard/blogs/archive')}}"data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                    @endif

                </ul>
            </li>
            @endif
            @if(auth()->user()->hasPermission('services-read'))
         
            <li class="nav-item   {{ $department_name == 'services' ? 'open' : '' }} "   >
                <a href="#"><i class="la la-institution"></i><span class="menu-title" data-i18n="nav.navbars.main"> الخدمات</span></a>
                <ul class="menu-content">
                <li  class="{{ $page_name == 'residences' ? 'active' : ''}}">

                <a class="menu-item" href="{{route('residences.index')}}" data-i18n="nav.navbars.nav_light"> السكن</a>
                </li>

                <li  class="{{ $page_name == 'insurances' ? 'active' : ''}}">
                <a class="menu-item" href="{{route('insurances.index')}}" data-i18n="nav.navbars.nav_light"> التامينات</a>
                </li>
                <li>
                <a class="menu-item"  href="{{route('airports.index')}}" data-i18n="nav.navbars.nav_light"> المطارات</a>
                </li>

                </ul>
            </li>
            @endif
            @if(auth()->user()->hasPermission('visas-read'))
                <li class="nav-item">
                    <a href="{{route('simple-visa.index')}}">
                        <i class="la la-institution"></i>
                        <span class="menu-title" data-i18n="nav.animation.main">التاشيرات</span>
                    </a>
                </li>
            @endif
            
            @if(auth()->user()->hasPermission('students-read'))

            <li class="nav-item {{ $department_name == 'students' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main"> الطلاب</span>
                </a>
                <ul class="menu-content">
                    <li   class="{{ $page_name == 'students' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('students.index')}}" data-i18n="nav.navbars.nav_light">كل الطلاب</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/students/create.php?page=students" data-i18n="nav.navbars.nav_dark">اضافة طالب جديد</a>
                    </li>
                    <li     class="{{ $page_name == 'success-story' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('success-story.index')}}"  data-i18n="nav.navbars.nav_dark">قصص النجاح</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/students/archives.php?page=students" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>
            @endif
            @if(auth()->user()->hasRole('super-admin') ||  auth()->user()->hasRole('admin'))
            <li class="nav-item {{ $department_name == 'employees' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main"> الموظفين</span>
                </a>
                <ul class="menu-content">
                    <li   class="{{ $page_name== 'employees' ? 'active' : "" }}">
                        <a class="menu-item" href="{{route('employees.index')}}" data-i18n="nav.navbars.nav_dark">كل الموظفين</a>
                    </li>
                    <li   class="{{ $page_name=='add-employees' ? 'active' : "" }}"   >
                        <a class="menu-item" href="{{route('employees.create')}}" data-i18n="nav.navbars.nav_light">اضافة موظف</a>
                    </li>
                </ul>
            </li>

            @endif

            @if(auth()->user()->hasPermission('student-requests-read'))

            <li class="nav-item {{ $department_name == 'student-request' ? 'open' : '' }}">
                <a href="#">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main"> الطلابات</span>
                </a>
                <ul class="menu-content">
                    <li  class="{{ $page_name == 'student-request' ? 'active' : ''}}">
                        <a class="menu-item"  href="{{route('student-requests.index')}}" data-i18n="nav.navbars.nav_light">الطلابات</a>
                    </li>
                    <li>
                        <a class="menu-item" href="/sat/student-requests?page=student_requests" data-i18n="nav.navbars.nav_semi">الارشيف</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(auth()->user()->hasPermission('visas-read'))
            @endif
            @if(auth()->user()->hasRole('super-admin') ||  auth()->user()->hasRole('admin'))
                <li class="nav-item {{ $department_name == 'website-setting' ? 'open' : '' }}">
                    <a href="#">
                        <i class="la la-institution"></i>
                        <span class="menu-title" data-i18n="nav.navbars.main"> اعدادات الموقع</span>
                    </a>
                    <ul class="menu-content">
                        <li   class="{{ $page_name== 'refund-policy' ? 'active' : "" }}">
                            <a class="menu-item" href="{{route('exchange-rate.index')}}" data-i18n="nav.navbars.nav_dark">اسعار صرف العملات</a>
                        </li>
                        <li   class="{{ $page_name== 'refund-policy' ? 'active' : "" }}">
                            <a class="menu-item" href="{{route('website_settings.refund_policy')}}" data-i18n="nav.navbars.nav_dark">سياسة الاسترداد</a>
                        </li>
                        <li   class="{{ $page_name=='terms-conditions' ? 'active' : "" }}"   >
                            <a class="menu-item" href="{{route('website_settings.terms_conditions')}}" data-i18n="nav.navbars.nav_light">الشروط و الاحكام</a>
                        </li>
                    </ul>
                </li>

            @endif
            <li class="nav-item">
                <a href="{{url('dashboard/logout')}}">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.animation.main">تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </div>
</div>
