<?php
namespace App\Http\Controllers\Dashboard;
use App\Models\Institute;
use  App\Http\Requests\services\AirportRequest;
use App\Http\Controllers\Controller;
use App\Models\Airports ;
use App\Models\Country ;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;


class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department_name = 'services';
        $page_name = 'airports';
        $page_title = 'المطارات';
        $useVue=true;
        $institutes = institute::get();
        
        return view("admin.airports.index", compact('department_name', 'page_name', 'page_title','useVue','institutes'));
   
    }
    public function getAirports(){
        $airports = Airports::with('institute' , 'institute.city' , 'institute.country')->paginate(10);
        return response()->json(['airports'=>$airports]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $Institutes = institute::get();
        // 
        $department_name = 'services';
        $page_name = 'add-airport';
        $page_title = 'المطارات';
        $useVue = true;
        $countries = Country::all();

        return view("admin.airports.create", compact('department_name', 'page_name','page_title', 'Institutes'  , 'countries' , 'useVue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\airports  $airports
     * @return \Illuminate\Http\Response
     */
    public function show(airports $airports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\airports  $airports
     * @return \Illuminate\Http\Response
     */
    public function edit(airports $airports)
    {
        //
    }
    public function editAirports($id)
    {
        // $insurances = Insurances::where('id' , 1)->get()[0];
        // dd();
        $airport= Airports::find($id);
        $Institutes = institute::get();
        $department_name = 'services';
        $page_name = 'airports';
        $page_title = 'المطارات';
        $countries = Country::all();
        $useVue = true;
        return view("admin.airports.edit", compact('department_name', 'page_name', 'Institutes','page_title','airport' , 'countries' , 'useVue'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\airports  $airports
     * @return \Illuminate\Http\Response
     */
    public function update(AirportRequest $request, airports $airports)
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


    $Airports = $Airports->with('institute' , 'institute.city' , 'institute.country')->paginate(10);
    return response()->json(['airports' => $Airports]);
    
    // dd($request->all());
}
}
