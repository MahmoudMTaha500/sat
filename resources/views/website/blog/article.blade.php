
@extends('website.app') @section('website.content')

    <div class="article-img position-relative">
        <div class="overlay"></div>
        <picture>
            <source srcset="{{empty($blog->getFirstMedia('blog_banner')) ? asset('/storage/default_images.png') : $blog->getFirstMediaUrl('blog_banner')}}" media="(min-width:700px)">
            <source srcset="{{empty($blog->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $blog->getFirstMedia('blog_featured_image')->getUrl('thumb')}}" media="(min-width:500px)">
            <img src="{{empty($blog->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $blog->getFirstMediaUrl('blog_featured_image')}}" alt="{{$blog->img_alt}}" width="100%">
        </picture>

        <div class="center-content" class="col-lg-12 text-center">
            @if (isset($blog->country))
                <h4 class="text-white mb-4">دراسة اللغة الانجليزية في {{$blog->country->name_ar}} </h4>
            @endif
            @if($blog->institute_id)
            <a href="{{route('website.institutes' , ['institute_name' => $blog->institute->name_ar])}}" class="btn bg-main-color text-white rounded-10">
                
                تصفح دورات معهد  {{$blog->institute->name_ar}} 
            </a>
            
            @else  
                @isset($blog->country)
                    <a href="#" onclick="this.href = '{{route('website.institutes' , ['country_id' => $blog->country->id])}}' " class="btn bg-main-color text-white rounded-10">
                        معاهد {{$blog->country->name_ar}} 
                    </a>
                @endisset
            @endif

            @if($blog->course) 
            <p class="mt-3">
                <a href="{{route('website.institute',[$blog->institute->id , $blog->institute->slug , $blog->course->slug])}}" class="btn bg-main-color text-white rounded-10">
                
                    قدم الان في دورة  {{$blog->course->name_ar}} 
                </a>
            </p>
            @endif

          
        </div>
        <!-- <img src="imgs/news/Bg.png" alt="" class="w-100"> -->
    </div>

    <article class="py-5 bg-sub-secondary-color">
        <div class="container-fluid">

            <div class="row px-xl-5">
                
                <div class="col-lg-9 col-md-8">
                    <h1 class="text-main-color h4 mb-5">{{$blog->title_ar}}</h1>
                    @if (isset($blog->country) || isset($blog->institute))
                        <div>
                            <i class="fas fa-eye"></i> 
                            تصفح
                            (
                                @isset($blog->country)
                                    <a  href="#" onclick="this.href= '{{route('website.institutes' , ['country_id' => $blog->country->id])}}' ">معاهد {{$blog->country->name_ar}}</a>
                                @endisset
                                @isset($blog->institute)
                                    - <a href="{{route('website.institutes' , ['institute_name' => $blog->institute->name_ar])}}" >دورات معهد {{$blog->institute->name_ar}}</a>
                                @endisset
                            )
                        </div>
                    @endif
                    <p>  {!! $blog->content_ar !!}  </p>
                </div>
               
                <div class="col-lg-3 col-md-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">التصنيفات</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    @foreach($categories as $cat)
                                    <li><a href="#" onclick="this.href= '{{route('website.articles',['cat_id'=> $cat->id])}}' ">  {{$cat->name_ar}} </a></li>
                                    @endforeach
                                 
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات ذات صلة</h3>
                            <ul class="sidebar-row-ul">
                                <li>
    
                                    @foreach($categories_spiesific_blog as $blog_1)
                                    <li><a href="{{route('website.article',$blog_1->slug)}}">  {{$blog_1->title_ar}} </a></li>
                                    @endforeach
                                  
                                </li>
                            </ul>
                        </div>
                        @isset($blog->country)
                            <div class="sidebar-row">
                                <h3 class="sidebar-row-title">مقالات مرتبطة بدولة {{$blog->country->name_ar}}</h3>
                                <ul class="sidebar-row-ul">
                                    <li>
                                        @foreach($countries_spiesific_blog as $blog)
                                        <li><a href="{{route('website.article',$blog->slug)}}">  {{$blog->title_ar}} </a></li>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        @endisset
                        @isset($blog->city)
                            <div class="sidebar-row">
                                <h3 class="sidebar-row-title">مقالات مرتبطة بمدينة {{$blog->city->name_ar}}</h3>
                                <ul class="sidebar-row-ul">
                                    <li>
                                        @foreach($cities_spiesific_blog as $blog)
                                        <li><a href="{{route('website.article',$blog->slug)}}">  {{$blog->title_ar}} </a></li>
                                        @endforeach
                                    </li>
                                    </li>
                                </ul>
                            </div>
                        @endisset
                        @if(is_numeric($blog->institute_id) != 0 && !$institutes_spiesific_blog->isEmpty())
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بمعهد {{$blog->institute->name_ar}}</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    @foreach($institutes_spiesific_blog as $institute)
                                    <li><a href="{{route('website.article',$institute->id)}}">  {{$institute->title_ar}} </a></li>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        @endif
                        @if(is_numeric($blog->course_id) != 0 && !$courses_spiesific_blog->isEmpty())
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بدورة 
                             @if($blog->course)    {{$blog->course->name_ar}} @endif
                            </h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    @foreach($courses_spiesific_blog as $blog)
                                    <li><a href="{{route('website.article',$blog->slug)}}">  {{$blog->title_ar}} </a></li>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </article>
    
@endsection







