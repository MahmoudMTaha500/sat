<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\InstituteQuestion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use function GuzzleHttp\Promise\inspect;

class InstituteController extends Controller
{

    public function index()
    {
        $institutes = Institute::paginate(10);
        

        return view('admin.institutes.index',['institutes' => $institutes]);
        
    }


    public function create(Request $request)
    {
        $department_name='institutes';
        $page_name='add-institute';
        $countries = Country::all();
        return view('admin.institutes.create' , compact('department_name' , 'page_name' , 'countries'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

         $validate_images =  $request->validate([

            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'panner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $logoObject = $validate_images['logo'];
        $logoName =  time() . $logoObject->getClientOriginalName();
        $pathLogo =  public_path("\storage\institute\logos");
       $request->logo->move($pathLogo,$logoName);

         $logoNamePath = "storage/institute/logos".'/'.$logoName;  
        //  dd($validate_images);

         $pannerObject = $validate_images['panner'];
         $PannerName =  time() . $pannerObject->getClientOriginalName();
         $pathPanner =  public_path("\storage\institute\banners");

        $request->panner->move($pathPanner,$PannerName);
 
          $pannerNamePath = "storage/institute/banners".'/'.$PannerName;  
        //   dd($pannerNamePath);

      $institute =  Institute::create([
            "name_ar"=>$request->name_ar,  
            "about_ar"=>$request->about_ar,  
            "country_id"=>$request->country_id,  
            "city_id"=>$request->city_id,  
            "logo"=>$logoNamePath,  
            "banner"=>$pannerNamePath,  
            "creator_id"=>1,  
            "sat_rate"=>1,  
            "rate_switch"=>1,  
            "active"=>1,  
            "approvment"=>1,  
          
  
          ]);
  
          $institute_id = $institute->id;
          $questions = $request->questionList;

           foreach($questions as $question){
            //    dump( $question['questions']);
            InstituteQuestion::create([
                   'institute_id'=>  $institute_id,
                   'question'=>  $question['questions'],
                   'answer'=>  $question['answer'],
               ]);
           }
           return back()->with('success','تم اضافة المعهد '); 
           
    }


    public function show(Institute $institute)
    {
        //
    }


    public function edit(Institute $institute)
    {
       $institute = Institute::find($institute->id);
       $questions = InstituteQuestion::where(['institute_id'=>$institute->id])->get();
// dd($institute);
        $department_name='institutes';
        $page_name='add-institute';
        $countries = Country::all();
        return view('admin.institutes.edit' , compact('department_name' , 'page_name' , 'countries','institute','questions'));

    }

    public function update(Request $request, Institute $institute)
    {
        // "name_ar"=>$request->name_ar,  
        // "about_ar"=>$request->about_ar,  
        // "country_id"=>$request->country_id,  
        // "city_id"=>$request->city_id,  
        // "logo"=>$logoNamePath,  
        // "banner"=>$pannerNamePath,  
        // "creator_id"=>1,  
        // "sat_rate"=>1,  
        // "rate_switch"=>1,  
        // "active"=>1,  
        // "approvment"=>1,  

        // dd($request->all());
        $institute = Institute::find($institute->id);
       $institute->name_ar = $request->name_ar;
       $institute->about_ar = $request->about_ar;
       $institute->country_id = $request->country_id;
       $institute->city_id = $request->city_id;

          if($request->logo ){
            $validate_images =  $request->validate([

                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
             
                
        $logoObject = $validate_images['logo'];
        $logoName =  time() . $logoObject->getClientOriginalName();
        $pathLogo =  public_path("\storage\institute\logos");
        // File::delete($institute->logo);
        File::delete($institute->logo) ;
        //  dd( Storage::delete(asset("$institute->logo")) );
        // if(Storage::disk('public')->exists($institute->logo)){
        //     Storage::disk('public')->delete($institute->logo);
        // }
       $request->logo->move($pathLogo,$logoName);

         $logoNamePath = "storage/institute/logos".'/'.$logoName; 

       $institute->logo =  $logoNamePath;

          }


          if($request->panner ){
            $validate_images =  $request->validate([

                'panner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            
         $pannerObject = $validate_images['panner'];
         $PannerName =  time() . $pannerObject->getClientOriginalName();
         $pathPanner =  public_path("\storage\institute\banners");
         File::delete($institute->logo) ;
     
        $request->panner->move($pathPanner,$PannerName);
 
          $pannerNamePath = "storage/institute/banners".'/'.$PannerName;  
       $institute->banner =  $pannerNamePath;

        }
         


       $questions = $request->questionList;
       InstituteQuestion::where(["institute_id"=>$institute->id])->delete();    

       foreach($questions as $question){
        //    dump( $question['questions']);
        InstituteQuestion::create([
               'institute_id'=>  $institute->id,
               'question'=>  $question['questions'],
               'answer'=>  $question['answer'],
           ]);
       }
       $institute->save();

       return back()->with('success','تم تعديل المعهد '); 

      

    }

 
    public function destroy(Institute $institute)
    {
        //
    }
}
