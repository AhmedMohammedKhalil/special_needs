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
    <h1 class="">عرض طلب الإلتحاق بالكلية</h1>
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
                <li class="nav-item me-1"><a href="#first" data-bs-toggle="tab" class="nav-link font-bold active">بيانات الطلب</a></li>
                <li class="nav-item me-1"><a href="#second" data-bs-toggle="tab" class="nav-link font-bold">بيانات الكلية</a></li>
                @if ($request->file != "")
                <li class="nav-item me-1"><a href="#third" data-bs-toggle="tab" class="nav-link font-bold">بيانات الملف</a></li>
                @endif
            </ul>
            <div class="tab-content card-body mt-3 mb-0 b-0">
                <div class="tab-pane fade active show" id="first">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="profile-log-switch">
                                <div class="media-heading">
                                    <h3 class="card-title mb-3 font-weight-bold">بيانات الطلب</h3>
                                </div>
                                <ul class="usertab-list">
                                    <li><span class="font-weight-bold text-default-dark float-start">محتوى الطلب :
                                    </span><p class="d-inline-block mx-2">{{ nl2br($request->content) }}</p></li>
                                    <li><span class="font-weight-bold text-default-dark float-start"> المتطلبات :
                                    </span><p class="d-inline-block mx-2">{{ nl2br($request->special_needs) }}</p></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">التاريخ والوقت :
                                            </span> <span class="user-1 ms-2"> {{$request->created_at}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">حالة الطلب :
                                            </span> <span class="user-1 ms-2"> {{$request->acceptable ?? 'انتظار'}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start"> الفيدباك :
                                            </span><p class="d-inline-block mx-2">{{ nl2br($request->review ?? 'لم يتم الرد بعد') }}</p></li>

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
                                    <h3 class="card-title mb-3 font-weight-bold">بيانات الكلية</h3>
                                </div>
                                <ul class="usertab-list">
                                    <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                                            </span> <span class="user-1 ms-2"> {{$request->college->name}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">المكان :
                                            </span><p class="d-inline-block mx-2">{{ nl2br($request->college->location) }}</p></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">التفاصيل :
                                            </span><p class="d-inline-block mx-2">{{ nl2br($request->college->description) }}</p></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if($request->file != "")
                <div class="tab-pane fade" id="third">
                    <div class="card-body">
                        <div class="profile-log-switch">
                            <div class="media-heading">
                                <h3 class="card-title mb-3 font-weight-bold">بيانات الملف المرفق بالطلب</h3>
                            </div>
                            <ul class="usertab-list">
                                <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                                        </span> <span class="user-1 ms-2"> {{$request->file}}</span></li>
                                <a target="_blank" href="{{ route('professor.request.showFile',['id' => $request->id]) }}" class="btn btn-success mb-0">عرض</a>
                                <a target="_blank" href="{{ route('professor.request.downloadFile',['id' => $request->id]) }}" class="btn btn-primary mb-0">تحميل</a>

                            </ul>
                        </div>

                    </div>
                </div>
                @endif
                @if($request->acceptable == "" || $request->acceptable == "انتظار")
                    <ul class="pager wizard my-4 d-flex justify-content-center border-0">
                        <li class="mx-4"><a href="{{ route('student.request.edit',['id' => $request->id]) }}" class="btn btn-success mb-0">تعديل</a></li>
                        <li class="mx-4">
                            <form action="{{ route('student.request.delete',['id' => $request->id]) }}" method="post" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger  mb-0" type="submit"><i class="fe fe-x"></i>تم الرفض</i></button>
                            </form>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
