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
                                            <th>اسم عضو هيئة التدريس</th>
                                            <th>حالة المقابلة</th>
                                            <th>التاريخ والوقت</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($interviews as $interview)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $interview->professor->college->name }}</td>
                                                <td>{{ $interview->student->name }}</td>
                                                <td>{{ $interview->professor->name }}</td>
                                                <td>
                                                    <span class="btn
                                                    @if($interview->status == 'تمت الموافقة') btn-success @elseif($interview->status == 'تم الرفض') btn-danger @else btn-warning @endif
                                                    btn-sm">
                                                    {{ $interview->status ?? 'انتظار' }}
                                                    </span>
                                                </td>
                                                <td>{{ $interview->date }}</td>
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
