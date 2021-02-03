<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\institute\StoreInstituteRequest;
use App\Models\Country;
use App\Models\Institute;
use App\Models\InstituteQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InstituteController extends Controller
{

    public function index()
    {
        $institutes = Institute::paginate(10);

        return view('admin.institutes.index', compact('institutes'));

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
        //  dd($validate_images);

        $pannerObject = $validated['panner'];
        $PannerName = time() . $pannerObject->getClientOriginalName();
        $pathPanner = public_path("\storage\institute\banners");

        $request->panner->move($pathPanner, $PannerName);

        $pannerNamePath = "storage/institute/banners" . '/' . $PannerName;
        //   dd($pannerNamePath);

        $institute = Institute::create([
            "name_ar" => $request->name_ar,
            "about_ar" => $request->about_ar,
            "country_id" => $request->country_id,
            "city_id" => $request->city_id,
            "logo" => $logoNamePath,
            "banner" => $pannerNamePath,
            "creator_id" => 1,
            "sat_rate" => 1,
            "rate_switch" => 1,
            "active" => 1,
            "approvment" => 1,

        ]);

        $institute_id = $institute->id;
        $questions = $request->questionList;

        foreach ($questions as $question) {
            //    dump( $question['questions']);
            InstituteQuestion::create([
                'institute_id' => $institute_id,
                'question' => $question['questions'],
                'answer' => $question['answer'],
            ]);
        }
        session()->flash('alert_message', ['message' => 'تم اضافة المعهد بنجاح', 'icon' => 'success']);
        return redirect()->route('institute.index');
    }

    public function show(Institute $institute)
    {
        //
    }

    public function edit(Institute $institute)
    {
        $institute = Institute::find($institute->id);
        $questions = InstituteQuestion::where(['institute_id' => $institute->id])->get();
// dd($institute);
        $department_name = 'institutes';
        $page_name = 'add-institute';
        $countries = Country::all();
        $useVue = true;
        return view('admin.institutes.edit', compact('useVue', 'department_name', 'page_name', 'countries', 'institute', 'questions'));

    }

    public function update(Request $request, Institute $institute)
    {

        dd($request->all());
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
            //    dump( $question['questions']);
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
        //
    }
}
