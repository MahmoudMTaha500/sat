<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employees\EmployeesRequest;
use App\User;
use App\Models\Permission;

class EmployeesController extends Controller
{
    public function index()
    {
        $department_name = 'employees';
        $page_name = 'employees';
        $page_title = 'الموظفين';
        $users = User::latest('id')->paginate(10);
       
        return view('admin.employees.index',compact('department_name','page_name','page_title','users'));
    }
    public function create()
    {
        $department_name = 'employees';
        $page_name = 'add-employees';
        $page_title = 'الموظفين';

        return view('admin.employees.create',compact('department_name','page_name','page_title'));
    }

    public function store(EmployeesRequest $request)
    {
        $admin = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => bcrypt("$request->password"),
        ]);
        if($request->role =="admin"){
        $admin->attachRole($request->role);
        } else{
        $admin->attachRole($request->role);
        $admin->attachPermissions($request->permession);
        }
        session()->flash('alert_message',['message'=>'تم اضافه الموظف بنجاح ','icon'=>'success']); 
        return back();
    }

 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user =User::find($id);
        $department_name = 'employees';
        $page_name = 'employees';
        $page_title = 'الموظفين';

        return view('admin.employees.edit',compact('department_name','page_name','page_title','user'));
    }

    public function update(Request $request, $id)
    {

        $admin = User::find($id);
        $admin->name =  $request->name;
        $admin->email =  $request->email;
        if($request->password){
            $admin->password =  bcrypt("$request->password");
            }
        if($request->role =="admin"){
        $per = \DB::table('permission_user')->where('user_id',$id)->delete();
        $role = \DB::table('role_user')->where('user_id',$id)->delete();
        $admin->attachRole($request->role);
        } else{
        $role = \DB::table('role_user')->where('user_id',$id)->delete();
        $per = \DB::table('permission_user')->where('user_id',$id)->delete();
        $admin->attachRole($request->role);
        $admin->attachPermissions($request->permession);
        }
        $admin->save();

        session()->flash('alert_message',['message'=>'تم تعديل الموظف بنجاح ','icon'=>'success']); 
        return back();
    }


    public function destroy($id)
    {
        //
    }
}
