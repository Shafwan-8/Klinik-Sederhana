<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikController extends Controller
{
   public function graphDiagnosis() 
    {
        $title = 'Trika Klinik | Grafik Diagnosa';
        $active = 'graph-diagnosis';
        $idDokter = $this->getIdDokterYangLogin();
        return view('home.content.grafik.grafik-diagnosis', compact('title', 'active', 'idDokter'));
    }
}
