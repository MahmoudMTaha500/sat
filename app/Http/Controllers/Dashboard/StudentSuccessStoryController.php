<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\StudentSuccessStory;
use Illuminate\Http\Request;

class StudentSuccessStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $department_name = 'students';
        $page_name = 'sucess-story';
        $useVue = true;
           
        return view('admin.students.success_story',compact('department_name','page_name','useVue'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getstories(){
        $StudentSuccessStory =  StudentSuccessStory::with('student')->paginate(10);
        return response()->json(['StudentSuccessStory'=>$StudentSuccessStory]);
     }


     public function updateAprovement(Request $request){
        // echo "1111";  
        // dd($request->all());
            $institute = StudentSuccessStory::find($request->id);
            $institute->approvement = $request->approvment;
            $institute->save();
            
    //    return     session()->flash('alert_message', ['message' => 'تم تعديل الحاله بنجاح', 'icon' => 'success']);
       
      }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentSuccessStory  $studentSuccessStory
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSuccessStory $studentSuccessStory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentSuccessStory  $studentSuccessStory
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentSuccessStory $studentSuccessStory,$id)
    {
         $story = StudentSuccessStory::find($id);
         $department_name = 'students';
         $page_name = 'sucess-story';
         $useVue = true;
         return view('admin.students.edit_success',compact('department_name','page_name','useVue','story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentSuccessStory  $studentSuccessStory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSuccessStory $studentSuccessStory)
    {
        // dd($request->all());
        $story = StudentSuccessStory::find($request->id);
        $story->story = $request->story;
        $story->save();
        session()->flash('alert_message',['message'=>'تم تعديل القصه ','icon'=>"success"]);
        return redirect()->route('success-story.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentSuccessStory  $studentSuccessStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentSuccessStory $studentSuccessStory)
    {
        //
    }
}
