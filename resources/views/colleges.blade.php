@extends('layouts.app')
@push('css')
    <style>
        .wideget-user-desc .wideget-user-img img {
            border-radius: 20px;
            height: 400px;
            width: 100%;
        }
    </style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">جميع الكليات</h1>
</div>
@endpush

@section('content')
    <section>
        <section >
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user " style="min-height: 500px">
                                @livewire('colleges')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
