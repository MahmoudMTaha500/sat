@extends('admin.app') @section('admin.content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الموظفين</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الموظفين</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <div class="row">
                <div id="recent-transactions" class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> الموظفين (12)</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                            href="/sat/employees/create.php" > <i class="ft-plus ft-md"></i> اضافة موظف جديد</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                          <thead>
                            <tr>
                              <th class="border-top-0">اسم الموظف</th>
                              <th class="border-top-0">البريد الإلكتروني </th>
                              <th class="border-top-0">قسم الوظف</th>
                              <th class="border-top-0">اكشن</th>
                            </tr>
                          </thead>
                          <tbody>
                            <style>
                             
      
                            </style>
                            @foreach($users as $user)
                            <tr>
                              <td class="text-truncate"> {{$user->name}} </td>
                              <td class="text-truncate">{{$user->email}}</td>
                              <td class="text-truncate">{{$user->roles[0]->name}} </td>

                              <td>
                                <a href="{{route('employees.edit',$user->id)}}" class="dropdown-item"><i class="la la-pencil"></i> تعديل</a>

                          
                              </td>
                            </tr>
                            @endforeach
                            
                           
                            
                          </tbody>
                        </table>
                        {{$users->links() }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
        </div>
    </div>
</div>
@endsection







