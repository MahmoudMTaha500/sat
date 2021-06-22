@extends('admin.app')
 @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم التاشيرات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">التاشيرات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <visa-component
                :get_visa="{{ json_encode(route('simple-visa.get')) }}"
                :aprove_route="{{json_encode(url('/dashboard/update-blog-aprovement'))}}"
                :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                :csrftoken="{{ json_encode(csrf_token()) }}"

                :create="{{  json_encode(auth()->user()->hasPermission('articals-create') )}}"
                :edit="{{  json_encode(auth()->user()->hasPermission('articals-update') )}}"
                :delete_pre="{{  json_encode(auth()->user()->hasPermission('articals-delete') )}}"

            >

            </visa-component>
        </div>
    </div>
</div>
@endsection
