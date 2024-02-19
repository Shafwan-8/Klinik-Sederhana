<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Patient;
use Illuminate\Http\Request;

class mailButaWarnaContorller extends Controller
{
    //
    public function index($id) {

        $inspection = Inspection::find($id);

        $pasien = Patient::find($inspection->patient_id);

        return view('home.content.surat.index', [
            'title' => 'Trika Klinik | Surat Keterangan',
            'patient' => $pasien,
            'inspection' => $inspection,
            'active' => 'pemeriksaan',
            'surat' => 'buta-warna',
        ]);
    }
}
