<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Visa;
use App\Models\Country;
use App\Models\VisaCategory;
use App\Models\VisaQuestion;
use App\Models\VisaQuestionChoices;
use Illuminate\Http\Request;

class VisaController extends Controller
{

    public function index()
    {
        $visas = Visa::latest('id')->get();
       $department_name='visa';
        $page_name='visa';
        $page_title = ' التاشيرات';

        return view('admin.visas.index' , compact('department_name' , 'page_name','visas','page_title'));
    }

 
    public function create()
    {
        $countries = Country::latest('id')->get();
        $visaCategory = VisaCategory::latest('id')->get();
        $department_name='visa';
        $page_name='add-visa';
        $page_title = ' التاشيرات';

        return view('admin.visas.create' , compact('department_name' , 'page_name','countries','visaCategory','page_title'));
    }

    public function store(Request $request)
    {

        $visa = Visa::create([
            'category_id'=>$request->category_id,
            'country_id'=>$request->country_id,
            'price'=>$request->price,
            'approvement'=>1,
            'active'=>1,
            'creator_id'=>auth()->user()->id,
            ]);
      $countArray = count($request->priority);
            for($x=0; $x<$countArray;$x++ ){
              $priority=$request->priority[$x];
              $visa_question_type=$request->visa_question_type[$x];
              $visa_question=$request->visa_question[$x];
              $VisaQuestion = new VisaQuestion;
              $VisaQuestion->priority=$priority;
              $VisaQuestion->field_type=$visa_question_type;
              $VisaQuestion->question_ar=$visa_question;
              $VisaQuestion->visa_id = $visa->id;
              $VisaQuestion->save();
              if($request->visa_question_select[$x] != null){
              $choice = $request->visa_question_select[$x];
                $choiceArray =  explode( ',', $choice );
                 foreach($choiceArray as $choiceValue){
                    $VisaQuestionChoices = new VisaQuestionChoices;
                    $VisaQuestionChoices->question_id=$VisaQuestion->id;
                    $VisaQuestionChoices->choice_ar=$choiceValue;
                    $VisaQuestionChoices->save();

                 }
              }
            }
           return back()->with('success','تم حفظ التاشيرة');
    }


    public function show(Visa $visa)
    {
        $department_name='visa';
        $page_name='visa';
        $page_title = ' التاشيرات';

        return view('admin.visas.index' , compact('department_name' , 'page_name','page_title'));
    }


    public function edit(Visa $visa)
    {
        $visa = Visa::find($visa->id);
        $countries = Country::latest('id')->get();
        $visaCategory = VisaCategory::latest('id')->get();
        $VisaQuestion = VisaQuestion::latest('id')->where(['visa_id'=>$visa->id])->with('question_choices')->get();
        $page_title = ' التاشيرات';
    

         $department_name='visa';
        $page_name='edit-visa';
        return view('admin.visas.edit' , compact('department_name' , 'page_name','visa','countries','visaCategory','VisaQuestion' ,'page_title'));
    }


    public function update(Request $request, Visa $visa)
    {
        
        $UpdateVisa = Visa::where(['id'=>$visa->id])->update([
        'category_id'=>$request->category_id,
        'country_id'=>$request->country_id,
        'price'=>$request->price,
        'approvement'=>1,
        'active'=>1,
        'creator_id'=>auth()->user()->id,
        ]);
        $VisaQuestion =  VisaQuestion::latest('id')->where(['visa_id'=>$visa->id])->get();

          foreach($VisaQuestion as $question){
                    if($question->field_type == 'select') {
                        $VisaQuestionChoices = VisaQuestionChoices::where(['question_id'=>$question->id])->delete(); 
                    }
                    $question->delete();
          }
  $countArray = count($request->priority);
        for($x=0; $x< $countArray ;$x++ ){

          $priority=$request->priority[$x];
          $visa_question_type=$request->visa_question_type[$x];
          $visa_question=$request->visa_question[$x];
          $VisaQuestion = new VisaQuestion;
          $VisaQuestion->priority=$priority;
          $VisaQuestion->field_type=$visa_question_type;
          $VisaQuestion->question_ar=$visa_question;
          $VisaQuestion->visa_id = $visa->id;
          $VisaQuestion->save();

          if($request->visa_question_select[$x] != null){
            $choice = $request->visa_question_select[$x];
              $choiceArray =  explode( ',', $choice );
               foreach($choiceArray as $choiceValue){
                  $VisaQuestionChoices = new VisaQuestionChoices;
                  $VisaQuestionChoices->question_id=$VisaQuestion->id;
                  $VisaQuestionChoices->choice_ar=$choiceValue;
                  $VisaQuestionChoices->save();

               }
            }
         
        
        } 
       return back()->with('success','تم تعديل التاشيرة');
    }


    public function destroy(Visa $visa)
    {
        $VisaDelete = Visa::find($visa->id);
       
          $VisaQuestion =  VisaQuestion::latest('id')->where(['visa_id'=>$visa->id])->get();
          foreach($VisaQuestion as $question){
                    if($question->field_type == 'select') {
                        $VisaQuestionChoices = VisaQuestionChoices::where(['question_id'=>$question->id])->delete(); 
                    }
                    $question->delete();

          }
                  $VisaDelete->delete();
        return back()->with('error','تم مسح التاشيرة');
    }
}
