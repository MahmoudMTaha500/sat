<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class countryController extends Controller
{

    public function index(Request $request)
    {
        $country = Country::orderBy('order')->get();
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

            $country = country::create(['name_ar' => $name_ar , 'slug' => str_replace(' ', '-', $name_ar)]);
            session()->flash('alert_message', ['message' => 'تم اضافة الدوله بنجاح', 'icon' => 'success']);
            return redirect()->route('countries.index');    
        } else{
            return back()->with('error', ' هذه الدوله موجوده بالفعل');

        }

        
    }
    public function countries_sortable(Request $request)
    {
        $countries = country::all();

        foreach ($countries as $country) {
            foreach ($request->order as $order) {
                if ($order['id'] == $country->id) {
                    $country->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }

    public function edit($id)
    {

        $country = Country::find($id);
        $page_title = 'الدول';

        return view("admin.countries.edit", ['country' => $country,'page_title'=>$page_title]);

    }

    public function update(Request $request, Country $country )
    {
        $countryname = $request->name_ar;
        $get_country = Country::where('id' , '!=' , $country->id)->where('name_ar' , $countryname)->get();
        if(empty($get_country[0])){
            $country->name_ar = $countryname;
            $country->slug = str_replace(' ', '-', $countryname);
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
