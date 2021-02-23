<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\BlogCategory;
use App\Models\Institute;
use Illuminate\Support\Facades\File;
use App\Http\Requests\blogs\blogRequest;
use App\Http\Requests\blogs\blogEditRequest;
use App\User;

class BlogController extends Controller
{

    public function index(Request $request)
    {   
        $department_name = 'blogs';
        $page_name = 'blogs';
        $useVue = true;
$users = User::get();
$categories = BlogCategory::get();
        return view("admin.blogs.index", compact('department_name', 'page_name' , 'useVue','users','categories'));
    }

    public function get_blogs_by_vue(Request $request)
    {   
        $blogs = Blog::with('creator','category','country','city','institute')->paginate(10);
        return response()->json($blogs);
    }


    public function create()
    {
   


   $Institutes = Institute::get();
   $BlogCategories = BlogCategory::get();
   $countries = Country::get();
   $useVue = true;

        $department_name = 'blogs';
        $page_name = 'add-blog';
        return view("admin.blogs.create", compact('countries','department_name', 'page_name','useVue','Institutes','BlogCategories'));
    }


    public function store(blogRequest $request)
    {
        $validated = $request->validated();
        $bannerObj = $validated['banner'];
        $bannerName = time() . $bannerObj->getClientOriginalName();
        $pathBanner = public_path("\storage\blogs");
        $bannerObj->move($pathBanner, $bannerName);
        $pannerNamePath = "storage/blogs" . '/' . $bannerName;
        $slug = str_replace(' ', '-', $request->title_ar);
        Blog::create(
                [
                'title_ar'=>$request->title_ar,
                'slug'=>$slug,
                'content_ar'=>$request->content_ar,
                'country_id'=>$request->country_id,
                'city_id'=>$request->city_id,
                'category_id'=>$request->category_id,
                'institute_id'=>$request->institute_id,
                'banner'=>$pannerNamePath,
                'creator_id'=>1,
                'approvement'=>1,
                ]
            );

      session()->flash("alert_message",['message'=>"تم اضافة المقال",'icon'=>'success']);
       return redirect()->route("blogs.index");
   


        // return response()->json($request->all());
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {



        $Institutes = Institute::get();
        $BlogCategories = BlogCategory::get();
        $countries = Country::get();
        $blog = Blog::find($blog->id);
        $useVue = true;

        $department_name = 'blogs';
        $page_name = 'edit-blog';
        return view("admin.blogs.edit", compact( 'useVue','blog' ,'department_name', 'page_name','Institutes','BlogCategories','countries'));
    }

 
    public function update(blogEditRequest $request, Blog $blog)
    {
        $validated = $request->validated();
        $blog = Blog::find($blog->id);
        $slug = str_replace(' ', '-', $request->title_ar);
        $blog->title_ar = $request->title_ar;
        $blog->slug = $slug;
        $blog->content_ar = $request->content_ar;
        $blog->country_id = $request->country_id;
        $blog->city_id = $request->city_id;
        $blog->institute_id = $request->institute_id;
        $blog->category_id = $request->category_id;
        if($request->banner){
            $bannerObj = $request->banner;
            $bannerName = time() . $bannerObj->getClientOriginalName();
            $pathBanner = public_path("\storage\blogs");
            File::delete($blog->banner);
            $bannerObj->move($pathBanner, $bannerName);
            $pannerNamePath = "storage/blogs" . '/' . $bannerName;
            $blog->banner = $pannerNamePath;
        }
        $blog->save();
        session()->flash('alert_message',['message'=>'تم تعديل المقال','icon'=>'success']);
        return back();
    }


    public function destroy(Blog $blog)
    {
        $Blog = Blog::find($blog->id);
        $Blog->delete();
        session()->flash('alert_message',['message'=>'تم حذف المقال','icon'=>'error']);
        return back();
}


/******************* */




    public function updateAprovement(Request $request)
    { 
        $Blog = Blog::find($request->blog_id);
        $Blog->approvement = $request->approvement;
        $Blog->save();
    }


    public function filter (Request $request){
        // dd($request->all());
        $user_id= $request->user_id;
        $cat_id= $request->cat_id;
        $keyword= $request->keyword;
        $status= $request->status;
        $blog =  new Blog;
        if($request->user_id !=''){
            $blog = $blog->with('creator')->whereHas('creator', function ($query) use ($user_id) {
                $query->where('creator_id', $user_id);
            });

        }  
        if($request->cat_id !=''){
            $blog = $blog->with('category')->whereHas('category', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            });
        }
        if($request->keyword !=''){
            // $blog = $blog->where("title_ar", 'LIKE', "%{$keyword}%");
            $blog->where(function ($query)  use($keyword) {
                $query->where('title_ar', 'LIKE', "%$keyword%")->orWhere('content_ar', 'LIKE', "%$keyword%");
                    });

        }
        if($request->status != null){
            if($status ==true){
               $x=1; 
            }else{
               $x=0; 
            }
            $blog = $blog->where("approvement", $x);
      
        }
          $blog=  $blog->with('creator','category','country','city','institute')->paginate(10);
          return response()->json($blog);
        }

        /***************************** */
        public function archive(Request $request)
        {
    
            $Blogs = Blog::onlyTrashed()->get();
            return view('admin.blogs.archives', ['Blogs' => $Blogs]);
    
        }
        /************************************************************** */
    
        public function restor(Request $request, $id)
        {
            $restor = Blog::where(['id' => $id])->restore();
            session()->flash('alert_message', ['message' => 'تم ارجاع المقال بنجاح', 'icon' => 'success']);
            return back();
    
        }


}
