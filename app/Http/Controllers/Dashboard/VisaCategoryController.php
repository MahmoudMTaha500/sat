<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\VisaCategory;
use Illuminate\Http\Request;

class VisaCategoryController extends Controller
{

    public function index()
    {
        $categories = VisaCategory::latest('id')->paginate(10);
        $department_name='visa';
        $page_name='visa-categories';
        $page_title = ' التاشيرات';

        return view('admin.visa_categories.index' , compact('department_name' , 'page_name','categories','page_title'));
    }

    public function create(Request $request)
    {
        $department_name='visa';
        $page_name='create-visa-category';
        $page_title = ' التاشيرات';

        return view('admin.visa_categories.create' , compact('department_name' , 'page_name','page_title'));
    }

    public function store(Request $request)
    {
             VisaCategory::create(['name_ar'=>$request->name_ar,'creator_id'=>auth()->user()->id]); 
             return back()->with('success','تم اضافة التصنيف');
    }

    public function show(VisaCategory $visaCategory)
    {
        //
    }

    public function edit(VisaCategory $visaCategory)
    {
        $category = VisaCategory::find($visaCategory->id);
        $department_name='visa';
        $page_name='edit-visa-category';
        $page_title = ' التاشيرات';

        return view('admin.visa_categories.edit' , compact('department_name' , 'page_name','category','page_title'));
    }

    public function update(Request $request, VisaCategory $visaCategory)
    {
        
        $category = VisaCategory::find($visaCategory->id);
        $category->name_ar = $request->name_ar;
        $category->save();
        return back()->with('success','تم تعديل التصنيف');

        
    }

    public function destroy(VisaCategory $visaCategory)
    {
        // dd($visaCategory);

        $category = VisaCategory::find($visaCategory->id);
        $category->delete();
        return back()->with('success','تم مسح التصنيف');


        
    }
}
