@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المقالات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المقالات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <blog-index-component
                :get_blogs_url="{{ json_encode(route('get_blogs_by_vue')) }}"
                :aprove_route="{{json_encode(url('/dashboard/update-blog-aprovement'))}}"
                :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                :csrftoken="{{ json_encode(csrf_token()) }}"
                :users="{{ json_encode($users) }}"
                :categories="{{ json_encode($categories) }}"

                :create="{{  json_encode(auth()->user()->hasPermission('articals-create') )}}"
                :edit="{{  json_encode(auth()->user()->hasPermission('articals-update') )}}"
                :delete_pre="{{  json_encode(auth()->user()->hasPermission('articals-delete') )}}"

            >

            </blog-index-component>
        </div>
    </div>
</div>
@endsection
