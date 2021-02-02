<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $categories = BlogCategory::all();
        $department_name = 'blogs';
        $page_name = 'blog-categories';
        return view("admin.blog_categories.index", compact('categories', 'department_name', 'page_name'));
    }


    public function create()
    {
        $department_name = 'blogs';
        $page_name = 'add-blog-category';
        return view("admin.blog_categories.create", compact('department_name', 'page_name'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(BlogCategory $blogCategory)
    {
        //
    }


    public function edit(BlogCategory $blogCategory)
    {
        $category = $blogCategory;
        $department_name = 'blogs';
        $page_name = 'edit-blog-category';
        return view("admin.blog_categories.edit", compact( 'category' ,'department_name', 'page_name'));
    }

 
    public function update(Request $request, BlogCategory $blogCategory)
    {
        //
    }

    public function destroy(BlogCategory $blogCategory)
    {
        //
    }
}
