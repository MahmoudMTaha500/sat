
@extends('website.app') @section('website.content')

    <div class="article-img position-relative" style="background-image: url({{$blog->banner == 'null' ? asset('storage/default_images.png') : asset($blog->banner)}}" alt="{{$blog->title_tag}})">
        <div class="overlay"></div>
        <div class="center-content" class="col-lg-4  align-self-center mx-auto text-center">
            <h4 class="text-white mb-4">دراسة اللغة الانجليزية في {{$blog->country->name_ar}} </h4>
            @if($blog->institute_id)
            <a href="{{route('website.institutes' , ['institute_name' => $blog->institute->name_ar])}}" class="btn bg-main-color text-white rounded-10">
                
                تصفح دورات معهد  {{$blog->institute->name_ar}} 
            </a>
            @else  
            <a href="{{route('website.institutes' , ['country_id' => $blog->country->id])}}" class="btn bg-main-color text-white rounded-10">
                
                معاهد {{$blog->country->name_ar}} 
            </a>
            @endif

            @if($blog->course) 
            <a href="{{route('website.institute',[$blog->institute->id , $blog->institute->slug , $blog->course->slug])}}" class="btn bg-main-color text-white rounded-10">
                
                قدم الان في دورة  {{$blog->course->name_ar}} 
            </a>
            @endif

          
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
                            <a  href="{{route('website.institutes' , ['country_id' => $blog->country->id])}}">معاهد {{$blog->country->name_ar}}</a> - 
                            <a href="{{route('website.institutes' , ['institute_name' => $blog->institute->name_ar])}}" >دورات معهد {{$blog->institute->name_ar}}</a>
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
                                    @foreach($categories as $cat)
                                    <li><a href="{{route('website.articles',['cat_id'=> $cat->id])}}">  {{$cat->name_ar}} </a></li>
                                    @endforeach
                                 
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات ذات صلة</h3>
                            <ul class="sidebar-row-ul">
                                <li>
    
                                    @foreach($categories_spiesific_blog as $blog_1)
                                    <li><a href="{{route('website.article',$blog_1->id)}}">  {{$blog_1->title_ar}} </a></li>
                                    @endforeach
                                  
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بدولة {{$blog->country->name_ar}}</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    @foreach($countries_spiesific_blog as $country)
                                    <li><a href="{{route('website.article',$country->id)}}">  {{$country->title_ar}} </a></li>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بمدينة {{$blog->city->name_ar}}</h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    @foreach($cities_spiesific_blog as $city)
                                    <li><a href="{{route('website.article',$city->id)}}">  {{$city->title_ar}} </a></li>
                                    @endforeach
                                </li>
                                </li>
                            </ul>
                        </div>
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
                        <div class="sidebar-row">
                            <h3 class="sidebar-row-title">مقالات مرتبطة بدورة 
                             @if($blog->course)    {{$blog->course->name_ar}} @endif
                            </h3>
                            <ul class="sidebar-row-ul">
                                <li>
                                    @foreach($courses_spiesific_blog as $course)
                                    <li><a href="{{route('website.article',$course->id)}}">  {{$course->title_ar}} </a></li>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
    
@endsection







