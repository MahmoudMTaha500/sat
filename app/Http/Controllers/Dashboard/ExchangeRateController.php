<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use App\Models\CoursePrice;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Support\Facades\DB;
use App\Models\Airports ;
use App\Models\residences;
use App\Models\Insurances;




class ExchangeRateController extends Controller
{

    public function index()
    {
        $department_name = 'exchange-rates';
        $page_name = 'exchange rates';
        $exchange_rates = ExchangeRate::latest('id')->get();
        $page_title = 'صرف العملات';
        return view("admin.exchange_rates.index", compact('department_name', 'page_name','exchange_rates','page_title'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ExchangeRate $exchangeRate)
    {
        //
    }

    public function edit(ExchangeRate $exchangeRate)
    {
        $exchange_rate = ExchangeRate::find($exchangeRate->id);
        $page_title = 'تعديل صرف العملة';
        $page_name  = 'تعديل صرف العملة';
        $department_name   = 'صرف العملة';
        return view("admin.exchange_rates.edit", compact('page_title' , 'exchange_rate' , 'page_name' , 'department_name'));
    }

    public function update(Request $request, ExchangeRate $exchangeRate)
    {
        ExchangeRate::where('id' , $exchangeRate->id)->update(['exchange_rates' => $request->exchange_rates]);
        session()->flash('alert_message', ['message' => 'تم تعديل صرف العملة بنجاح', 'icon' => 'success']);
        return redirect()->route('exchange-rate.index'); 
    }

    public function destroy(ExchangeRate $exchangeRate)
    {
        //
    }

    public function update_all_prices(ExchangeRate $exchangeRate , Request $request)
    {
        $exchange_rates = ExchangeRate::all();
        foreach($exchange_rates as $exchange_rate){
            $unit_price_in_sar = currency_convertor($exchange_rate->currency_code, 'SAR', 1);

            $currencies_object[$exchange_rate->currency_code] = [
               'exchange_rate' =>  $exchange_rate->exchange_rates,
               'unit_price_in_sar' => $unit_price_in_sar
            ];
        }

        $course_prices = CoursePrice::all();
        foreach($course_prices as $course_price){
            if(!empty($course_price->currency_code)){
              $currency_object = $currencies_object[$course_price->currency_code];
              $new_price = $course_price->currency_amount*($currency_object['unit_price_in_sar'] + $currency_object['exchange_rate']);
              $course_price->update(['price' => $new_price]);
            }
        }

        $airports = Airports::all();
        foreach($airports as $airport){
            $currency_object = $currencies_object[$airport->currency_code];
            $new_price = $airport->currency_amount*($currency_object['unit_price_in_sar'] + $currency_object['exchange_rate']);
            $airport->update(['price' => $new_price]);
        }


        $residences = residences::all();
        foreach($residences as $residence){
            $currency_object = $currencies_object[$residence->currency_code];
            $new_price = $residence->currency_amount*($currency_object['unit_price_in_sar'] + $currency_object['exchange_rate']);
            $residence->update(['price' => $new_price]);
        }

        $insurances = Insurances::all();
        foreach($insurances as $insurance){
            $currency_object = $currencies_object[$insurance->currency_code];
            $new_price = $insurance->currency_amount*($currency_object['unit_price_in_sar'] + $currency_object['exchange_rate']);
            $insurance->update(['price' => $new_price]);
        }

        if($request->has('dashboard_update')){
            session()->flash('alert_message', ['message' => 'تم تحديث كل العملات بنجاح', 'icon' => 'success']);
            return back(); 
        }else{
            return 'done';
        }
        
    }
}
