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
                        <div class="col-xl-3 col-md-4">
                            <!-- Article -->
                            <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                <!-- Article Img -->
                                <img src="{{asset($blog->banner)}}" class="card-img-top" alt="...">
                                <!-- ./Article Img -->
                                <div class="card-body rounded-10  bg-white ">
                                    <!-- Article Title -->
                                    <h5 class="card-title "><a href="{{route('website.article',$blog->id)}}" class="text-main-color"> {{$blog->title_ar  }}</a></h5>
                                    <!-- ./Article Title -->
                                    <!-- Article Options -->
                                    <small class="text-muted "><span class="pl-2"> <i class="fas fa-eye"></i>
                                            1.3k</span>
                                        <span><i class="fas fa-clock"></i> نشر منذ{{  ArabicDate($blog->created_at)}} </span></small>
                                    <!-- ./Article Options -->
                                    <!-- Article description -->
                                    <p class="mt-3">
                                        {!! substr($blog->content_ar,0,50) !!}
                                        ...</p>
                                    <!-- ./Article description -->

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
                    <ul class="pagination d-flex justify-content-end">

                        <li class="page-item  active"><a class="page-link rounded-10 mx-1 text-dark border-0"
                                href="#">1</a></li>
                        <li class="page-item "><a class="page-link rounded-10 mx-1 text-dark border-0"
                                href="#">2</a></li>
                        <li class="page-item "><a class="page-link rounded-10 mx-1 text-dark border-0"
                                href="#">3</a></li>
                        <li class="page-item "><a class="page-link rounded-10 mx-1 text-dark border-0" href="#"><i
                                    class="fas fa-chevron-left"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- ./Pagination -->
    </div>
</section>
<!-- ./Articles -->
@endsection







