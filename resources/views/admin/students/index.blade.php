@extends('admin.app') @section('admin.content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الطلاب</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الطلاب</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">


            <student-component
            :student_url="{{json_encode(url('/dashboard/students'))}}"
            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"   
          
            :csrftoken="{{ json_encode(csrf_token()) }}"

            :create="{{  json_encode(auth()->user()->hasPermission('students-create') )}}"
            :edit="{{  json_encode(auth()->user()->hasPermission('students-update') )}}"
            :delete_pre="{{  json_encode(auth()->user()->hasPermission('students-delete') )}}"

            ></student-component>
            <!-- Recent Transactions -->
       
            {{-- {{$courses->links()}} --}}
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection







