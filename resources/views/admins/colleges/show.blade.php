@extends('admins.layout')
@push('css')
    <style>
        .collage .wideget-user-desc .wideget-user-img img {
            border-radius: 20px;
            height: 400px;
            width: 600px;
        }
        .professors .item img{
            height:200px;
        }
        
    </style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم الكليات</h1>
</div>
@endpush


@section('page')
<section class="collage">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="wideget-user ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="wideget-user-desc">
                                        <div class="wideget-user-img">
                                            @if ($college->image != null)
                                                <img src="{{asset('assets/images/data/colleges/'.$college->id.'/'.$college->image)}}"
                                                    alt="img">
                                            @else
                                                <img src="{{asset('assets/images/data/colleges/college.JPG')}}" alt="img">
                                            @endif
                                        </div>
                                        <div class="user-wrap">
                                            <h3>{{$college->name}}</h3>
                                            <h3>{{$college->location}}</h3>
                                            <p class="text-default mb-3">{{nl2br($college->description)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($college->professors->count() > 0)
                <div class="row text-center">
                    {{-- foreach service --}}
                    <div class="section-title d-md-flex pb-0">
                        <div>
                            <h2>اعضاء هيئة التدريس</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 professors">
                        @if ($college->professors->count() > 2)
                        <div class="">
                            <div class="owl-carousel client-carousel">
                                @foreach ($college->professors as $prof)
                                    <div class="item text-center">
                                        <div class="card overflow-hidden">
                                            @if ($prof->image != null)
                                                <img src="{{asset('assets/images/data/professors/'.$prof->id.'/'.$prof->image)}}"
                                                class="w-100" alt="img">
                                            @else
                                                @if ($prof->gender == 'انثى')
                                                    <img src="{{asset('assets/images/data/professors/female.jpg')}}" class="w-100" alt="img">
                                                @else
                                                    <img src="{{asset('assets/images/data/professors/male.jpg')}}"  class="w-100" alt="img">
                                                @endif
                                            @endif
                                            <div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
                                                <h4 class="fs-16 mt-0 mb-1 font-weight-semibold">{{ $prof->name }}</h4>
                                                <p class="mb-1">{{ $prof->email }}</p>

                                            </div>
                                            <div class="card-footer">
                                                <div class="">
                                                    <i class="icon icon-phone"></i> {{ $prof->phone }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        @else
                        <div class="row">

                            @foreach ($college->professors as $prof)
                                <div class="item text-center col-4">
                                    <div class="card overflow-hidden">
                                        @if ($prof->image != null)
                                            <img src="{{asset('assets/images/data/professors/'.$prof->id.'/'.$prof->image)}}"
                                            class="w-100" alt="img">
                                        @else
                                            @if ($prof->gender == 'انثى')
                                                <img src="{{asset('assets/images/data/professors/female.jpg')}}" class="w-100" alt="img">
                                            @else
                                                <img src="{{asset('assets/images/data/professors/male.jpg')}}"  class="w-100" alt="img">
                                            @endif
                                        @endif
                                        <div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
                                            <h4 class="fs-16 mt-0 mb-1 font-weight-semibold">{{ $prof->name }}</h4>
                                            <p class="mb-1">{{ $prof->email }}</p>

                                        </div>
                                        <div class="card-footer">
                                            <div class="">
                                                <i class="icon icon-phone"></i> {{ $prof->phone }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @endif
                    </div>
                </div>
                @endif

            </div>
        </div>
</section>
@endsection