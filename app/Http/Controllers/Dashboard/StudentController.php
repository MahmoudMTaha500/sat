<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $department_name = 'students';
        $page_name = 'students';
        $useVue = true;
        $page_title = 'الطلاب';
           
        return view('admin.students.index',compact('department_name','page_name','useVue' ,'page_title'));
            
    }


    public function getStudents(){
        // dd(11);  
            $students =  Student::with('country','city')->paginate(10);
            return response()->json(['students'=>$students]);
    }


   public function filter(Request $request){
//    dd($request->all());
$name= $request->name;
// dd($name);
   $students = new Student();

   if ($name != null) {
       $students = $students->where("name", 'LIKE', "%{$name}%");
   }
   $students = $students->with('country', 'city')->paginate(10);
   return response()->json(['students' => $students]);


   }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Student $student)
    {
        //
    }


    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }


    public function destroy(Student $student)
    {
        //
    }
}
