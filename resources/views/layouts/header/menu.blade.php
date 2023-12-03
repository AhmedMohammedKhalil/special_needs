<!-- Mobile Header -->
<div class="sticky">
    <div class="horizontal-header clearfix ">
        <div class="container">
            <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
            <span class="smllogo"><img style="height: 80px" src="{{asset('assets/images/brand/logo.png')}}" width="120" alt="img" /></span>
            <span class="smllogo-white"><img style="height: 80px" src="{{asset('assets/images/brand/logo.png')}}" width="120"
                    alt="img" /></span>
        </div>
    </div>
</div>
<!-- /Mobile Header -->

<!--Horizontal-main -->
<div class="horizontal-main header-style1  bg-dark-transparent clearfix p-0" dir="ltr">
    <div class="horizontal-mainwrapper container d-md-flex align-items-center justify-content-between">
        <div class="desktoplogo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo.png')}}" alt="img" style="height: 80px">
                <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img header-white" alt="logo" style="height: 80px">
            </a>
        </div>
        <div class="desktoplogo-1">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo.png')}}" alt="img" style="height: 80px"></a>
        </div>
        <nav class="horizontalMenu d-md-flex">
            <ul class="horizontalMenu-list">
                @unless(Auth('admin')->check() || Auth('student')->check() || Auth('professor')->check())
                <li aria-haspopup="true" class="p-0 mt-1">
                    <span><a class="btn btn-primary" href="{{ route('student.login_register') }}">الطالب<i class="fe fe-user me-1"></i></a></span>
                </li>
                <li aria-haspopup="true" class="p-0 mt-1 ms-3">
                    <span><a class="btn btn-primary" href="{{ route('professor.login') }}">عضو الهيئة التدريسية<i class="fe fe-user me-1"></i></a></span>
                </li>

                @endunless
                <li aria-haspopup="true"><a class="@if(Request::is('home/*') || Request::is('/')) active @endif"
                        href="{{route('home')}}">الصفحة الرئيسية</a>
                </li>
                <li aria-haspopup="true"><a class="@if(Request::is('colleges/*') || Request::is('colleges')) active @endif"
                    href="{{ route('colleges') }}">الكليات</a>
                </li>
                <li aria-haspopup="true"><a class="@if(Request::is('aboutus/*') || Request::is('aboutus')) active @endif"
                    href="{{ route('aboutus') }}">من نحن</a>
                </li>
                <li aria-haspopup="true"><a class="@if(Request::is('search/*') || Request::is('search')) active @endif"
                        href="{{ route('search') }}">بحث</a>
                </li>

            </ul>
        </nav>
    </div>
</div>
