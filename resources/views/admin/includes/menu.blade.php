<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
            <a class="navbar-brand" href="index.html">
                <h3 class="brand-text"><img width="200" src="{{asset('website')}}/imgs/logo.png" alt="" srcset=""></h3>
            </a>
            </li>
            <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
            </li>
        </ul>
        </div>
        <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav ml-auto float-right">
                <li class="dropdown dropdown-user nav-item">
                    <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                        <span class="mr-1">مرحبا,
                            <span class="user-name text-bold-700">{{auth()->user()->name}}</span>
                        </span>
                        <span class="avatar avatar-online">
                            <img src="{{url('/admin')}}/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</nav>