@extends('admin.app')
@section('admin.content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">لوحة التحكم</h3>
                </div>
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الطلبات</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
