@extends('website.app') @section('website.content')
  <!-- Articles -->
  <section class="articles py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <div class="heading-institutes">

                    <h3 class="text-main-color font-weight-bold">المقالات</h3>
                    <p>تصفح جميع المقالات الخاصة بدراسة اللغة حول العالم</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <!-- Articles List -->
        <div class="row px-xl-4 mb-5">

            <div class="col-12">
                <div class="articles-list pt-4">

                    <div class="row">

                        @foreach($blogs as $blog)
                        <div class="col-xl-3 col-md-4 mb-5">
                            <!-- Article -->
                            <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 rounded-10">
                                    <a href="{{route('website.article',$blog->id)}}">
                                        <img src="{{$blog->banner == 'null' ? asset('storage/default_images.png') : asset($blog->banner)}}" alt="{{$blog->title_ar}}" class="card-img-top" />
                                    </a>
                                    <div class="card-body rounded-10 bg-white">
                                        <a href="{{route('website.article',$blog->id)}}"><h5 class="card-title text-main-color">{{$blog->title_ar}}</h5></a>
                                        <p class="mb-0">
                                            <span>{!! mb_substr($blog->content_ar ,0 , 150 , 'utf-8') !!} ... <a href="{{route('website.article',$blog->id)}}">المزيد</a></span>
                                        </p>
                                        <p class="mb-0"><span class="text-muted">{{ArabicDate($blog->created_at)}}</span></p>
                                    </div>
                                </div>
                            <!-- ./Article -->
                        </div>
                        @endforeach


                        
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Articles List -->
        <!-- Pagination -->
        <div class="row px-xl-5">
            <div class="col-12">
                <nav aria-label="Page navigation  ">
                    <div class="website-pagination">
                        {{ $blogs->links() }}
                    </div>
                </nav>
            </div>
        </div>
        <!-- ./Pagination -->
    </div>
</section>
<!-- ./Articles -->
@endsection







