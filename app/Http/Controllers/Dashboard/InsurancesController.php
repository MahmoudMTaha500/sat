<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Insurances;
use Illuminate\Http\Request;
use App\Models\Institute;
use App\Http\Requests\services\InsurancesRequest;

use function GuzzleHttp\Promise\inspect;

class InsurancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department_name = 'services';
        $page_name = 'insurances';
        $useVue=true;
        $institutes = institute::get();
        
        return view("admin.insurances.index", compact('department_name', 'page_name','useVue','institutes'));
    }

public function getInsurances(){
    $insurances = Insurances::with('institute')->paginate(10);
    return response()->json(['insurances'=>$insurances]);
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
        $page_name = 'add-insurances';
        return view("admin.insurances.create", compact('department_name', 'page_name', 'Institutes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsurancesRequest $request)
    {
        // dd($request->all());
        $insurances = Insurances::create([
            'name_ar'=>$request->name_ar,
            'institute_id'=>$request->institute_id,
            'price'=>$request->price,
            ]);
            // session()->flash('alert_message', ['message' => 'تم اضافه الدورة بنجاح', 'icon' => 'success']);

            session()->flash('alert_message', ['message'=>"تم اضافه الخدمه بنجاح", 'icon'=>'success']);
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\insurances  $insurances
     * @return \Illuminate\Http\Response
     */
    public function show(Insurances $Insurances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\insurances  $insurances
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // // $insurances = Insurances::where('id' , 1)->get()[0];
        // $Institutes = institute::get();
        // $department_name = 'insurances';
        // $page_name = 'insurances';
        // return view("admin.insurances.edit", compact('department_name', 'page_name', 'Institutes'));
    }
    public function editInsuarnce($id)
    {
        // $insurances = Insurances::where('id' , 1)->get()[0];
        // dd();
        $insurance= Insurances::find($id);
        $Institutes = institute::get();
        $department_name = 'services';
        $page_name = 'insurances';
        return view("admin.insurances.edit", compact('department_name', 'page_name', 'Institutes','insurance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\insurances  $insurances
     * @return \Illuminate\Http\Response
     */
    public function update(InsurancesRequest $request, Insurances $Insurances)
    {
        $insurance= Insurances::find($request->id);
      $insurance->name_ar=$request->name_ar;
      $insurance->institute_id=$request->institute_id;
      $insurance->price=$request->price;
      $insurance->save();
      session()->flash('alert_message',['message'=>'تم تعديل التامين','icon'=>'success']);
      return back();  
           

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\insurances  $insurances
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        $insurance= Insurances::find($id);
  $insurance->delete();
  session()->flash('alert_message',['message'=>'تم حذف التامين','icon'=>'error']);
  return back();  

    }


public function filter(Request $request)
{
    $institute_id = $request->institute_id;
    $name_ar = $request->name_ar;

    $Insurances = new Insurances();

    if ($institute_id != null) {
        $Insurances = $Insurances->where("institute_id", $institute_id);
    }
    if ($name_ar != null) {
        $Insurances = $Insurances->where("name_ar", 'LIKE', "%{$request->name_ar}%");

    }

if(!$name_ar && !$institute_id ) {
    $Insurances = $Insurances->with('institute')->paginate(10);
    return response()->json(['insurances' => $Insurances]);
}

    $Insurances = $Insurances->with('institute')->paginate(10);
    return response()->json(['insurances' => $Insurances]);
    
    // dd($request->all());
}
    
}
