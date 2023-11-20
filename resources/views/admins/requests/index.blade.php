@extends('admins.layout')
@push('css')
<style>
    .usertab-list li {
        width: 100%
    }
</style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">جميع الطلبات</h1>
</div>
@endpush

@section('page')
<div class="border-0">
    <div class="tab-content">
        <div class="tab-pane active">
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
                                            <th> الكلية</th>
                                            <th>حالة الطلب</th>
                                            <th>التاريخ والوقت</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($requests as $r)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->student->name}}</td>
                                                <td>{{ $r->college->name}}</td>
                                                <td>
                                                    <span class="btn
                                                    @if($r->acceptable == 'تمت الموافقة') btn-success @elseif($r->acceptable == 'تم الرفض') btn-danger @else btn-warning @endif
                                                    btn-sm">
                                                    {{ $r->acceptable ?? 'انتظار' }}
                                                    </span>
                                                </td>
                                                <td>{{ $r->created_at }}</td>
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
