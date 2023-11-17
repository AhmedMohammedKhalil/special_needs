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

                </div>
            </div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <img src="{{ asset('assets/images/banners/home-aboutus.jpeg') }}" alt="home-aboutus" style="box-shadow:#21206061 14px 14px 14px;border-radius:20px">
            </div>
        </div>
    </div>
</section>
<section class="ideas" style="margin-bottom:20px ">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card mb-lg-0">
                    <div class="card-body">
                        <div class="status-info text-center special-section">
                            <div class="status-img">
                                <i class="fa fa-thumbs-o-up fa-4x text-primary bg-primary-transparent"></i>
                            </div>
                            <h3 class="mt-2 mb-2 font-weight-semibold fs-20">مهمتنا</h3>
                            <p class="text-dark mb-0 fs-16 font-weight-bold" >تقديم الرعاية والتعليم والدعم المبتكر القابل لإثراء وتحقيق تغيير إيجابي مستمر لحياة الأشخاص الذين نخدمهم.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card mb-lg-0">
                    <div class="card-body">
                        <div class="status-info text-center special-section">
                            <div class="status-img">
                                <i class="fa fa-shield fa-4x text-secondary bg-secondary-transparent"></i>
                            </div>
                            <h3 class="mt-2 mb-2 font-weight-semibold fs-20">رؤيتنا</h3>
                            <p class="text-dark mb-0 fs-16 font-weight-bold" >الريادة في تقديم الخدمات وخلق فرص عادلة للأشخاص ذوي الإعاقة لضمان الاندماج مع أقرانهم.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section>
    <div class="col-md-12">
        <h2 class="leading-normal">قيمنا</h2>
        <div class="owl-carousel classes-carousel-2">
            <div class="item">
                <div class="card">
                    <div class="item-all-card item-all-card2 text-dark mb-lg-0 item-hover-card p-5 d-flex">
                        <a href="javascript:void(0)" class="absolute-link"></a>
                        <div class="iteam-all-icon">
                            <i class="icon icon-briefcase fs-25"></i>
                        </div>
                        <div class="item-all-text mt-1 ms-3">
                            <h5 class="mb-0 fs-18 font-weight-semibold">الاحترام </h5>
                            <p class="mt-2 mb-0 fs-16"><b>نتعامل مع بعضنا ومع الذين نخدمهم بكرامة وثقة ورغبة حقيقية في فهم قيمة الآخرين ووجهات نظرهم وظروفهم، بما يخلق بيئة تعز ز العلاقات الإيجابية والدعم المتبادل</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <div class="item-all-card item-all-card2 text-dark mb-lg-0 item-hover-card p-5 d-flex">
                        <a href="javascript:void(0)" class="absolute-link"></a>
                        <div class="iteam-all-icon">
                            <i class="icon icon-briefcase fs-25"></i>
                        </div>
                        <div class="item-all-text mt-1 ms-3">
                            <h5 class="mb-0 fs-18 font-weight-semibold">النزاهة </h5>
                            <p class="mt-2 mb-0 fs-16"><b>سعى دائما للصدق والالتزام بالمبادئ الأخلاقية في كل ما نقوم به، والوفاء بوعودنا.</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <div class="item-all-card item-all-card2 text-dark mb-lg-0 item-hover-card p-5 d-flex">
                        <a href="javascript:void(0)" class="absolute-link"></a>
                        <div class="iteam-all-icon">
                            <i class="icon icon-briefcase fs-25"></i>
                        </div>
                        <div class="item-all-text mt-1 ms-3">
                            <h5 class="mb-0 fs-18 font-weight-semibold">الرحمة </h5>
                            <p class="mt-2 mb-0 fs-16"><b>نتفاعل مع بعضنا ومع الذين نخدمهم بلطف ورقة وحماس</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <div class="item-all-card item-all-card2 text-dark mb-lg-0 item-hover-card p-5 d-flex">
                        <a href="javascript:void(0)" class="absolute-link"></a>
                        <div class="iteam-all-icon">
                            <i class="icon icon-briefcase fs-25"></i>
                        </div>
                        <div class="item-all-text mt-1 ms-3">
                            <h5 class="mb-0 fs-18 font-weight-semibold">الخدمة</h5>
                            <p class="mt-2 mb-0 fs-16"><b>نسعى إلى تحقق أفضل النتائج للطلاب ذوى الإعاقة وعائلاتهم عن طريق تسخير طاقتنا وأفكارنا وخبراتنا ومواردنا لهم</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <div class="item-all-card item-all-card2 text-dark mb-lg-0 item-hover-card p-5 d-flex">
                        <a href="javascript:void(0)" class="absolute-link"></a>
                        <div class="iteam-all-icon">
                            <i class="icon icon-briefcase fs-25"></i>
                        </div>
                        <div class="item-all-text mt-1 ms-3">
                            <h5 class="mb-0 fs-18 font-weight-semibold">الابتكار</h5>
                            <p class="mt-2 mb-0 fs-16"><b>نسعى بلا كلل إلى التميز في كل ما نقوم به من خلال استخدام أفضل الممارسات وإنشاء التطبيقات الجديدة وتسخير المعرفة لتتماشى مع الاحتياجات الحالية والمتغيرة لطلابنا</b></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
