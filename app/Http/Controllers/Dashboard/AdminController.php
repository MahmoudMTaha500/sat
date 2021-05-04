<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        if(auth()->check()){

            return redirect('dashboard');
        } else{
            return view('admin.login.login');

        }

    }

    public function create()
    {
        //
    }

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


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
