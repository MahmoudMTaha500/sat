<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Institute\StoreInstituteRequest;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Institute;
use App\Models\InstituteRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\Favourite;
use App\Models\StudentRequest;
use App\Models\ExchangeRate;

class InstituteController extends Controller
{

    public function index(Request $request)
    {
        $institutes = Institute::with('country', 'city','courses')->latest('id')->paginate(5);
        $useVue = true;
        $countries = Country::all();

        if ($request->has('type')) {
            if ($request->type == 'vue_request') {
                return response()->json(['institutes' => $institutes, 'countries' => $countries]);
            }
        }
        $page_title = 'المعاهد';
        return view('admin.institutes.index', ['institutes' => $institutes, "useVue" => $useVue, 'countries' => $countries,'page_title'=>$page_title]);
    }
    /************************************************************** */
    public function getInstitues(Request $request)
    {
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $name_ar = $request->name_ar;
        $unfinished_seo = $request->unfinished_seo;
        $institute = new Institute;
        if($country_id){
            $institute = $institute->where('country_id',$country_id);
        }
        if($city_id){
            $institute = $institute->where('city_id',$city_id);
        }  
        if($name_ar){
            $institute = $institute->where('name_ar', 'LIKE', "%{$name_ar}%");
        }
        if ($unfinished_seo == 'true') {
            $institute = $institute->where("meta_description" , null );
        }
        $institute = $institute->with('country', 'city','rats','courses' , 'creator' )->latest('id')->where('deleted_at', NULL)->paginate(10);
        return response()->json(['institutes' => $institute]);
    }
    /************************************************************** */
    public function create()
    {
        $department_name = 'institutes';
        $page_name = 'add-institute';
        $page_title = 'المعاهد';

        $countries = Country::all();
        $currencies = ExchangeRate::all();
        $useVue = true;
        return view('admin.institutes.create', compact('useVue', 'department_name', 'page_name', 'countries','page_title' , 'currencies'));
    }
    /************************************************************** */
    public function store(StoreInstituteRequest $request)
    {
        $validated = $request->validated();

        $studying_fees = '[';
        foreach($request->fees_rows as $index => $fee_row){

            if(empty($fee_row['title'])){
                return back()->with('error', 'يجب ادخال عنوان  مصاريف المعهد')->withInput();
            }


            if($index != 1 ){$studying_fees .= ',';}

                $converted_price = currency_convertor($request->institute_currency, 'SAR' , $fee_row['price']);
                $exchange_money = ExchangeRate::where('currency_code' , $request->institute_currency)->get()[0]->exchange_rates;
                $price = $converted_price + $exchange_money*$fee_row['price'];


                $summer_converted_price = currency_convertor($request->institute_currency, 'SAR' , $fee_row['summer-price']);
                $summer_exchange_money = ExchangeRate::where('currency_code' , $request->institute_currency)->get()[0]->exchange_rates;
                $summer_price = $summer_converted_price + $summer_exchange_money*$fee_row['summer-price'];

                $studying_fees .= '{
                    "keyword": "'.$fee_row['keyword'].'",
                    "title": "'.$fee_row['title'].'",
                    "price": "'.$fee_row['price'].'",
                    "price-in-sar": "'.floor($price).'",
                    "price-type": "'.$fee_row['price-type'].'",
                    "discount":"'.$fee_row['discount'].'",
                    "discount-type":"'.$fee_row['discount-type'].'",
                    "summer-price":"'.$fee_row['summer-price'].'",
                    "summer-price-in-sar": "'.floor($summer_price).'"

                }';
        }
        $studying_fees .= ']';
        session()->flash('studying_fees',$studying_fees);
        session()->get('studying_fees');

        $regex = '/^([1-9]|[12][0-9]|3[01])-(1[0-2]|[1-9])$/';
        if (!preg_match($regex, $request->summer_start_date)) {
            return back()->with('error', 'برجاء وضع تاريخ بداية الصيف بالشكل الصحيح')->withInput();
        }
        if (!preg_match($regex, $request->summer_end_date)) {
            return back()->with('error', 'برجاء وضع تاريخ نهاية الصيف بالشكل الصحيح')->withInput();
        }
        
        

        $slug = str_replace(' ', '-', $request->name_ar);
            $institute = Institute::create([
                "name_ar" => $request->name_ar,
                "slug" => $slug,
                "about_ar" => $request->about_ar,
                "institute_questions" => $request->institute_questions,
                "country_id" => $request->country_id,
                "city_id" => $request->city_id,
                "logo" => '-',
                "banner" => '-',
                "logo_alt" => $request->logo_alt,
                "banner_alt" => $request->banner_alt,
                "title_tag" => $request->title_tag,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "creator_id" => auth()->user()->id,
                "sat_rate" => 1,
                "rate_switch" => 1,
                "approvement" => 1,
                "studying_fees" => $studying_fees,
                "summer_start_date" => $request->summer_start_date,
                "summer_end_date" => $request->summer_end_date,
                "institute_currency" => $request->institute_currency,
                "institute_class" => $request->institute_class,
                "map" => $request->map,
            ]);


        $institute->addMediaFromRequest('banner')
            ->toMediaCollection('institute_banner');

        $logoObject = $validated['logo'];
        $logoName = time() . $logoObject->getClientOriginalName();
        $pathLogo = public_path("storage/institute/logos");
        $request->logo->move($pathLogo, $logoName);
        $logoNamePath = "storage/institute/logos" . '/' . $logoName;

        $institute->update(['logo' => $logoNamePath]);
            

            session()->flash('alert_message', ['message' => 'تم اضافة المعهد بنجاح', 'icon' => 'success']);
            return redirect()->route('institute.index');
    }
    /************************************************************** */
    public function show(Institute $institute)
    {
        $department_name = 'institutes';
        $page_name = 'add-institute';
        return view('admin.institutes.show', compact('department_name', 'page_name', 'institute'));
    }
    /************************************************************** */
    public function edit(Institute $institute)
    {
        $institute = Institute::find($institute->id);
        $department_name = 'institutes';
        $page_name = 'add-institute';
        $page_title = 'المعاهد';

        $currencies = ExchangeRate::all();
        $countries = Country::all();
        $useVue = true;
        return view('admin.institutes.edit', compact('useVue', 'currencies' , 'department_name', 'page_name', 'countries', 'institute','page_title'));

    }
    /************************************************************** */
    public function update(Request $request, Institute $institute)
    {
        $studying_fees = '[';
        foreach($request->fees_rows as $index => $fee_row){

            if(empty($fee_row['title'])){
                return back()->with('error', 'يجب ادخال عنوان  مصاريف المعهد')->withInput();
            }


            if($index != 1 ){$studying_fees .= ',';}

                $converted_price = currency_convertor($request->institute_currency, 'SAR' , $fee_row['price']);
                $exchange_money = ExchangeRate::where('currency_code' , $request->institute_currency)->get()[0]->exchange_rates;
                $price = $converted_price + $exchange_money*$fee_row['price'];


                $summer_converted_price = currency_convertor($request->institute_currency, 'SAR' , $fee_row['summer-price']);
                $summer_exchange_money = ExchangeRate::where('currency_code' , $request->institute_currency)->get()[0]->exchange_rates;
                $summer_price = $summer_converted_price + $summer_exchange_money*$fee_row['summer-price'];

                $studying_fees .= '{
                    "keyword": "'.$fee_row['keyword'].'",
                    "title": "'.$fee_row['title'].'",
                    "price": "'.$fee_row['price'].'",
                    "price-in-sar": "'.floor($price).'",
                    "price-type": "'.$fee_row['price-type'].'",
                    "discount":"'.$fee_row['discount'].'",
                    "discount-type":"'.$fee_row['discount-type'].'",
                    "summer-price":"'.$fee_row['summer-price'].'",
                    "summer-price-in-sar": "'.floor($summer_price).'"

                }';
        }
        $studying_fees .= ']';

        $institute = Institute::find($institute->id);
        $institute->name_ar = $request->name_ar;
        $institute->about_ar = $request->about_ar;
        $institute->institute_questions = $request->institute_questions;
        $institute->country_id = $request->country_id;
        $institute->city_id = $request->city_id;
        $institute->logo_alt = $request->logo_alt;
        $institute->banner_alt = $request->banner_alt;
        $institute->title_tag = $request->title_tag;
        $institute->meta_keywords = $request->meta_keywords;
        $institute->meta_description = $request->meta_description;
        $institute->map = $request->map;
        $institute->studying_fees= $studying_fees;
        $institute->summer_start_date = $request->summer_start_date;
        $institute->summer_end_date = $request->summer_end_date;
        $institute->institute_currency = $request->institute_currency;
        $institute->institute_class = $request->institute_class;
        if ($request->logo) {
            $validate_images = $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $logoObject = $validate_images['logo'];
            $logoName = time() . $logoObject->getClientOriginalName();
            $pathLogo = public_path("storage/institute/logos");
            File::delete($institute->logo);
            $request->logo->move($pathLogo, $logoName);
            $logoNamePath = "storage/institute/logos" . '/' . $logoName;
            $institute->logo = $logoNamePath;
        }
        if ($request->banner) {
            $institute->media()->delete();
            $institute->addMediaFromRequest('banner')
            ->toMediaCollection('institute_banner');
        }
        $rateSwitch = 0;
        if($request->rate_switch =="on"){
            $rateSwitch = 1;

        }
        $institute->rate_switch = $rateSwitch;
        $institute->sat_rate = $request->score;
        $institute->save();

        Course::where(['institute_id' => $institute->id, 'studying_fees_status' => 0])->update(['studying_fees' => $studying_fees]);

        session()->flash('alert_message', ['message' => 'تم تعديل المعهد بنجاح', 'icon' => 'success']);
        return back();
    }
    /************************************************************** */
    public function destroy(Institute $institute)
    {
        InstituteRate::where('institute_id', $institute->id)->delete();
        Course::where('institute_id', $institute->id)->delete();
        Comment::where(['element_id' => $institute->id, 'element_type' => 'institute'])->delete();
        $institute->delete();
        session()->flash('alert_message', ['message' => 'تم مسح المعهد بنجاح', 'icon' => 'error']);
        return back();

    }
    /************************************************************** */
    public function force_Delete($institute_id)
    {
        $institute = Institute::withTrashed()->find($institute_id);
        File::delete($institute->logo);
        if(!empty($institute->getFirstMedia('institute_banner'))){
           $institute->getFirstMedia('institute_banner')->delete();
        }
        $institute->forceDelete();
        session()->flash('alert_message', ['message' => 'تم حذف  المعهد  نهائيا بنجاح', 'icon' => 'error']);
        return back();
    }
    /************************************************************** */
    public function archive(Request $request)
    {

        $institutes = Institute::onlyTrashed()->latest('id')->get();
        return view('admin.institutes.archives', ['institutes' => $institutes]);

    }
    /************************************************************** */
    public function restor(Request $request, $id)
    {
        $restor = Institute::where(['id' => $id])->restore();
        InstituteRate::where('institute_id', $id)->restore();
        Course::where('institute_id', $id)->restore();
        Comment::where(['element_id' => $id, 'element_type' => 'institute'])->restore();
        session()->flash('alert_message', ['message' => 'تم ارجاع المعهد بنجاح', 'icon' => 'success']);
        return back();
    }
    /************************************************************** */
    public function updateAprovement(Request $request)
    {
        $institute = Institute::find($request->institute_id);
        $institute->approvement = $request->approvement;
        $institute->save();
    }
    /************************************************************** */
    public function filter(Request $request)
    {
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $name_ar = $request->name_ar;
        $institute = new Institute;
        if($country_id){
            $institute = $institute->where('country_id',$country_id);
        }
        if($city_id){
            $institute = $institute->where('city_id',$city_id);
        }  
        if($name_ar){
            $name_ar = $institute->where('name_ar',$name_ar);
        }
        $institute = $institute->with('country', 'city','rats','courses' , 'creator' )->latest('id')->where('deleted_at', NULL)->paginate(10);
        return response()->json(['institutes' => $institute]);
    }

}
