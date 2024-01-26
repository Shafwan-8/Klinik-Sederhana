<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('home.dashboard.layouts.index', [
            "title" => "Trika Klinik | Dashboard",
            "active" => 'dashboard'
        ]);

    }
}
