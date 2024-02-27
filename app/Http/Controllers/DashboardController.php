<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Inspection;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $idDokter = $this->getIdDokterYangLogin();
        $dokter = Dokter::count();
        $pasien = Patient::count();
        $pemeriksaan = Inspection::count();
        $grafikDashboard = $this->getGrafikPemeriksaanDashboard();

        return view('home.dashboard.layouts.dashboard', [
            "title" => "Trika Klinik | Dashboard",
            "active" => 'dashboard',
            "dokter" => $dokter,
            "pasien" => $pasien,
            "pemeriksaan" => $pemeriksaan,
            'idDokter' => $idDokter,
            'grafikDashboard' => $grafikDashboard
        ]);

    }

    public function getGrafikPemeriksaanDashboard() 
    {
        $labels = [];
        $data = [];
        $colors = ['#f56954'];

        // Ambil tanggal 10 hari yang lalu menggunakan Carbon
        $dateTenDaysAgo = Carbon::now()->subDays(9);

        for ($i = 0; $i < 10; $i++) {
            $date = $dateTenDaysAgo->copy()->addDays($i);
            $count = Inspection::whereDate('created_at', $date)->count();
    
            $labels[] = $date->format('d-m-Y');
            $data[] = $count;
        }

        // Define dataset
        $datasets = [
            [
                'label' => 'Pemeriksaan',
                'backgroundColor' => $colors,
                'data' => $data
            ]
        ];

        return compact('labels', 'datasets');
    }
}
