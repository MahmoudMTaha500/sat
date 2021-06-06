<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\services\InsurancesRequest;
use App\Models\Institute;
use App\Models\Insurances;
use App\Models\Country;
use Illuminate\Http\Request;

class InsurancesController extends Controller
{

    public function index()
    {
        $department_name = 'services';
        $page_name = 'insurances';
        $useVue = true;
        $institutes = Institute::get();
       $page_title = 'التامينات';


        return view("admin.insurances.index", compact('department_name', 'page_name', 'useVue', 'institutes' ,'page_title'));
    }

    public function getInsurances()
    {
        $insurances = Insurances::with('institute' , 'institute.city' , 'institute.country')->paginate(10);
        return response()->json(['insurances' => $insurances]);
    }

    public function create()
    {
        $Institutes = Institute::get();
        //
        $department_name = 'services';
        $page_name = 'add-insurances';
        $page_title = 'التامينات';
        $useVue = true;
        $countries = Country::all();

        return view("admin.insurances.create", compact('department_name', 'page_name', 'Institutes','page_title' , 'countries' , 'useVue'));
    }

    public function store(InsurancesRequest $request)
    {
        // dd($request->all());
        $insurances = Insurances::create([
            'weeks' => $request->weeks,
            'institute_id' => $request->institute_id,
            'price' => $request->price,
        ]);
        // session()->flash('alert_message', ['message' => 'تم اضافه الدورة بنجاح', 'icon' => 'success']);

        session()->flash('alert_message', ['message' => "تم اضافه الخدمه بنجاح", 'icon' => 'success']);
        return redirect()->route('insurances.index');
    }

    public function show(Insurances $Insurances)
    {
        //
    }

    public function edit($id)
    {
        // // $insurances = Insurances::where('id' , 1)->get()[0];
        // $Institutes = institute::get();
        // $department_name = 'insurances';
        // $page_name = 'insurances';
        // return view("admin.insurances.edit", compact('department_name', 'page_name', 'Institutes'));
    }
    public function editInsuarnce($id)
    {

        $insurance = Insurances::find($id);
        $Institutes = Institute::get();
        $department_name = 'services';
        $page_name = 'insurances';
       $page_title = 'التامينات';

        return view("admin.insurances.edit", compact('department_name', 'page_name', 'Institutes', 'insurance','page_title'));
    }

    public function update(InsurancesRequest $request, Insurances $Insurances)
    {
        $insurance = Insurances::find($request->id);
        $insurance->weeks = $request->weeks;
        $insurance->institute_id = $request->institute_id;
        $insurance->price = $request->price;
        $insurance->save();
        session()->flash('alert_message', ['message' => 'تم تعديل التامين', 'icon' => 'success']);
        return back();

    }

    public function destroy($id)
    {
        $insurance = Insurances::find($id);
        $insurance->delete();
        session()->flash('alert_message', ['message' => 'تم حذف التامين', 'icon' => 'error']);
        return back();

    }

    public function filter(Request $request)
    {
        $institute_id = $request->institute_id;

        $Insurances = new Insurances();

        if ($institute_id != null) {
            $Insurances = $Insurances->where("institute_id", $institute_id);
        }


        if (!$institute_id) {
            $Insurances = $Insurances->with('institute')->paginate(10);
            return response()->json(['insurances' => $Insurances]);
        }
 
        $Insurances = $Insurances->with('institute' , 'institute.city' , 'institute.country')->paginate(10);
        return response()->json(['insurances' => $Insurances]);

    }

}
