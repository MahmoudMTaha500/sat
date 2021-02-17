<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\institute\StoreInstituteRequest;
use App\Models\Country;
use App\Models\Institute;
use App\Models\InstituteRate;
use App\Models\InstituteQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InstituteController extends Controller
{

    public function index(Request $request)
    {
        $institutes = Institute::with('country', 'city')->paginate(5);
        $useVue = true;
        $countries = Country::all();

        if ($request->has('type')) {
            if ($request->type == 'vue_request') {
                return response()->json(['institutes' => $institutes, 'countries' => $countries]);
            }
        }

        return view('admin.institutes.index', ['institutes' => $institutes, "useVue" => $useVue, 'countries' => $countries]);
    }
    public function getInstitues(Request $request)
    {

<<<<<<< HEAD
        $institutes = Institute::with('country', 'city')->paginate(5);
        return response()->json(['institutes' => $institutes]);
=======
        $institutes = Institute::with('country','city')->paginate(10);
        // dd($institutes);
             
        return response()->json(['institutes' => $institutes]); 
>>>>>>> 6483a93a4c3f585863e859c78bbd5f11708bca71

    }

    public function create()
    {

        $department_name = 'institutes';
        $page_name = 'add-institute';
        $countries = Country::all();
        $useVue = true;
        return view('admin.institutes.create', compact('useVue', 'department_name', 'page_name', 'countries'));
    }

    public function store(StoreInstituteRequest $request)
    {
        $validated = $request->validated();
        $logoObject = $validated['logo'];
        $logoName = time() . $logoObject->getClientOriginalName();
        $pathLogo = public_path("\storage\institute\logos");
        $request->logo->move($pathLogo, $logoName);

        $logoNamePath = "storage/institute/logos" . '/' . $logoName;

        $pannerObject = $validated['panner'];
        $PannerName = time() . $pannerObject->getClientOriginalName();
        $pathPanner = public_path("\storage\institute\banners");

        $request->panner->move($pathPanner, $PannerName);

        $pannerNamePath = "storage/institute/banners" . '/' . $PannerName;
        $slug = str_replace(' ', '-', $request->name_ar);

<<<<<<< HEAD
        $InstituteExists = Institute::where(['country_id' => $request->country_id, "name_ar" => $request->name_ar, "city_id" => $request->city_id,
        ])->get();
        if (!empty($InstituteExists)) {

            $institute = Institute::create([
                "name_ar" => $request->name_ar,
                "slug" => $slug,
                "about_ar" => $request->about_ar,
                "country_id" => $request->country_id,
                "city_id" => $request->city_id,
                "logo" => $logoNamePath,
                "banner" => $pannerNamePath,
                "creator_id" => 1,
                "sat_rate" => 1,
                "rate_switch" => 1,
                "active" => 1,
                "approvement" => 1,
=======
            
   $InstituteExists = Institute::where(['country_id'=>$request->country_id,   "name_ar" => $request->name_ar,  "city_id" => $request->city_id,
   ])->first();
      if( empty($InstituteExists) ){

            $institute = Institute::create([
            "name_ar" => $request->name_ar,
            "slug" => $slug,
            "about_ar" => $request->about_ar,
            "country_id" => $request->country_id,
            "city_id" => $request->city_id,
            "logo" => $logoNamePath,
            "banner" => $pannerNamePath,
            "creator_id" => 1,
            "sat_rate" => 1,
            "rate_switch" => 1,
            "active" => 1,
            "approvement" => 1,
>>>>>>> 6483a93a4c3f585863e859c78bbd5f11708bca71

            ]);

            $institute_id = $institute->id;
            $questions = $request->questionList;

            foreach ($questions as $question) {
                InstituteQuestion::create([
                    'institute_id' => $institute_id,
                    'question' => $question['questions'],
                    'answer' => $question['answer'],
                ]);
            }
            session()->flash('alert_message', ['message' => 'تم اضافة المعهد بنجاح', 'icon' => 'success']);
            return redirect()->route('institute.index');

        } else {

            session()->flash('alert_message', ['message' => ' هذا المعهد موجود بالفعل ', 'icon' => 'error']);
            return redirect()->route('institute.index');

        }

    }

    public function show(Institute $institute)
    {
        $department_name = 'institutes';
        $page_name = 'add-institute';
        return view('admin.institutes.show', compact('department_name', 'page_name', 'institute'));
    }

    public function edit(Institute $institute)
    {
        $institute = Institute::find($institute->id);
        $questions = InstituteQuestion::where(['institute_id' => $institute->id])->get();
        $department_name = 'institutes';
        $page_name = 'add-institute';
        $countries = Country::all();
        $useVue = true;
        return view('admin.institutes.edit', compact('useVue', 'department_name', 'page_name', 'countries', 'institute', 'questions'));

    }

    public function update(Request $request, Institute $institute)
    {

        $institute = Institute::find($institute->id);
        $institute->name_ar = $request->name_ar;
        $institute->about_ar = $request->about_ar;
        $institute->country_id = $request->country_id;
        $institute->city_id = $request->city_id;

        if ($request->logo) {
            $validate_images = $request->validate([

                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $logoObject = $validate_images['logo'];
            $logoName = time() . $logoObject->getClientOriginalName();
            $pathLogo = public_path("\storage\institute\logos");
            File::delete($institute->logo);
            $request->logo->move($pathLogo, $logoName);

            $logoNamePath = "storage/institute/logos" . '/' . $logoName;

            $institute->logo = $logoNamePath;

        }

        if ($request->panner) {
            $validate_images = $request->validate([

                'panner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $pannerObject = $validate_images['panner'];
            $PannerName = time() . $pannerObject->getClientOriginalName();
            $pathPanner = public_path("\storage\institute\banners");
            File::delete($institute->logo);

            $request->panner->move($pathPanner, $PannerName);

            $pannerNamePath = "storage/institute/banners" . '/' . $PannerName;
            $institute->banner = $pannerNamePath;

        }

        $questions = $request->questionList;
        InstituteQuestion::where(["institute_id" => $institute->id])->delete();

        foreach ($questions as $question) {
            InstituteQuestion::create([
                'institute_id' => $institute->id,
                'question' => $question['questions'],
                'answer' => $question['answer'],
            ]);
        }
        $institute->save();
        session()->flash('alert_message', ['message' => 'تم تعديل المعهد بنجاح', 'icon' => 'success']);
        return back();

    }

    public function destroy(Institute $institute)
    {
        InstituteRate::where('institute_id' , $institute->id)->delete();
        $institute->delete();
        session()->flash('alert_message', ['message' => 'تم مسح المعهد بنجاح', 'icon' => 'error']);
        return back();

    }
    /************************************************************** */

    public function archive(Request $request)
    {

        $institutes = Institute::onlyTrashed()->get();
        return view('admin.institutes.archives', ['institutes' => $institutes]);

    }
    /************************************************************** */

    public function restor(Request $request, $id)
    {
        $restor = Institute::where(['id' => $id])->restore();
        session()->flash('alert_message', ['message' => 'تم ارجاع المعهد بنجاح', 'icon' => 'success']);
        return back();

<<<<<<< HEAD
    }
    /************************* */
    public function updateAprovement(Request $request)
    {
        $institute = Institute::find($request->institute_id);
        $institute->approvement = $request->approvement;
        $institute->save();
    }
    public function filter(Request $request)
    {
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $name_ar = $request->name_ar;
        if ($request->country_id && $city_id) {
            $institute = Institute::where(['country_id' => $request->country_id, 'city_id' => $city_id])->where("name_ar", 'LIKE', "%{$request->name_ar}%")->with('country', 'city')->paginate(5);
            return response()->json(['institute' => $institute]);
        } elseif ($country_id && $name_ar) {
            $institute = Institute::where(['country_id' => $request->country_id])->where("name_ar", 'LIKE', "%{$request->name_ar}%")->with('country', 'city')->paginate(5);
            return response()->json(['institute' => $institute]);
        } elseif ($name_ar) {
            $institute = Institute::where("name_ar", 'LIKE', "%{$request->name_ar}%")->with('country', 'city')->paginate(5);
            return response()->json(['institute' => $institute]);
        } elseif ($country_id) {
            $institute = Institute::where(['country_id' => $request->country_id])->with('country', 'city')->paginate(5);
            return response()->json(['institute' => $institute]);
=======
        }
    /************************* */ 
      public function updateAprovement(Request $request){
            $institute = Institute::find($request->institute_id);
            $institute->approvment = $request->approvment;
            $institute->save();
      }
      public function filter(Request $request){
          $country_id=$request->country_id;
          $city_id=$request->city_id;
          $name_ar=$request->name_ar;
          if($request->country_id && $city_id){
                $institute = Institute::where(['country_id'=>$request->country_id , 'city_id'=>$city_id])->where("name_ar",'LIKE',"%{$request->name_ar}%")->with('country','city')->paginate(10);
                return response()->json(['institute'=>$institute]);
        }elseif($country_id && $name_ar){
                $institute = Institute::where(['country_id'=>$request->country_id ])->where("name_ar",'LIKE',"%{$request->name_ar}%")->with('country','city')->paginate(10);
                return response()->json(['institute'=>$institute]);
          }  elseif($name_ar){
                $institute = Institute::where("name_ar",'LIKE',"%{$request->name_ar}%")->with('country','city')->paginate(10);
                return response()->json(['institute'=>$institute]);
          } elseif($country_id){
                $institute = Institute::where(['country_id'=>$request->country_id ])->with('country','city')->paginate(10);
                return response()->json(['institute'=>$institute]);

          }
      }

>>>>>>> 6483a93a4c3f585863e859c78bbd5f11708bca71

        }
    }

}
