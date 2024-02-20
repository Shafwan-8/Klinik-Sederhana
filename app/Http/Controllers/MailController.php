<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Patient;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function mailDokter($id) {

        $inspection = Inspection::find($id);

        $pasien = Patient::find($inspection->patient_id);

        return view('home.content.surat.index', [
            'title' => 'Trika Klinik | Surat Keterangan',
            'patient' => $pasien,
            'inspection' => $inspection,
            'active' => 'pemeriksaan',
            'surat' => 'dokter',
        ]);
    }

    public function mailButaWarna($id) {

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

    public function mailSehat($id) {

        $inspection = Inspection::find($id);

        $pasien = Patient::find($inspection->patient_id);

        return view('home.content.surat.index', [
            'title' => 'Trika Klinik | Surat Keterangan',
            'patient' => $pasien,
            'inspection' => $inspection,
            'active' => 'pemeriksaan',
            'surat' => 'sehat',
        ]);
    }
}
