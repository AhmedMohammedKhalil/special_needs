@push('css')
<style>
    .dropdown-item:hover {
        color: #2384c6 !important;
    }
</style>

@endpush




<div class="top-bar border-white-transparent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-bar-end" style="float: unset">
                    <ul class="custom" style="flex-direction: row-reverse">

                        <li class="dropdown">
                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="dropdown"><i
                                    class="fe fe-home me-1"></i><span>
                                        @auth('student'){{auth('student')->user()->name}}@endauth
                                        @auth('admin'){{auth('admin')->user()->name}} @endauth
                                        @auth('professor'){{auth('professor')->user()->name}} @endauth
                                        <i class="fe fe-chevron-down text-white ms-1"></i>
                                    </span></a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow">
                                {{-- admin or user --}}
                                @auth('admin')
                                <a href="{{route('admin.dashboard')}}" class="dropdown-item">
                                    <i class="dropdown-icon icon icon-user"></i>لوحة التحكم
                                </a>
                                <a class="dropdown-item" href="{{route('admin.logout')}}">
                                    <i class="dropdown-icon icon icon-power"></i>خروج
                                </a>
                                @endauth
                                @auth('student')
                                <a href="{{route('student.profile')}}" class="dropdown-item">
                                    <i class="dropdown-icon icon icon-user"></i>الصفحة الشخصية
                                </a>
                                <a class="dropdown-item" href="{{route('student.logout')}}">
                                    <i class="dropdown-icon icon icon-power"></i>خروج
                                </a>
                                @endauth
                                @auth('professor')
                                <a href="{{route('professor.profile')}}" class="dropdown-item">
                                    <i class="dropdown-icon icon icon-user"></i>الصفحة الشخصية
                                </a>
                                <a class="dropdown-item" href="{{route('professor.logout')}}">
                                    <i class="dropdown-icon icon icon-power"></i>خروج
                                </a>
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

