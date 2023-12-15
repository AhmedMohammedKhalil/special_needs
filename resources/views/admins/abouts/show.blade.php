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
    <h1 class="">{{$about->title}}</h1>
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
                                            @if ($about->image != null)
                                                <img src="{{asset('assets/images/banners/'.$about->image)}}"
                                                    alt="img">
                                            @endif
                                        </div>
                                        <div class="user-wrap">
                                            <h3>{{$about->title}}</h3>
                                            <p class="text-default mb-3">{{nl2br($about->content)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
</section>
@endsection