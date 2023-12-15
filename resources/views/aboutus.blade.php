@extends('layouts.app')
@push('css')
    <style>
        .item-all-card {
            height: 150px;
        }
        .ideas .card{
            cursor: pointer;
            transition: all 1s;
            box-shadow: gray 0px 0px 18px;
            border-radius: 30px;
        }

        .ideas .card:hover{
            transform: translateY(-20px)
        }
    </style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">من نحن</h1>
</div>
@endpush

@section('content')
@foreach ($abouts as $about)
@if($about->type == 'من نحن')
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2 class="leading-normal">{{ $about->title }}</h2>
                        <p class="fs-18">
                            {!! nl2br($about->content) !!}
                        </p>

                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <img src="{{ asset('assets/images/data/aboutus/'.$about->image) }}" alt="home-aboutus" style="box-shadow:#21206061 14px 14px 14px;border-radius:20px">
                </div>
            </div>
        </div>
    </section>
@endif
@endforeach

<section class="ideas" style="margin-bottom:20px ">
    <div class="col-md-12">
        <div class="row">
@foreach ($abouts as $about)
    @if($about->type != 'من نحن')
        @if($about->type == 'مهمتنا')
            <div class="col-lg-6 col-md-12">
                <div class="card mb-lg-0">
                    <div class="card-body">
                        <div class="status-info text-center special-section">
                            <div class="status-img">
                                <i class="fa fa-thumbs-o-up fa-4x text-primary bg-primary-transparent"></i>
                            </div>
                            <h3 class="mt-2 mb-2 font-weight-semibold fs-20">{{ $about->title }}</h3>
                            <p class="text-dark mb-0 fs-16 font-weight-bold">{!! nl2br($about->content) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-6 col-md-12">
                <div class="card mb-lg-0">
                    <div class="card-body">
                        <div class="status-info text-center special-section">
                            <div class="status-img">
                                <i class="fa fa-shield fa-4x text-secondary bg-secondary-transparent"></i>
                            </div>
                            <h3 class="mt-2 mb-2 font-weight-semibold fs-20">{{ $about->title }}</h3>
                            <p class="text-dark mb-0 fs-16 font-weight-bold">{!! nl2br($about->content) !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endforeach
        </div>
    </div>
</section>

@if($aboutsliders != null)
<section>
    <div class="col-md-12">
        <h2 class="leading-normal">قيمنا</h2>
        <div class="owl-carousel classes-carousel-2">
            @foreach ($aboutsliders as $aboutslider)
                <div class="item">
                    <div class="card">
                        <div class="item-all-card item-all-card2 text-dark mb-lg-0 item-hover-card p-5 d-flex">
                            <a href="javascript:void(0)" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="icon icon-briefcase fs-25"></i>
                            </div>
                            <div class="item-all-text mt-1 ms-3">
                                <h5 class="mb-0 fs-18 font-weight-semibold">{{ $aboutslider->title }}</h5>
                                <p class="mt-2 mb-0 fs-16"><b style="text-wrap:wrap">{!! nl2br($aboutslider->content) !!}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
@endif
@endsection
