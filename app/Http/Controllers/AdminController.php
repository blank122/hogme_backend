<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function admindashboard()
    {
        //return the view for admin dashboard
        return view('admin.partials.dashboard');
    }

    public function getStarted()
    {
        //return the get started page
        return view('getstarted');
    }

    public function home()
    {
        return view('landingpage');
    }

    public function loginPostAdmin(Request $request)
    {
        $admin_creds = [
            'email'=> $request->email,
            'password' => $request->password,
        ];


        if(!Auth::attempt($admin_creds)){
            return redirect()->route('home')->with('error', 'Invalid Credentials ');
        }


        if($request->user()->role === 'admin')
        {
            return redirect()->route('admindashboard')->with('success', 'Welcome admin ');
        }
        if($request->user()->role === 'farmers' && $request->user()->status ==='Approve')
        {
            return redirect()->route('admindashboard')->with('success', 'Welcome User ');
        }
        if($request->user()->role === 'farmers' && $request->user()->status !== 'Approve')
        {
            return redirect()->route('home')->with('error', 'Your application is still on going');
        }

        else
        {
            return back()->with('error', 'Unauthorized Access');

        }

    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout Successfully');
    }

}
