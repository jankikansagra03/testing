<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function user_dashboard()
    {
        return view('user_dashboard');
    }
    public function logout()
    {
        session()->remove('user_uname');
        return redirect('login');
    }
}
