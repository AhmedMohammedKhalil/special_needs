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
    <h1 class="">اضافة مقابلة </h1>
</div>
@endpush

@section('page')
<div class="card">
    <div class="card-body p-6">
        <div class="mb-6">
            <h5 class="fs-25 font-weight-semibold text-center">اضافة مقابلة </h5>
        </div>
        <div class="single-page customerpage">
            <div class="wrapper wrapper2 box-shadow-0">
                @livewire('professor.request.accept',['request_id'=>$request_id])
            </div>
        </div>
    </div>

</div>
@endsection
