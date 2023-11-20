@extends('professors.layout')
@push('css')
<style>
    .usertab-list li {
        width: 100%
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
                                        </span> <span class="user-1 ms-2"> {{auth('professor')->user()->name}}</span></li>
                                <li><span class="font-weight-bold text-default-dark float-start">الإيميل :
                                        </span> <span class="user-1 ms-2"> {{auth('professor')->user()->email}}</span></li>
                                <li><span class="font-weight-bold text-default-dark float-start">الكلية :
                                        </span> <span class="user-1 ms-2"> {{auth('professor')->user()->college->name}}</span></li>
                                <li><span class="font-weight-bold text-default-dark float-start">الموبايل :
                                        </span> <span class="user-1 ms-2"> {{auth('professor')->user()->phone}}</span></li>
                                <li><span class="font-weight-bold text-default-dark float-start">الجنس :
                                        </span> <span class="user-1 ms-2"> {{auth('professor')->user()->gender}}</span></li>
                            </ul>
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
                                            <th>اسم الطالب</th>
                                            <th>حالة الطلب</th>
                                            <th>التاريخ والوقت</th>
                                            <th>الإعدادات</th>
                                        </thead>
                                        <tbody>
                                            @foreach (auth('professor')->user()->college->students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name}}</td>
                                                <td>
                                                    <span class="btn
                                                    @if($student->pivot->acceptable == 'تمت الموافقة') btn-success @elseif($student->pivot->acceptable == 'تم الرفض') btn-danger @else btn-warning @endif
                                                    btn-sm">
                                                    {{ $student->pivot->acceptable ?? 'انتظار' }}
                                                    </span>
                                                </td>
                                                <td>{{ $student->pivot->created_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('professor.request.show',['id' => $student->pivot->id]) }}" class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="عرض"><i class="fe fe-eye"></i></a>
                                                    @if($student->pivot->acceptable == "" || $student->pivot->acceptable == "انتظار")
                                                    <a href="{{ route('professor.request.accept',['id' => $student->pivot->id]) }}" class="btn btn-outline-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="موافقة"><i class="fe fe-check"></i></a>
                                                    <a href="{{ route('professor.request.reject',['id' => $student->pivot->id]) }}" class="btn btn-outline-danger btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="رفض"><i class="fe fe-x"></i></a>
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
                                            <th>اسم الطالب</th>
                                            <th>حالة المقابلة</th>
                                            <th>التاريخ والوقت</th>
                                            <th>الإعدادات</th>
                                        </thead>
                                        <tbody>
                                            @foreach (auth('professor')->user()->students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ auth('professor')->user()->college->name }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    <span class="btn
                                                    @if($student->pivot->status == 'تمت الموافقة') btn-success @elseif($student->pivot->status == 'تم الرفض') btn-danger @else btn-warning @endif
                                                    btn-sm">
                                                    {{ $student->pivot->status ?? 'انتظار' }}
                                                    </span>
                                                </td>
                                                <td>{{ $student->pivot->date }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('professor.interview.show',['id' => $student->pivot->id]) }}" class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="عرض"><i class="fe fe-eye"></i></a>
                                                    @if($student->pivot->status == "" || $student->pivot->status == "انتظار")
                                                    <a href="{{ route('professor.interview.edit',['id' => $student->pivot->id]) }}" class="btn btn-outline-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit"></i></a>
                                                    <a href="{{ route('professor.interview.delete',['id' => $student->pivot->id]) }}" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="حذف"><i class="fe fe-x"></i></a>
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
