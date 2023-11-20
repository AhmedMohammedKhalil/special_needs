@extends('professors.layout')
@push('css')
<style>

    .tabs-menu1 ul li a , .navtab-wizard.nav-tabs .nav-link{
        background-color: #d1d0d3;
        border-radius:7px;
    }
    .wideget-user-tab .tab-menu-heading .nav li a.active, .navtab-wizard.nav-tabs .nav-link.active{
        color:white;
        border-radius:7px;
    }
    .usertab-list li {
        width: 100%
    }

    .card-body .btn{
        width: 100px;
        padding: 10px
    }

    .card-body .btn-success:hover {
        background-color: #054e0d
    }

    .card-body .btn-danger:hover {
        background-color: #4e0505
    }
</style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">عرض بيانات المقابلة</h1>
</div>
@endpush

@section('page')
<div class="card mb-xl-0 overflow-hidden">
    <div id="bar" class=" mb-3 br-0 h-1 progress progress-bar-striped shadow-none">
        <div class="bar progress-bar progress-bar-striped progress-bar-animated"></div>
    </div>
    <div class="card-body">
        <div id="rootwizard" class="border overflow-hidden br-7 pt-0 ">
            <ul class="nav nav-tabs navtab-wizard p-5 m-0">
                <li class="nav-item me-1"><a href="#first" data-bs-toggle="tab" class="nav-link font-bold active">بيانات المقابلة</a></li>
                <li class="nav-item me-1"><a href="#second" data-bs-toggle="tab" class="nav-link font-bold">بيانات   الطالب</a></li>
                <li class="nav-item me-1"><a href="#third" data-bs-toggle="tab" class="nav-link font-bold">بيانات الكلية</a></li>
            </ul>
            <div class="tab-content card-body mt-3 mb-0 b-0">
                <div class="tab-pane fade active show" id="first">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="profile-log-switch">
                                <div class="media-heading">
                                    <h3 class="card-title mb-3 font-weight-bold">بيانات المقابلة</h3>
                                </div>
                                <ul class="usertab-list">
                                    <li><span class="font-weight-bold text-default-dark float-start">محتوى المقابلة :
                                    </span><p class="d-inline-block mx-2">{{ nl2br($interview->content) }}</p></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">التاريخ والوقت :
                                            </span> <span class="user-1 ms-2"> {{$interview->date}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">حالة الطلب :
                                            </span> <span class="user-1 ms-2"> {{$interview->status ?? 'انتظار'}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start"> الفيدباك :
                                            </span><p class="d-inline-block mx-2">{{ nl2br($interview->review ?? 'لم يتم الرد بعد') }}</p></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="second">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="profile-log-switch">
                                <div class="media-heading">
                                    <h3 class="card-title mb-3 font-weight-bold">بيانات   الطالب</h3>
                                </div>
                                <ul class="usertab-list">
                                    <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                                            </span> <span class="user-1 ms-2"> {{$interview->student->name}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">الموبايل :
                                            </span> <span class="user-1 ms-2"> {{$interview->student->phone}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">النوع :
                                            </span> <span class="user-1 ms-2"> {{$interview->student->gender}}</span></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="third">
                    <div class="card-body">
                        <div class="profile-log-switch">
                            <div class="media-heading">
                                <h3 class="card-title mb-3 font-weight-bold">بيانات الكلية</h3>
                            </div>
                            <ul class="usertab-list">
                                <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                                        </span> <span class="user-1 ms-2"> {{$interview->professor->college->name}}</span></li>
                                <li><span class="font-weight-bold text-default-dark float-start">المكان :
                                        </span><p class="d-inline-block mx-2">{{ nl2br($interview->professor->college->location) }}</p></li>
                                <li><span class="font-weight-bold text-default-dark float-start">التفاصيل :
                                        </span><p class="d-inline-block mx-2">{{ nl2br($interview->professor->college->description) }}</p></li>

                            </ul>
                        </div>

                    </div>
                </div>
                @if($interview->status == "" || $interview->status == "انتظار")
                    <ul class="pager wizard my-4 d-flex justify-content-center border-0">
                        <li class="mx-4"><a href="{{ route('professor.interview.edit',['id' => $interview->id]) }}" class="btn btn-success mb-0">تعديل</a></li>
                            <li class="mx-4"><a href="{{ route('professor.interview.delete',['id' => $interview->id]) }}" class="btn btn-danger mb-0">حذف</a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
