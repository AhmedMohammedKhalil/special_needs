@extends('layouts.app')
@push('css')
<style>
.item-card2-img img {
    width: 100%;
    height: 400px;
}
</style>

@endpush
@section('landing')

    <div class="section-first bg-background-1"
    data-vidbg-bg="mp4: assets/video/300052515.mp4, webm: assets/video/300052515.mp4, poster: assets/video/video-img.jpg"
    data-vidbg-options="loop: true, muted: true, overlay: false" style=" position: relative;height: 550px;">
            <div class="vidbg-container"
                style="position: absolute; z-index: 0; inset: 0px; overflow: hidden; background-size: cover; background-repeat: no-repeat; background-position: 50% 50%; background-image: none;background:black">
                <video autoplay="" loop="" muted=""
                    style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: none; visibility: visible; opacity: 0.5; width: 100%;"
                    __idm_id__="663553">
                    <source src="assets/video/300052515.mp4" type="video/mp4">
                    <source src="assets/video/300052515.mp4" type="video/webm">
                </video>
            </div>
        <!--Topbar-->
        <div class="header-main">
            @if (Auth('admin')->check() || Auth('student')->check() || Auth('professor')->check())
                @include('layouts.header.auth')
            @endif
            @include('layouts.header.menu')

        </div>
        <!--/Horizontal-main -->
        <!--Section-->
        @include('layouts.header.content')

        <!--/Section-->
    </div>
@endsection

@section('content')

    {{-- About us --}}
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2 class="leading-normal">من نحن</h2>
                        <p class="fs-18">أنشأ هذا الموقع لرعاية المعوقين لتقدم خدماتها للأبناء ذوي الإعاقة وتحمل العبء عن ذويهم وتخفف معاناتهم وترشدهم إلى الطريق الصحيح لتعليم أبنائهم ودمجهم في المجتمع من خلال تقديمهم الى الكليات والسير نحو مستقبل افضل.</p>
                        <p class="fs-18">
                            تأسس الموقع على أيدي مجموعة من الطلبة المتطوعين المخلصين الذين سخرهم الله عز وجل لخدمة هذه الفئة عندما لم يكن بدولة الكويت من يهتم بهم سوى دور الرعاية الاجتماعية التابعة لوزارة الشؤون الاجتماعية والعمل.
                        </p>

                    </div> <a class="btn btn-primary px-6 fs-16" href="{{ route('aboutus') }}">المزيد</a>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <img src="{{ asset('assets/images/banners/home-aboutus.jpeg') }}" alt="home-aboutus" style="box-shadow:#21206061 14px 14px 14px;border-radius:20px">
                </div>
            </div>
        </div>
    </section>

    {{-- all colleges --}}
    @if($colleges->count() > 0)
    <section class="sptb">
        <div class="container">
            <div class="section-title">
                <h2>جميع الكليات</h2>
                <p class="fs-18 lead">جميع الكليات التى يتقدم اليها الطالب</p>
            </div>
            @if ($colleges->count() > 2)
                <div class="owl-carousel owl-carousel-icons2">
                    @foreach ($colleges as $college)
                        <div class="item">
                            <div class="card mb-0 overflow-hidden">
                                <div class="item-card2-img">
                                    <a href="{{ route('colleges.show',['id'=>$college->id]) }}"></a>
                                    @if ($college->image != null)
                                    <img src="{{asset('assets/images/data/colleges/'.$college->id.'/'.$college->image)}}"
                                        alt="img">
                                    @else
                                        <img src="{{asset('assets/images/data/colleges/default.jpg')}}" alt="img">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="item-card2">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text mb-0">
                                                <a href="{{ route('colleges.show',['id'=>$college->id]) }}" class="text-dark"><h4 class="mb-1 fs-18 leading-normal">{{ $college->name }}</h4></a>
                                            </div>
                                            <p class="fs-14">
                                                @if(strlen($college->description) > 40)
                                                {!! substr(nl2br($college->description),0,40).'...' !!}
                                                @else
                                                {!! nl2br($college->description) !!}
                                                @endif
                                                <h3>{{ $college->location }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @else
            <div class="row">
                @foreach ($colleges as $college)
                <div class="item col-6">
                    <div class="card mb-0 overflow-hidden">
                        <div class="item-card2-img">
                            <a href="{{ route('colleges.show',['id'=>$college->id]) }}"></a>
                            @if ($college->image != null)
                            <img src="{{asset('assets/images/data/colleges/'.$college->id.'/'.$college->image)}}"
                                alt="img">
                            @else
                                <img src="{{asset('assets/images/data/colleges/default.jpg')}}" alt="img">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text mb-0">
                                        <a href="{{ route('colleges.show',['id'=>$college->id]) }}" class="text-dark"><h4 class="mb-1 fs-18 leading-normal">{{ $college->name }}</h4></a>
                                    </div>
                                    <p class="fs-14">
                                        @if(strlen($college->description) > 40)
                                        {!! substr(nl2br($college->description),0,40).'...' !!}
                                        @else
                                        {!! nl2br($college->description) !!}
                                        @endif
                                        </p>
                                    <h3>{{ $college->location }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </section>
    @endif

    {{-- Galleries --}}
    <section class="sptb">
        <div class="container">
            <div class="section-title">
                <h2>معرض الصور</h2>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel classes-carousel-1">
                    @for ($i=1;$i<10;$i++)
                        <div class="item">
                            <div class="card mb-0">
                                <div class="item-card">
                                    <div class="item-card-desc">
                                        <a href="javascript:void(0)"></a>
                                        <div class="item-card-img" style="height: 400px">
                                            <img src="{{ asset('assets/images/galleries/image'.$i.'.jpeg') }}" alt="{{'img-'.$i }}" class="" style="height:100%">
                                        </div>
                                        {{-- <div class="item-card-text">
                                            <h4 class="mb-0">Data Science</h4>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

@endsection
