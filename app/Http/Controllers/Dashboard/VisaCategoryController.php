<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\VisaCategory;
use Illuminate\Http\Request;

class VisaCategoryController extends Controller
{

    public function index()
    {
        $department_name='visa';
        $page_name='visa-categories';
        return view('admin.visa_categories.index' , compact('department_name' , 'page_name'));
    }

    public function create()
    {
        $department_name='visa';
        $page_name='create-visa-category';
        return view('admin.visa_categories.create' , compact('department_name' , 'page_name'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(VisaCategory $visaCategory)
    {
        //
    }

    public function edit(VisaCategory $visaCategory)
    {
        $department_name='visa';
        $page_name='edit-visa-category';
        return view('admin.visa_categories.edit' , compact('department_name' , 'page_name'));
    }

    public function update(Request $request, VisaCategory $visaCategory)
    {
        //
    }

    public function destroy(VisaCategory $visaCategory)
    {
        //
    }
}
