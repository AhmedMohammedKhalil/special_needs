@extends('students.layout')
@push('css')
<style>

    .tabs-menu1 ul li a {
        background-color: #d1d0d3;
    }
    .wideget-user-tab .tab-menu-heading .nav li a.active{
        color:white;
        border-radius:7px;
    }
    .usertab-list li {
        width: 100%
    }

    .wizard .btn{
        width: 100px;
        padding: 10px
    }

    .wizard .btn-success:hover {
        background-color: #054e0d
    }

    .wizard .btn-danger:hover {
        background-color: #4e0505
    }
</style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">الصفحة الشخصية</h1>
</div>
@endpush

@section('page')
<div class="">
    <div class="ps-0 pb-5">
        <div class="wideget-user-tab">
            <div class="tab-menu-heading">
                <div class="tabs-menu1">
                    <ul class="nav text-white">
                        <li class="ms-0"><a href="#tab-5" class="@if($tab == 'profile')active @endif ms-0" data-bs-toggle="tab">المعلومات الشخصية</a></li>
                        <li class="ms-0"><a href="#tab-6" class="ms-0 @if($tab == 'assistant')active @endif " data-bs-toggle="tab">بيانات المساعد الشخصى</a></li>
                        <li><a href="#tab-7" data-bs-toggle="tab" class="@if($tab== 'requests')active @endif">جميع طلبات التحاقك بالكليات</a></li>
                        <li><a href="#tab-8" data-bs-toggle="tab" class="@if($tab == 'interviews')active @endif">جميع المقابلات</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="border-0">
    <div class="tab-content">
        <div class="tab-pane @if($tab== 'profile')active @endif" id="tab-5">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="profile-log-switch">
                        <div class="media-heading">
                            <h3 class="card-title mb-3 font-weight-bold">المعلومات الشخصية</h3>
                        </div>
                        <ul class="usertab-list">
                            <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->name}}</span></li>
                            <li><span class="font-weight-bold text-default-dark float-start">الإيميل :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->email}}</span></li>
                            <li><span class="font-weight-bold text-default-dark float-start">الموبايل :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->phone}}</span></li>
                            <li><span class="font-weight-bold text-default-dark float-start">الجنس :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->gender}}</span></li>
                                    <li><span class="font-weight-bold text-default-dark float-start">نوع الإعاقة :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->disability_type}}</span></li>
                            <li><span class="font-weight-bold text-default-dark float-start">الحالة المرضية :
                            </span><p class="d-inline-block mx-2">{{ nl2br(auth('student')->user()->status) }}</p></li>
                            <li><span class="font-weight-bold text-default-dark float-start">العنوان :
                                    </span><p class="d-inline-block mx-2">{{ nl2br(auth('student')->user()->address) }}</p></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane @if($tab == 'assistant')active @endif" id="tab-6">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="profile-log-switch">
                        <div class="media-heading">
                            <h3 class="card-title mb-3 font-weight-bold">بيانات المساعد الشخصى</h3>
                        </div>
                        @if(auth('student')->user()->assistant)
                        <ul class="usertab-list">
                            <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->assistant->name}}</span></li>

                            <li><span class="font-weight-bold text-default-dark float-start">الموبايل :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->assistant->phone}}</span></li>
                            <li><span class="font-weight-bold text-default-dark float-start">الجنس :
                                    </span> <span class="user-1 ms-2"> {{auth('student')->user()->assistant->gender}}</span></li>
                            </ul>
                            <ul class="pager wizard my-4 d-flex justify-content-center border-0">

                                <li class="mx-4"><a href="{{ route('student.assistant.edit',['id' => auth('student')->user()->assistant->id]) }}" class="btn btn-success mb-0">تعديل</a></li>
                                <li class="mx-4">
                                    <form action="{{ route('student.assistant.delete',['id' => auth('student')->user()->assistant->id]) }}" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger  mb-0" type="submit">حذف</button>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <ul class="usertab-list my-4 d-flex justify-content-center border-0">
                                <li class="mx-4"><a href="{{ route('student.assistant.create') }}" class="btn btn-primary mb-0">اضافة مساعد</a></li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane userprof-tab @if($tab== 'requests')active @endif" id="tab-7">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title pt-3 pb-3">جميع طلبات التحاقك بالكليات</h3>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="">
                                    <table id="example" class="overflow-hidden table text-nowrap table-bordered br-7 border-top mb-0">
                                        <thead>
                                            <th>#</th>
                                            <th>الكلية</th>
                                            <th>حالة الطلب</th>
                                            <th>التاريخ والوقت</th>
                                            <th>الإعدادات</th>
                                        </thead>
                                        <tbody>
                                            @foreach (auth('student')->user()->colleges as $college)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $college->name }}</td>
                                                <td>
                                                    <span class="btn
                                                    @if($college->pivot->acceptable == 'تمت الموافقة') btn-success @elseif($college->pivot->acceptable == 'تم الرفض') btn-danger @else btn-warning @endif
                                                    btn-sm">
                                                    {{ $college->pivot->acceptable ?? 'انتظار' }}
                                                    </span>
                                                </td>
                                                <td>{{ $college->pivot->created_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('student.request.show',['id' => $college->pivot->id]) }}" class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="عرض"><i class="fe fe-eye"></i></a>
                                                    @if($college->pivot->acceptable == "" || $college->pivot->acceptable == "انتظار")
                                                    <a href="{{ route('student.request.edit',['id' => $college->pivot->id]) }}" class="btn btn-outline-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit"></i></a>
                                                    <form action="{{ route('student.request.delete',['id' => $college->pivot->id]) }}" method="post" class="d-inline-block">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="حذف" type="submit"><i class="fe fe-trash"></i></button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane userprof-tab @if($tab== 'interviews')active @endif" id="tab-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title pt-3 pb-3">جميع المقابلات</h3>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="">
                                    <table id="example" class="overflow-hidden table text-nowrap table-bordered br-7 border-top mb-0">
                                        <thead>
                                            <th>#</th>
                                            <th>الكلية</th>
                                            <th>عضو هيئة التدريس</th>
                                            <th>حالة المقابلة</th>
                                            <th>التاريخ والوقت</th>
                                            <th>الإعدادات</th>
                                        </thead>
                                        <tbody>
                                            @foreach (auth('student')->user()->professors as $professor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $professor->college->name }}</td>
                                                <td>{{ $professor->name }}</td>
                                                <td>
                                                    <span class="btn
                                                    @if($professor->pivot->status == 'تمت الموافقة') btn-success @elseif($professor->pivot->status == 'تم الرفض') btn-danger @else btn-warning @endif
                                                    btn-sm">
                                                    {{ $professor->pivot->status ?? 'انتظار' }}
                                                    </span>
                                                </td>
                                                <td>{{ $professor->pivot->date }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('student.interview.show',['id' => $professor->pivot->id]) }}" class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="عرض"><i class="fe fe-eye"></i></a>
                                                    @if($professor->pivot->status == "" || $professor->pivot->status == "انتظار")
                                                    <a href="{{ route('student.interview.accept',['id' => $professor->pivot->id]) }}" class="btn btn-outline-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="موافقة"><i class="fe fe-check"></i></a>
                                                    <a href="{{ route('student.interview.reject',['id' => $professor->pivot->id]) }}" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="رفض"><i class="fe fe-x"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
