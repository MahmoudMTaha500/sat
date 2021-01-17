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
        return view("admin.countries.index", ['country' => $country]);
    }

    public function show(Request $request)
    {

    }

    public function create(Request $request)
    {

        return view("admin.countries.create");

    }
    public function store(Request $request)
    {
        $name_ar = $request->name_ar;
        $country = country::create(['name_ar' => $name_ar]);
        return back()->with('success', 'تم اضافة الدولة!');

    }

    public function edit($id)
    {

        $country = Country::find($id);
        return view("admin.countries.edit", ['country' => $country]);

    }

    public function update(Request $request)
    {

        $countryname = $request->name_ar;
        $id = $request->id;
        $country = Country::find($id);

        $country->name_ar = $countryname;
        $country->save();
        return back()->with('success', 'تم تعديل  الدولة!');

    }

    public function delete($id)
    {

        $country = Country::find($id);
        $country->delete();
        return redirect("/dashboard/getcountries");

    }

}
