<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
<<<<<<< HEAD

=======
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    public function index()
    {
        if(auth()->check()){

            return redirect('dashboard');
        } else{
            return view('admin.login.login');

        }

    }

<<<<<<< HEAD
=======
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    public function create()
    {
        //
    }

<<<<<<< HEAD
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
          $remember = $request->has('remember') ? true : false;
          if (\Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
              return redirect()->route('dashboard');
          } else {
              return back()->withErrors(['login_error' =>'البريد الالكتروني او كلمة المرور غير صحيحين']);
          } 
    }


=======
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request->all());
          $remember = $request->has('remember') ? true : false;
        //   $data = $request->except('_token', 'password', 'password_confirmation');
        //   $data['password'] = bcrypt($request->password);
        //   Student::create($data);
          if (\Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
              return redirect()->route('dashboard');
          } else {
              return back();
          } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    public function show($id)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    public function edit($id)
    {
        //
    }

<<<<<<< HEAD

=======
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    public function update(Request $request, $id)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    public function destroy($id)
    {
        //
    }
}
