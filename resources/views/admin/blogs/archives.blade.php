@extends('admin.app') @section('admin.content') 
{{$department_name='blogs'}} 
{{$page_name='archive-blog'}}

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المقالات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المقالات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">المعاهد ({{count($Blogs)}})</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="route_create"> <i class="ft-plus ft-md"></i> اضافة معهد جديد</a>
                                </li>
                            </ul>

                            <!-- Modal -->
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                          <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">العنوان</th>
                                    <th class="border-top-0">الكاتب</th>
                                    <th class="border-top-0">التصنيف</th>
                                    <th class="border-top-0">المعهد</th>
                                    <th class="border-top-0">الدوله</th>
                                    <th class="border-top-0">المدينه</th>

                                    <th class="border-top-0">التعليقات</th>
                                    <th class="border-top-0">التاريخ</th>
                                    <th class="border-top-0">اكشن</th>
                                </tr>
                            </thead>
                            <tbody>  
                              @foreach($Blogs as $blog)
                                <tr v-for="blog in blogs.data" :key="blog.id">
                                    <td>{{$blog->title_ar}}</td>
                                    <td>{{$blog->creator->name}}</td>
                                    <td>{{$blog->category->name_ar}}</td>
                                    <td>{{$blog->institute->name_ar}}</td>
                                    <td>{{$blog->country->name_ar}}</td>
                                    <td>{{$blog->city->name_ar}}</td>

                                    
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" class="btn btn-outline-info btn-sm round">حالي</a>
                                            <a href="" class="btn btn-outline-success btn-sm round">جديد</a>
                                        </div>
                                    </td>
                                    <td>{{$blog->created_at}}</td>
                                  
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('dashboard/blogs/restor/'.$blog->id)}}" class="btn btn-info btn-sm round">استعاده</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
