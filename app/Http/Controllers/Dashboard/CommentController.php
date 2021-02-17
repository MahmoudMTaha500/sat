<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $comments =  Comment::where(['element_type'=>"institute"])->paginate(10);
           
        $department_name = 'comment';
        $page_name = 'comment';
        $useVue = true;

  return  view("admin.institutes.comments.index", compact( 'useVue','comments','department_name','page_name'));
    }


    /********************************* */
    /********************************* */
    /********************************* */
     public function getcomment()
     {
    
        $comments =  Comment::where(['element_type'=>"institute"])->with('institute','student')->get();

         return response()->json(['comments'=>$comments]);

     }

    /********************************* */
    /********************************* */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
              $comment = Comment::find($id);
              $department_name = 'comment';
              $page_name = 'comment';
      
        return  view("admin.institutes.comments.edit", compact('comment','department_name','page_name'));
              
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();
        session()->flash("alert_message",["message"=>'تم تعديل التعليق',"icon"=>"success"]);
          return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateAprovement(Request $request){
        // echo "1111";  
        // dd($request->all());
            $institute = Comment::find($request->comment_id);
            $institute->approvement = $request->approvment;
            $institute->save();
            
    //    return     session()->flash('alert_message', ['message' => 'تم تعديل الحاله بنجاح', 'icon' => 'success']);
       
      }

}
