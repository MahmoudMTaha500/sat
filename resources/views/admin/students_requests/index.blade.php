@extends('admin.app') @section('admin.content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الطلبات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الطلبات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">


            <student-request-component
            update_classat_note_route = "{{  route('update_classat_note') }}"
            :course_url="{{json_encode(url('/dashboard/getcourses'))}}"
            :student_request_url="{{json_encode(url('/dashboard/student-requests/getStudentRequests'))}}"
            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"   
            :countries_from_blade="{{ json_encode($countries) }}"
            :institutes="{{ json_encode($institutes) }}"
            :csrftoken="{{ json_encode(csrf_token()) }}"
            :create="{{  json_encode(auth()->user()->hasPermission('student-requests-create') )}}"
            :edit="{{  json_encode(auth()->user()->hasPermission('student-requests-update') )}}"
            :delete_pre="{{  json_encode(auth()->user()->hasPermission('student-requests-delete') )}}"
            :get_courses_url="{{ json_encode(route('blog.get.courses.vue')) }}"
            :get_institutes_url="{{ json_encode(route('blog.get.institutes.vue')) }}"

            ></student-request-component>
            <!-- Recent Transactions -->
       
            {{-- {{$courses->links()}} --}}
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection







