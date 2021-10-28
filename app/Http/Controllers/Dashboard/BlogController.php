<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\blogs\blogEditRequest;
use App\Http\Requests\blogs\blogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Institute;
use App\Models\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        $department_name = 'blogs';
        $page_name = 'blogs';
        $page_title = 'المقالات';
        $useVue = true;
        $users = User::get();
        $categories = BlogCategory::get();
        return view("admin.blogs.index", compact('department_name', 'page_name', 'useVue', 'users', 'page_title', 'categories'));
    }
    /***************************************************************/
    public function get_blogs_by_vue(Request $request)
    {

        $blogs = Blog::with('creator', 'category', 'country', 'city', 'institute')->paginate(10);
        return response()->json($blogs);
    }
    /***************************************************************/
    public function create()
    {
        $Institutes = Institute::get();
        $BlogCategories = BlogCategory::get();
        $countries = Country::get();
        $useVue = true;
        $department_name = 'blogs';
        $page_name = 'add-blog';
        $page_title = 'المقالات';

        return view("admin.blogs.create", compact('countries', 'department_name', 'page_name', 'useVue', 'Institutes', 'BlogCategories', 'page_title'));
    }
    /***************************************************************/
    public function store(blogRequest $request)
    {
        $validated = $request->validated();
        $slug = str_replace(' ', '-', $request->title_ar);
        $blog = Blog::create(
            [
                'title_ar' => $request->title_ar,
                'slug' => $slug,
                'content_ar' => $request->content_ar,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'category_id' => $request->category_id,
                'institute_id' => $request->institute_id,
                'course_id' => $request->course_id,
                'img_alt' => $request->img_alt,
                'title_tag' => $request->title_tag,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'banner' => '-',
                'creator_id' => auth()->user()->id,
                'approvement' => 1,
            ]
        );
        $blog->addMediaFromRequest('banner')
                ->toMediaCollection('blog_banner');

        $blog->addMediaFromRequest('featured_image')
                ->toMediaCollection('blog_featured_image');
             
        session()->flash("alert_message", ['message' => "تم اضافة المقال", 'icon' => 'success']);
        return redirect()->route("blogs.index");
    }
    /***************************************************************/
    public function show(Blog $blog)
    {
        //
    }
    /***************************************************************/
    public function edit(Blog $blog)
    {
        $Institutes = Institute::get();
        $BlogCategories = BlogCategory::get();
        $countries = Country::get();
        $blog = Blog::find($blog->id);
        $useVue = true;

        $department_name = 'blogs';
        $page_name = 'edit-blog';
        $page_title = 'المقالات';
        return view("admin.blogs.edit", compact('useVue', 'blog', 'department_name', 'page_name', 'Institutes', 'BlogCategories', 'countries', 'page_title'));
    }
    /***************************************************************/
    public function update(blogEditRequest $request, Blog $blog)
    {
        // dd($request->all());
        $validated = $request->validated();
        $blog = Blog::find($blog->id);
        $slug = str_replace(' ', '-', $request->title_ar);
        $blog->title_ar = $request->title_ar;
        $blog->slug = $slug;
        $blog->content_ar = $request->content_ar;
        $blog->country_id = $request->country_id;
        $blog->city_id = $request->city_id;
        $blog->institute_id = $request->institute_id;
        $blog->course_id = $request->course_id;
        $blog->category_id = $request->category_id;
        $blog->img_alt = $request->img_alt;
        $blog->title_tag = $request->title_tag;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        
        if ($request->banner) {
            $blog->clearMediaCollection('blog_banner');
            $blog->addMediaFromRequest('banner')
            ->toMediaCollection('blog_banner');
        }

        if ($request->featured_image) {
            $blog->clearMediaCollection('blog_featured_image');
            $blog->addMediaFromRequest('featured_image')
            ->toMediaCollection('blog_featured_image');
        }


        $blog->save();
        session()->flash('alert_message', ['message' => 'تم تعديل المقال', 'icon' => 'success']);
        return back();
    }
    /***************************************************************/
    public function destroy(Blog $blog)
    {
        $Blog = Blog::find($blog->id);
        $Blog->delete();
        session()->flash('alert_message', ['message' => 'تم حذف المقال', 'icon' => 'error']);
        return back();
    }
    /***************************************************************/
    public function updateAprovement(Request $request)
    {
        $Blog = Blog::find($request->blog_id);
        $Blog->approvement = $request->approvement;
        $Blog->save();
    }
    /***************************************************************/
    public function filter(Request $request)
    {
        $user_id = $request->user_id;
        $cat_id = $request->cat_id;
        $keyword = $request->keyword;
        $status = $request->status;
        $blog = new Blog;

        if ($request->user_id != '') {
            $blog = $blog->with('creator')->whereHas('creator', function ($query) use ($user_id) {
                $query->where('creator_id', $user_id);
            });
        }
        if ($request->cat_id != '') {
            $blog = $blog->with('category')->whereHas('category', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            });
        }
        if ($request->keyword != '') {
            $blog = $blog->where('title_ar', 'LIKE', '%' . $request->keyword . '%')->orWhere('content_ar', 'LIKE', "%$keyword%");
        }
        if ($status != null) {
            if ($status == 'true') {
                $x = 1;
            } else {
                $x = 0;
            }
            $blog = $blog->where("approvement", $x);
        }
        $blog = $blog->with('creator', 'category', 'country', 'city', 'institute')->paginate(10);
        return response()->json($blog);
    }
    /***************************************************************/
    public function archive(Request $request)
    {
        $Blogs = Blog::onlyTrashed()->get();
        return view('admin.blogs.archives', ['Blogs' => $Blogs]);
    }
    /***************************************************************/
    public function restor(Request $request, $id)
    {
        $restor = Blog::where(['id' => $id])->restore();
        session()->flash('alert_message', ['message' => 'تم ارجاع المقال بنجاح', 'icon' => 'success']);
        return back();
    }


    public function forceDelete($id){

        // dd($id);
        $forceDelete = Blog::where(['id' => $id])->forceDelete();
        session()->flash('alert_message', ['message' => 'تم  حذف المقال نهائيا بنجاح', 'icon' => 'error']);
        return back();

    }

    public function get_institutes_vue(Request $request){
        $institutes = new Institute();
        if(!empty($request->country_id)){
            $institutes = $institutes->where(['country_id' => $request->country_id]);
        }
        if(!empty($request->city_id)){
            $institutes = $institutes->where(['city_id' => $request->city_id]);
        }
        $institutes = $institutes->with('city')->get();
        return response()->json($institutes);
    }


    public function get_courses_vue(Request $request){
        $courses = new Course();
        if(!empty($request->institute_id)){
            $courses = $courses->where(['institute_id' => $request->institute_id]);
        }
        $courses = $courses->get();
        return response()->json($courses);
    }

}
