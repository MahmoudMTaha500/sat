<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\services\InsurancesRequest;
use App\Models\Institute;
use App\Models\Insurances;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use AmrShawky\LaravelCurrency\Facade\Currency;


class InsurancesController extends Controller
{

    public function index()
    {
        $department_name = 'services';
        $page_name = 'insurances';
        $useVue = true;
        $institutes = Institute::latest('id')->get();
        $page_title = 'التامينات';


        return view("admin.insurances.index", compact('department_name', 'page_name', 'useVue', 'institutes' ,'page_title'));
    }

    public function getInsurances()
    {
        $insurances = Insurances::latest('id')->with('institute' , 'institute.city' , 'institute.country')->paginate(10);
        return response()->json(['insurances' => $insurances]);
    }

    public function create()
    {
        $Institutes = Institute::latest('id')->get();
        $department_name = 'services';
        $page_name = 'add-insurances';
        $page_title = 'التامينات';
        $useVue = true;
        $countries = Country::all();
        $exchange_rates = ExchangeRate::all();
        return view("admin.insurances.create", compact('department_name', 'page_name', 'Institutes','page_title' , 'countries' , 'useVue' , 'exchange_rates'));
    }

    public function store(InsurancesRequest $request)
    {
        $price_amount = $request->price;
        $price = $request->price;
        $converted_price = currency_convertor($request->currency_exchange, 'SAR' , $price_amount);
        $exchange_money = ExchangeRate::where('currency_code' , $request->currency_exchange)->get()[0]->exchange_rates;
        $price = $converted_price + $exchange_money*$price_amount;

        $insurances = Insurances::create([
            'institute_id' => $request->institute_id,
            'price'=>$price,
            'currency_code'=>$request->currency_exchange,
            'currency_amount'=>$price_amount,
        ]);

        session()->flash('alert_message', ['message' => "تم اضافه الخدمه بنجاح", 'icon' => 'success']);
        return redirect()->route('insurances.index');
    }

    public function show(Insurances $Insurances)
    {
        //
    }

    public function edit($id)
    {

    }
    public function editInsuarnce($id)
    {

        $insurance = Insurances::find($id);
        $Institutes = Institute::latest('id')->get();
        $department_name = 'services';
        $page_name = 'insurances';
        $page_title = 'التامينات';
        $countries = Country::all();
        $useVue = true;
        $exchange_rates = ExchangeRate::all();
        return view("admin.insurances.edit", compact('department_name', 'page_name', 'Institutes', 'insurance','page_title' , 'countries' , 'useVue' , 'exchange_rates'));
    }

    public function update(InsurancesRequest $request, Insurances $Insurances)
    {

        $price_amount = $request->price;
        $price = $request->price;
        $converted_price = currency_convertor($request->currency_exchange, 'SAR' , $price_amount);
        $exchange_money = ExchangeRate::where('currency_code' , $request->currency_exchange)->get()[0]->exchange_rates;
        $price = $converted_price + $exchange_money*$price_amount;


        $insurance = Insurances::find($request->id);
        $insurance->institute_id = $request->institute_id;
        $insurance->price=$price;
        $insurance->currency_code=$request->currency_exchange;
        $insurance->currency_amount=$price_amount;
        $insurance->save();
        session()->flash('alert_message', ['message' => 'تم تعديل التامين', 'icon' => 'success']);
        return back();

    }

    public function destroy($id)
    {
        $insurance = Insurances::find($id);
        $insurance->delete();
        session()->flash('alert_message', ['message' => 'تم حذف التامين', 'icon' => 'error']);
        return back();

    }

    public function filter(Request $request)
    {
        $institute_id = $request->institute_id;

        $Insurances = new Insurances();

        if ($institute_id != null) {
            $Insurances = $Insurances->where("institute_id", $institute_id);
        }


        if (!$institute_id) {
            $Insurances = $Insurances->with('institute')->latest('id')->paginate(10);
            return response()->json(['insurances' => $Insurances]);
        }
 
        $Insurances = $Insurances->with('institute' , 'institute.city' , 'institute.country')->latest('id')->paginate(10);
        return response()->json(['insurances' => $Insurances]);

    }

}
