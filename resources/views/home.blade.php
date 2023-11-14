@extends('layouts.app')
@section('landing')

    <div class="section-first bg-background-1"
    data-vidbg-bg="mp4: assets/video/300052515.mp4, webm: assets/video/300052515.mp4, poster: assets/video/video-img.jpg"
    data-vidbg-options="loop: true, muted: true, overlay: false" style=" position: relative;height: 723px;">
            <div class="vidbg-container"
                style="position: absolute; z-index: 0; inset: 0px; overflow: hidden; background-size: cover; background-repeat: no-repeat; background-position: 50% 50%; background-image: none;height: 723px;background:black">
                <video autoplay="" loop="" muted=""
                    style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: none; visibility: visible; opacity: 0.5; width: auto; height: 723px;"
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
                                <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><img src="assets/images/png/power.png" class=""></span></div>
                                <div class="item-card2-img">
                                    <a href="{{ route('colleges.show',['id'=>$college->id]) }}"></a>
                                    <img src="{{ asset('assets/images/data/colleges/').$college->id.'/'.$colleges->image }}" alt="img" class="college-image">
                                </div>
                                <div class="card-body">
                                    <div class="item-card2">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text mb-0">
                                                <a href="{{ route('colleges.show',['id'=>$college->id]) }}" class="text-dark"><h4 class="mb-1 fs-18 leading-normal">{{ $college->name }}</h4></a>
                                            </div>
                                            <p class="fs-14">
                                                {!! substr(nl2br($college->description),0,40).'...' !!}</p>
                                            <h3>{{ $college->location }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @elseif($colleges->count() > 0)
            <div class="row">
                <div class="item col-6">
                    <div class="card mb-0 overflow-hidden">
                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><img src="assets/images/png/power.png" class=""></span></div>
                        <div class="item-card2-img">
                            <a href="page-details.html"></a>
                            <img src="assets/images/media/color/6.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="card-body">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="d-flex mb-0">
                                        <div class="star-ratings start-ratings-main clearfix me-3">
                                            <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                <select class="example-fontawesome" name="rating" autocomplete="off">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <span class="text-muted">&#40;695,745 students&#41;</span>
                                    </div>
                                    <div class="item-card2-text mb-0">
                                        <a href="page-details.html" class="text-dark"><h4 class="mb-1 fs-18 leading-normal">Learn Java Classes in Online </h4></a>
                                    </div>
                                    <p class="fs-14">many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
                                    <h3 class="mb-0 font-weight-semibold">$564 <del class="fs-14">$758</del></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </section>








    {{-- <section class="pt-5">
        <div class="container">
            <div class="section-title d-md-flex">
                <div>
                    <h2>الكليات</h2>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($colleges as $collge)
                    <div class="col-lg-4 col-md-6 col-sm-6 overflow-hidden mb-3">
                        <a href="{{ route('colleges.show',['id' => $college->id]) }}">
                            <div class="card bg-white br-7 p-5 mb-lg-0">
                                <div class="icon-bg about">
                                    <img class="rounded-3" src="{{ asset('assets/images/png/spec.jpg') }}" alt="">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{{ $college->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section> --}}

    {{-- all professors --}}
    {{-- <section>
        <hr class="border-0">
        <div class="section-title d-md-flex">
            <div>
                <h2>اعضاء هيئة التدريس</h2>
            </div>
        </div>
        <div class="row task-widget">
            @foreach ($professors as $prof)
                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="{{ route('professor.details',['id' => $prof->id]) }}"></a>
                                <div class="item-card-img">
                                    @if($prof->image == null)
                                        @if($prof->gender == 'ذكر')
                                            <img src="{{asset('assets/images/data/professors/male.jpg')}}" alt="img" class="">
                                        @else
                                            <img src="{{asset('assets/images/data/professors/female.jpg')}}" alt="img" class="">
                                        @endif
                                    @else
                                        <img src="{{asset('assets/images/data/professors/'.$prof->id.'/'.$prof->image)}}" alt="img"class="">
                                    @endif
                                </div>
                            </div>
                            <div class="item-card-btn data-1" style="font-size: 30px">
                                <a href="{{ route('lawyer.details',['id' => $prof->id]) }}" class="mb-0 text-center text-white">{{ $prof->name }}</a>
                                <span class="text-white">{{ $prof->job_title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section> --}}

@endsection
