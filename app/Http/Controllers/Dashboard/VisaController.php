<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{

    public function index()
    {
        $department_name='visa';
        $page_name='visa';
        return view('admin.visas.index' , compact('department_name' , 'page_name'));
    }

 
    public function create()
    {
        $department_name='visa';
        $page_name='add-visa';
        return view('admin.visas.create' , compact('department_name' , 'page_name'));
    }

    public function store(Request $request)
    {
        return dd($request->all());
    }


    public function show(Visa $visa)
    {
        $department_name='visa';
        $page_name='visa';
        return view('admin.visas.index' , compact('department_name' , 'page_name'));
    }


    public function edit(Visa $visa)
    {
        $department_name='visa';
        $page_name='edit-visa';
        return view('admin.visas.edit' , compact('department_name' , 'page_name'));
    }


    public function update(Request $request, Visa $visa)
    {
        //
    }


    public function destroy(Visa $visa)
    {
        //
    }
}
