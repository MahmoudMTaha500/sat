@extends('admin.app') @section('admin.content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الدورات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الدورات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">


            <courses-component
            :get_courses_url="{{json_encode(url('/dashboard/getcourses'))}}"
            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"   
            :public_url="{{ json_encode(url('/')) }}"

            :countries_from_blade="{{ json_encode($countries) }}"
            :institutes="{{ json_encode($institutes) }}"
            :csrftoken="{{ json_encode(csrf_token()) }}"

            :create="{{  json_encode(auth()->user()->hasPermission('courses-create') )}}"
            :edit="{{  json_encode(auth()->user()->hasPermission('courses-update') )}}"
            :delete_pre="{{  json_encode(auth()->user()->hasPermission('courses-delete') )}}"
            ></courses-component>
            <!-- Recent Transactions -->
       
            {{-- {{$courses->links()}} --}}
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection







