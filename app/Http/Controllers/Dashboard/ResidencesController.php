<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\residences;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Institute;
use  App\Http\Requests\services\ResidencesRequest;
use AmrShawky\LaravelCurrency\Facade\Currency;



class ResidencesController extends Controller
{
    public function index()
    {
        $department_name = 'services';
        $page_name = 'residences';
        $useVue=true;
        $institutes = Institute::get();
        $page_title = 'السكن';
        
        return view("admin.residences.index", compact('department_name', 'page_name','useVue','institutes','page_title'));
    }


    
public function getResidences(){
    $residences = residences::with('institute' , 'institute.city' , 'institute.country')->paginate(10);
    return response()->json(['residences'=>$residences]);
}
    public function create()
    {
        $Institutes = Institute::get();
        // 
        $department_name = 'services';
        $page_name = 'add-insurances';
        $page_title = 'السكن';
        $useVue = true;
        $countries = Country::all();

        return view("admin.residences.create", compact('department_name', 'page_name', 'Institutes','page_title' , 'countries' , 'useVue'));
    }

    public function store(ResidencesRequest $request)
    {
        $price_amount = $request->price;
        $price = $request->price;
        if(!empty($request->currency_exchange)){
            $converted_price = Currency::convert()
            ->from("$request->currency_exchange")
            ->to('SAR')
            ->amount($price_amount)
            ->withoutVerifying()
            ->get();
            $price = $converted_price + $request->exchange_money*$price_amount;
        }

        $residences = residences::create([
            'name_ar'=>$request->name_ar,
            'institute_id'=>$request->institute_id,
            'price'=>$price,
            'currency_code'=>$request->currency_exchange,
            'currency_amount'=>$price_amount,
            ]);
            // session()->flash('alert_message', ['message' => 'تم اضافه الدورة بنجاح', 'icon' => 'success']);

            session()->flash('alert_message', ['message'=>"تم اضافه السكن بنجاح", 'icon'=>'success']);
            return redirect()->route('residences.index');

    }
    public function show(residences $residences)
    {
        //
    }
    public function edit(residences $residences)
    {
        //
    }
    public function editResidences($id)
    {
        $residence= residences::find($id);
        $Institutes = Institute::get();
        $department_name = 'services';
        $page_name = 'residences';
        $page_title = 'السكن';
        $useVue = true;
        $countries = Country::all();

        return view("admin.residences.edit", compact('department_name', 'page_name', 'Institutes','residence','page_title' , 'useVue' , 'countries'));
    }
    public function update(ResidencesRequest $request, residences $residences)
    {

        $price_amount = $request->price;
        $price = $request->price;
        if(!empty($request->currency_exchange)){
            $converted_price = Currency::convert()
            ->from("$request->currency_exchange")
            ->to('SAR')
            ->amount($price_amount)
            ->withoutVerifying()
            ->get();
            $price = $converted_price + $request->exchange_money*$price_amount;
        }


        $residence= residences::find($request->id);
        $residence->name_ar=$request->name_ar;
        $residence->institute_id=$request->institute_id;
        $residence->price=$price;
        $residence->currency_code=$request->currency_exchange;
        $residence->currency_amount=$price_amount;
        $residence->save();
        session()->flash('alert_message',['message'=>'تم تعديل السكن','icon'=>'success']);
        return back();  
           
    }
    public function destroy(residences $residences,$id)
    {
        $residences= residences::find($id);
  $residences->delete();
  session()->flash('alert_message',['message'=>'تم حذف السكن','icon'=>'error']);
  return back(); 
    }




    public function filter(Request $request)
    {
        $institute_id = $request->institute_id;
        $name_ar = $request->name_ar;
    
        $residences = new residences();
    
        if ($institute_id != null) {
            $residences = $residences->where("institute_id", $institute_id);
        }
        if ($name_ar != null) {
            $residences = $residences->where("name_ar", 'LIKE', "%{$request->name_ar}%");
    
        }
    
    
        $residences = $residences->with('institute' , 'institute.city' , 'institute.country')->paginate(10);
        return response()->json(['residences' => $residences]);
        
    }

}
