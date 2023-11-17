@extends('students.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">تعديل طلب إلحاق فى الكلية</h1>
</div>
@endpush

@section('page')
<div class="card">
    <div class="card-body p-6">
        <div class="mb-6">
            <h5 class="fs-25 font-weight-semibold text-center">طلب الحاق فى الكلية</h5>
        </div>
        <div class="single-page customerpage">
            <div class="wrapper wrapper2 box-shadow-0">
                @livewire('student.request.edit',['request_id'=>$request_id])
            </div>
        </div>
    </div>

</div>
@endsection
