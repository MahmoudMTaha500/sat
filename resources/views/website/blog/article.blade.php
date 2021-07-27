
@extends('website.app') @section('website.content')

    <div class="article-img position-relative" style="background-image: url({{$blog->banner == 'null' ? asset('storage/default_images.png') : asset($blog->banner)}}" alt="{{$blog->title_tag}})">
        <div class="overlay"></div>
        <div class="center-content" class="col-lg-4  align-self-center mx-auto text-center">
            <h4 class="text-white mb-4">دراسة اللغة الانجليزية في {{$blog->country->name_ar}} </h4>
            <a href="{{route('website.institutes' , ['country' => $blog->country->id])}}" class="btn bg-main-color text-white rounded-10">معاهد {{$blog->country->name_ar}}</a>
        </div>
        <!-- <img src="imgs/news/Bg.png" alt="" class="w-100"> -->
    </div>

    <article class="py-5 bg-sub-secondary-color">
        <div class="container-fluid">

            <div class="row px-xl-5">
                
                <div class="col-lg-9 col-md-8">
                    <h4 class="text-main-color">{{$blog->title_ar}}</h4>
                    <div>
                        <i class="fas fa-eye"></i> 
                        تصفح
                        (
                            <a href="#">معاهد بريطانيا</a> - 
                            <a href="#">دورات معهد كابلان</a>
                        )
                    </div>
                    <p>  {!! $blog->content_ar !!}  </p>
                </div>
               
                <div class="col-lg-3 col-md-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">التصنيفات</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    <li><a href="#"> تصنيف  1 </a></li>
                                    <li><a href="#"> تصنيف  2 </a></li>
                                    <li><a href="#"> تصنيف  3 </a></li>
                                    <li><a href="#"> تصنيف  4 </a></li>
                                    <li><a href="#"> تصنيف  5 </a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات ذات صلة</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    <li><a href="#"> مقال 1 </a></li>
                                    <li><a href="#"> مقال 2 </a></li>
                                    <li><a href="#"> مقال 3 </a></li>
                                    <li><a href="#"> مقال 4 </a></li>
                                    <li><a href="#"> مقال 5 </a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بدولة (بريطانيا)</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    <li><a href="#"> مقال 1 </a></li>
                                    <li><a href="#"> مقال 2 </a></li>
                                    <li><a href="#"> مقال 3 </a></li>
                                    <li><a href="#"> مقال 4 </a></li>
                                    <li><a href="#"> مقال 5 </a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بمدينة (مانشيستر)</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    <li><a href="#"> مقال 1 </a></li>
                                    <li><a href="#"> مقال 2 </a></li>
                                    <li><a href="#"> مقال 3 </a></li>
                                    <li><a href="#"> مقال 4 </a></li>
                                    <li><a href="#"> مقال 5 </a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بمعهد (كابلان)</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    <li><a href="#"> مقال 1 </a></li>
                                    <li><a href="#"> مقال 2 </a></li>
                                    <li><a href="#"> مقال 3 </a></li>
                                    <li><a href="#"> مقال 4 </a></li>
                                    <li><a href="#"> مقال 5 </a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بدورة (تعليم لغة انجليزية صباحي)</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    <li><a href="#"> مقال 1 </a></li>
                                    <li><a href="#"> مقال 2 </a></li>
                                    <li><a href="#"> مقال 3 </a></li>
                                    <li><a href="#"> مقال 4 </a></li>
                                    <li><a href="#"> مقال 5 </a></li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
    
@endsection







