<?php
namespace App\Http\Controllers\Dashboard;
use App\Models\Institute;
use  App\Http\Requests\services\AirportRequest;
use App\Http\Controllers\Controller;
use App\Models\Airports ;
use App\Models\Country ;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use AmrShawky\LaravelCurrency\Facade\Currency;


class AirportsController extends Controller
{
    public function index()
    {
        $department_name = 'services';
        $page_name = 'airports';
        $page_title = 'المطارات';
        $useVue=true;
        $institutes = institute::latest('id')->get();
        
        return view("admin.airports.index", compact('department_name', 'page_name', 'page_title','useVue','institutes'));
   
    }
    public function getAirports(){
        $airports = Airports::latest('id')->with('institute' , 'institute.city' , 'institute.country')->paginate(10);
        return response()->json(['airports'=>$airports]);
    }

    public function create()
    {
        
        $Institutes = institute::latest('id')->get();
        // 
        $department_name = 'services';
        $page_name = 'add-airport';
        $page_title = 'المطارات';
        $useVue = true;
        $countries = Country::all();
        $exchange_rates = ExchangeRate::all();
        return view("admin.airports.create", compact('department_name', 'page_name','page_title', 'Institutes'  , 'countries' , 'useVue' , 'exchange_rates'));
    }

    public function store(AirportRequest $request)
    {

        $price_amount = $request->price;
        $price = $request->price;
        $converted_price = currency_convertor($request->currency_exchange, 'SAR' , $price_amount);
        $exchange_money = ExchangeRate::where('currency_code' , $request->currency_exchange)->get()[0]->exchange_rates;
        $price = $converted_price + $exchange_money*$price_amount;

        $airports = Airports::create([
            'name_ar'=>$request->name_ar,
            'institute_id'=>$request->institute_id,
            'price'=>$price,
            'currency_code'=>$request->currency_exchange,
            'currency_amount'=>$price_amount,
            ]);

            session()->flash('alert_message', ['message'=>"تم اضافه المطار بنجاح", 'icon'=>'success']);
            return redirect()->route('airports.index');
    }

    public function show(airports $airports)
    {
        //
    }

    public function edit(airports $airports)
    {
        //
    }
    public function editAirports($id)
    {
        $airport= Airports::find($id);
        $Institutes = institute::latest('id')->get();
        $department_name = 'services';
        $page_name = 'airports';
        $page_title = 'المطارات';
        $countries = Country::all();
        $useVue = true;
        $exchange_rates = ExchangeRate::all();
        return view("admin.airports.edit", compact('department_name', 'page_name', 'Institutes','page_title','airport' , 'countries' , 'useVue' , 'exchange_rates'));
    }

    public function update(AirportRequest $request, airports $airports)
    {

        $price_amount = $request->price;
        $price = $request->price;
        $converted_price = currency_convertor($request->currency_exchange, 'SAR' , $price_amount);
        $exchange_money = ExchangeRate::where('currency_code' , $request->currency_exchange)->get()[0]->exchange_rates;
        $price = $converted_price + $exchange_money*$price_amount;

        $airport= Airports::find($request->id);
        $airport->name_ar=$request->name_ar;
        $airport->institute_id=$request->institute_id;
        $airport->price=$price;
        $airport->currency_code=$request->currency_exchange;
        $airport->currency_amount=$price_amount;
        $airport->save();
        session()->flash('alert_message',['message'=>'تم تعديل المطار','icon'=>'success']);
        return back();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\airports  $airports
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        $airport= Airports::find($id);
  $airport->delete();
  session()->flash('alert_message',['message'=>'تم حذف المطار','icon'=>'error']);
  return back();  
    }



    
public function filter(Request $request)
{
    $institute_id = $request->institute_id;
    $name_ar = $request->name_ar;

    $Airports = new Airports();

    if ($institute_id != null) {
        $Airports = $Airports->where("institute_id", $institute_id);
    }
    if ($name_ar != null) {
        $Airports = $Airports->where("name_ar", 'LIKE', "%{$request->name_ar}%");

    }


    $Airports = $Airports->with('institute' , 'institute.city' , 'institute.country')->latest('id')->paginate(10);
    return response()->json(['airports' => $Airports]);
    
    // dd($request->all());
}
}
