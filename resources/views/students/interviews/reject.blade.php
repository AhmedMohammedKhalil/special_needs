@extends('students.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">رفض عمل مقابلة شخصية</h1>
</div>
@endpush

@section('page')
<div class="card">
    <div class="card-body p-6">
        <div class="mb-6">
            <h5 class="fs-25 font-weight-semibold text-center">بيانات الرفض</h5>
        </div>
        <div class="single-page customerpage">
            <div class="wrapper wrapper2 box-shadow-0">
                @livewire('student.interview.add-reject',['interview_id'=>$interview_id])
            </div>
        </div>
    </div>

</div>
@endsection
