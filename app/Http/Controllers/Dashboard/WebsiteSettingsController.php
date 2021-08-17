<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{

    public function refund_policy()
    {
        $refund_policy = WebsiteSettings::get()[0]->refund_policy_ar;
        $department_name='website-settings';
        $page_name='refund-policy';
        $page_title = 'شروط الاستردات';
        return view('admin.website_settings.refund_policy' , compact('department_name' , 'page_name','refund_policy','page_title'));
    }

    public function update_refund_policy(Request $request)
    {
        WebsiteSettings::where(['id'=>'1'])->update([
            'refund_policy_ar'=>$request->refund_policy,
        ]);
        session()->flash('alert_message', ['message' => 'تم تحديث شروط الاستردات', 'icon' => 'success']);
        return back();
    }

    public function terms_conditions()
    {
        $terms_conditions = WebsiteSettings::get()[0]->terms_conditions_ar;
        $department_name='website-settings';
        $page_name='terms-conditions';
        $page_title = 'الشروط و الاحكام';
        return view('admin.website_settings.terms_conditions' , compact('department_name' , 'page_name','terms_conditions','page_title'));
    }

    public function update_terms_conditions(Request $request)
    {
        WebsiteSettings::where(['id'=>'1'])->update([
            'terms_conditions_ar'=>$request->terms_conditions,
        ]);

        session()->flash('alert_message', ['message' => 'تم تحديث الشروط و الاحكام بنجاح', 'icon' => 'success']);
        return back();
    }
}
