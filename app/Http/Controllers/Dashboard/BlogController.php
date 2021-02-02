<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {   
        $blogs = Blog::all();
        $department_name = 'blogs';
        $page_name = 'blogs';
        return view("admin.blogs.index", compact('blogs', 'department_name', 'page_name'));
    }


    public function create()
    {
        $department_name = 'blogs';
        $page_name = 'add-blog';
        return view("admin.blogs.create", compact('department_name', 'page_name'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        $department_name = 'blogs';
        $page_name = 'edit-blog';
        return view("admin.blogs.edit", compact( 'blog' ,'department_name', 'page_name'));
    }

 
    public function update(Request $request, Blog $blog)
    {
        //
    }


    public function destroy(Blog $blog)
    {
        //
    }
}
