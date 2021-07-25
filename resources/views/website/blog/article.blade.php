@extends('website.app') @section('website.content')

    <!-- Article Img -->
    {{-- <div class="article-img position-relative">
        <img src="{{asset($blog->banner)}}" alt="" class="w-100">
    </div> --}}
    <!-- ./Article Img -->
    <div class="article-img position-relative">
        <img class="w-100" src="{{asset($blog->banner)}}" alt="{{$blog->title_tag}}" srcset="">
        <div class="overlay"></div>
        <div class="center-content" style="position: absolute;top:50%;left:50%" class="col-lg-4  align-self-center mx-auto text-center">
            <h4 class="text-white mb-4">دراسة اللغة الانجليزية في {{$blog->country->name_ar}} </h4>
            <a href="{{route('website.institutes' , ['country' => $blog->country->id])}}" class="btn bg-secondary-color text-white rounded-10">معاهد {{$blog->country->name_ar}}</a>
        </div>
        <!-- <img src="imgs/news/Bg.png" alt="" class="w-100"> -->
    </div>

    <article class="py-5 bg-sub-secondary-color">
        <div class="container-fluid">

            <div class="row px-xl-5">
                <div class="col-12">
                    <h4 class="text-main-color">{{$blog->title_ar}}</h4>
                    <p>  {!! $blog->content_ar !!}  </p>
                </div>
            </div>
        </div>

    </article>
    
@endsection







