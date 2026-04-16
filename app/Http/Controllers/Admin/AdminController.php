<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminDashboard()
    {
       
        $admin = Session::get('admin');
        if($admin){
            return view('admin.admin-index', compact('admin'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors([
                "login_error" => "Invalid email or password"
            ])->withInput();
        }

        Session::put('admin', $admin);
        if(Session::get('admin')){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');    
    }

    public function adminCategories(){
        $admin = Session::get('admin');
        if($admin){
            return view('admin.categories.categories', compact('admin'));
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function adminLogout(){
        Session::forget('admin');
        return redirect()->route('admin.login');
    }
}
