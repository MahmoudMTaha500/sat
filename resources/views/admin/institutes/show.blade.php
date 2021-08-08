@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('institute.index')}}"> المعاهد</a></li>
                            <li class="breadcrumb-item active">{{$institute->name_ar}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div id="user-profile">
              <div class="row">
                <div class="col-12">
                  <div class="card profile-with-cover">
                    <div class="card-img-top img-fluid bg-cover height-300" style="background: url('{{$institute->banner == 'null' ? asset('storage/default_images.png') : asset($institute->banner)}}') 50%;"></div>
                    <div class="media profil-cover-details w-100">
                      <div class="media-left pl-2 pt-2">
                        <a href="#" class="profile-image">
                          <img src="{{$institute->logo == 'null' ? asset('storage/default_images.png') : asset($institute->logo)}}" class="rounded-circle img-border height-100"
                          alt="Card image">
                        </a>
                      </div>
                      <div class="media-body pt-3 px-2">
                        <div class="row">
                          <div class="col">
                            <h3 class="card-title">{{$institute->name_ar}}</h3>
                          </div>
                          <div class="col text-right">
                            <a href="{{route('institute.edit' , $institute->id)}}"> <button type="button" class="btn btn-primary"><i class="la la-cog"></i></button> </a>
                            <form action="{{route('institute.destroy' , $institute->id)}}" method="post"  class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('هل انت متاكد من حذف هذا المعهد')"> <i class="la la-trash"></i> </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <nav class="navbar navbar-light navbar-profile align-self-end">
                      <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                      aria-label="Toggle navigation"></button>
                      <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          
                        </div>
                  </div>
                  </nav>
                </div>
              </div>
            </div>
            <section id="timeline" class="timeline-center timeline-wrapper">
              <h3 class="page-title text-center">الدورات</h3>
              <ul class="timeline">
                <li class="timeline-line"></li>
                
                <li class="timeline-item block">
                  <div class="timeline-badge">
                    <a title="" data-context="inverse" data-container="body" class="border-silc" href="#"
                    data-original-title="block highlight"></a>
                  </div>
                  <div class="timeline-card card border-grey border-lighten-2">
                    <div class="card-header">
                      <div class="text-center">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">اسم الدورة</th>
                                    <th class="border-top-0">اسم المعهد</th>
                                    <th class="border-top-0">المدينة</th>
                                    <th class="border-top-0">عدد الطلابات</th>
                                    <th class="border-top-0">الحالة</th>
                                    <th class="border-top-0">اكشن</th>
                                </tr>
                            </thead>
                            <tbody>
                                <style></style>
                                @foreach($institute->courses as $course)
                                <tr>
                                    <td class="text-truncate">{{$course->name_ar}}</td>
                                    <td class="text-truncate">{{$course->institute->name_ar}}</td>
                                    <td class="text-truncate">{{$course->institute->city->name_ar}}</td>
                                    <td class="text-truncate">مقبول او مرفوض</td>
                                    <td class="text-truncate">5 طلابات</td>
                        
                                    <td>
                                        <a href="{{route('courses.edit',$course->id)}}" class="dropdown-item"><i class="la la-pencil"></i> تعديل</a>
                                        <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                                            @csrf @method('delete')
                                            <button href="" class="dropdown-item"><i class="la la-trash"></i> حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
             
            </section>

            
          </div>
    </div>
</div>

@endsection
