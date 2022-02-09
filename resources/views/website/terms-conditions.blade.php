@extends('website.app') @section('website.content')
<div class="bg-sub-secondary-color">


    <!-- intro  section -->
    <section class="intro position-relative" style="background-image:linear-gradient(90deg, #f4c20d9e, #f4c20d 93%)">
        {{-- <div class="overlay" style="background-color: rgba(0, 0, 0, 0.6);"></div> --}}
        <div class="container-fluid">
            <div class="row px-xl-5 align-items-center">
                <div class="col-lg-6 py-5 text-right">
                    <h1 style="font-size: 70px;" class="text-white text-md-right text-center font-weight-bold mb-4">الشروط و الأحكام</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#terms_conditions"><button type="submit" class="btn w-100 rounded-10 bg-white text-center text-secondary-color">اقرأ المزيد</button></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mx-auto text-center">
                    <img class="w-100 mt-2" src="{{asset('storage/banners/1.png')}}" alt="" srcset="">
                </div>
            </div>
        </div>
    </section>

    <section id="terms_conditions" class="brief bg-white py-5">
        <div class="container from-backend">
           {!! $terms_conditions !!}
        </div>  
    </section>
    <!-- ./Brief -->
</div>
@endsection
