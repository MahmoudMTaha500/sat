<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{

    public function index()
    {
        $department_name = 'exchange-rates';
        $page_name = 'exchange rates';
        $exchange_rates = ExchangeRate::get();
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
}
