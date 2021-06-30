<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class countryController extends Controller
{

    public function index(Request $request)
    {
        $country = Country::get();
        $page_title = 'الدول';

        return view("admin.countries.index", ['country' => $country, 'page_title'=>$page_title]);
    }

    public function show(Request $request)
    {

    }

    public function create(Request $request)
    {
        $page_title = 'الدول';
     
        return view("admin.countries.create" ,compact('page_title'));

    }
    public function store(Request $request)
    {
        $name_ar = $request->name_ar;
        $get_country = country::where(['name_ar' => "$name_ar"])->first();
        if($get_country == array()){

            $country = country::create(['name_ar' => $name_ar]);
            session()->flash('alert_message', ['message' => 'تم اضافة الدوله بنجاح', 'icon' => 'success']);
            return redirect()->route('countries.index');    
        } else{
            return back()->with('error', ' هذه الدوله موجوده بالفعل');

        }

        
    }

    public function edit($id)
    {

        $country = Country::find($id);
        $page_title = 'الدول';

        return view("admin.countries.edit", ['country' => $country,'page_title'=>$page_title]);

    }

    public function update(Request $request)
    {

        $countryname = $request->name_ar;
        $id = $request->id;

        $get_country = country::where(['name_ar' => "$countryname"])->first();
        if($get_country == array()){
            $country = Country::find($id);

            $country->name_ar = $countryname;
            $country->save();
            session()->flash('alert_message', ['message' => 'تم تعديل الدوله بنجاح', 'icon' => 'success']);
            return redirect()->route('countries.index'); 
           
    
        } else{
            return back()->with('error', ' هذه الدوله موجوده بالفعل');

        }



       

    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('countries');

    }

    public function delete($id)
    {
// dd($id);
        $country = Country::find($id);
        $country->delete();
        return back();

    }

}
