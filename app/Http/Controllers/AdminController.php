<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Return login page
   public function loginPage()
   {
       return view('admin/auth/login');
   }

    //login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');


        $count = Admin::where('email', $email)->where('password', $password)->count();

        if ($count === 1){
            $request->session()->put('email', $email);
            return 1;
        }else{
            return 0;
        }
    }

    //Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin');
    }
}
