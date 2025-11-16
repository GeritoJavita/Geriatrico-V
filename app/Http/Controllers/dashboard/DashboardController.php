<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

 public function dashboard()
    {
        return view('layouts.dashboard_admin');
    }
 public function dashboard_admin()
    {
        return view('layouts.dashboard_admin');
    }

}