@extends('website.app') @section('website.content')
<div class="bg-sub-secondary-color">
    <!-- intro  section -->
    <section class="intro position-relative" style="height:80vh;background-image: url('{{asset('website/imgs/about-us-banner.jpg')}}');">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.6);"></div>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-2 mx-auto text-center"></div>
                <div class="col-lg-8 py-5 text-center">
                    <h1 style="font-size: 70px;color: #f4c20d!important;" class="text-white font-weight-bold mb-4">شروط الاستردات</h1>
                </div>
                <div class="col-lg-2 mx-auto text-center"></div>
            </div>
        </div>
    </section>

    <section class="brief bg-white py-5">
        <div class="container from-backend">
           {!! $refund_policy !!}
        </div>
    </section>
    <!-- ./Brief -->
</div>
@endsection
