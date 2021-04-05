<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\blogs_categories\blogCategoryRequest;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $categories = BlogCategory::with('blogs')->get();
        // dd($categories);
        $department_name = 'blogs';
        $page_name = 'blog-categories';
        $page_title = 'اقسام المقالات';
        return view("admin.blog_categories.index", compact('categories', 'department_name', 'page_title','page_name'));
    }


    public function create()
    {
        $department_name = 'blogs';
        $page_name = 'add-blog-category';
        $page_title = 'اقسام المقالات';

        return view("admin.blog_categories.create", compact('department_name', 'page_title','page_name'));
    }

    public function store(blogCategoryRequest $request)
    {
        $validated = $request->validated();
        // dd($request->all());
           BlogCategory::create(['name_ar'=>$request->name_ar,'creator_id'=>1]);
           session()->flash('alert_message',['message' =>'تم اضافه التصنيف','icon'=>'success']);
           return redirect()->route('blog_categories.index');
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
        $page_title = 'اقسام المقالات';

        return view("admin.blog_categories.edit", compact( 'category' ,'department_name', 'page_title','page_name'));
    }

 
    public function update(blogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $validated = $request->validated();
        $update =  BlogCategory::find($blogCategory->id);
        $update->name_ar = $request->name_ar;
        $update->save();
        session()->flash('alert_message',['message' =>'تم تعديل التصنيف','icon'=>'success']);
        return back();
        
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $delete =  BlogCategory::find($blogCategory->id);
        $delete->delete();
        session()->flash('alert_message',['message' =>'تم حذف التصنيف','icon'=>'error']);
        return back();
    }
}
