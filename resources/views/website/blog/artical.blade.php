@extends('website.app') @section('website.content')

    <!-- Article Img -->
    {{-- <div class="article-img position-relative">
        <img src="{{asset($blog->banner)}}" alt="" class="w-100">
    </div> --}}
    <!-- ./Article Img -->
    <div class="article-img position-relative">
        <img class="w-100" src="{{asset($blog->banner)}}" alt="" srcset="">
        <div class="overlay"></div>
        <div class="center-content" style="position: absolute;top:50%;left:50%" class="col-lg-4  align-self-center mx-auto text-center">
            <h4 class="text-white mb-4">دراسة اللغة الانجليزية في بريطانية</h4>
            <a href="institutes.html" class="btn bg-secondary-color text-white rounded-10">معاهد بريطانيا</a>
        </div>
        <!-- <img src="imgs/news/Bg.png" alt="" class="w-100"> -->
    </div>


    <div class="article-info py-4 bg-sub-secondary-color">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-6">
                    <div class="user">
                        <div class="user-img d-inline-block ml-3">
                            <img src="" alt="" class="rounded-circle">
                        </div>
                        <div class="user-info d-inline-block align-bottom">
                            <h6 class="text-main-color mb-0"> {{$blog->creator->name}}</h6>
                            <p>رئيس قسم التحرير</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="article-options text-left py-4 mt-1">
                        <span class="pl-5"> <i class="fas fa-share-alt text-main-color"></i> مشاركة </span>
                        <span class="pl-5"> <i class="fas fa-eye text-main-color"></i> 1.3k</span>
                        <span> نشر من {{ ArabicDate($blog->created_at)}} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Article -->
    <article class="pb-4 bg-sub-secondary-color">
        <div class="container-fluid">

            <div class="row px-xl-5">
                <div class="col-12">
                    <h4 class="text-main-color">{{$blog->title_ar}}</h4>
                    <p>  {!! $blog->content_ar !!}  </p>
                </div>
            </div>
        </div>

    </article>
    <!-- ./Article -->
    <!-- Comments -->
    {{-- <section class="comments pb-4">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12">

                    <div class="bg-white p-xl-5 p-3 rounded-10">
                        <!-- Section Heading -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="heading-comments">
                                    <h3 class="text-main-color font-weight-bold">التعليقات</h3>
                                </div>
                            </div>
                        </div>
                        <!-- ./Section Heading -->
                        <div class="row mb-4">
                            <div class="col-12">

                                <!-- Comment -->
                                <div class="comment py-4 border-bottom">
                                    <div class="user">
                                        <div class="user-img d-inline-block ml-3">
                                            <img src="imgs/users/user2.png" alt="" class="rounded-circle">
                                        </div>
                                        <div class="user-info d-inline-block align-middle">
                                            <h6 class="text-main-color mb-0">أحمد مجدى</h6>
                                            <small class="text-muted">مايو 2020</small>
                                            <p>مقال جميل شكرا علي المجهود هذا
                                                <span class="like pr-3"><i class="far fa-thumbs-up text-main-color"></i>
                                                    82 اعجاب</span>
                                                <span class="replay pr-3" data-toggle="collapse" href="#collapseExample"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collapseExample"><i
                                                        class="fas fa-reply text-main-color"></i> 3 رد</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Comment -->
                                <!-- Replay -->
                                <div class="comment py-4 pr-5">
                                    <div class="user">
                                        <div class="user-img d-inline-block ml-3">
                                            <img src="imgs/users/user2.png" alt="" class="rounded-circle">
                                        </div>
                                        <div class="user-info d-inline-block align-middle">
                                            <h6 class="text-main-color mb-0">أحمد مجدى</h6>
                                            <small class="text-muted">مايو 2020</small>
                                            <p>مقال جميل شكرا علي المجهود هذا
                                                <span class="like pr-3"><i class="far fa-thumbs-up text-main-color"></i>
                                                    82 اعجاب</span>
                                                <span class="replay pr-3"><i class="fas fa-reply text-main-color"></i> 3
                                                    رد</span>
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- ./Replay -->
                                <!-- Add Comment -->
                                <form class="pt-5">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group btn-light rounded-10">
                                                <textarea class="form-control bg-transparent rounded-10"
                                                    placeholder="اكتب تعليقك" rows="5"></textarea>

                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-2">
                                            <button
                                                class="btn bg-secondary-color w-100 text-white px-5 rounded-10">اضافة</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- ./Add Comment -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ./Comments -->
    <!-- Footer -->
@endsection







