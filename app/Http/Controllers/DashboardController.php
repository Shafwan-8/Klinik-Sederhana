<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $idDokter = $this->getIdDokterYangLogin();

        return view('home.dashboard.layouts.dashboard', [
            "title" => "Trika Klinik | Dashboard",
            "active" => 'dashboard',
            'idDokter' => $idDokter,
        ]);

    }
}
