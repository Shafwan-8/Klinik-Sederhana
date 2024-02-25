<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Inspection;
use App\Models\Mail;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use NunoMaduro\Collision\Adapters\Laravel\Inspector;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        

        $listSurat = Mail::latest()->get();

        return view('home.content.report.mail.index', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratDokter',
            'type' => 'suratDokter',
            'surat' => $listSurat,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokter = Dokter::all();

        return view('home.content.report.mail.create', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratDokter',
            'type' => 'suratDokter',
            'dokter' => $dokter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $request->request->add(['uuid' => $uuid]);
        
        $tervalidasi = $request->validate([
            'nomor_surat' => '',
            'departemen' => '',
            'nama' => '', 
            'nik' => '',
            'umur' => '',
            'jk' => '',
            'pekerjaan' => '',
            'alamat' => '',
            'lama_hari' => '',
            'tanggal_mulai' => '',
            'tanggal_selesai' => '',
            'catatan' => '',
            'lokasi' => '',
            'tanggal' => '',
            'pengirim' => '',
            'uuid' => '',
        ]);

        // $tervalidasi['uuid'] = $uuid; // Menambahkan id ke dalam data yang akan disimpan


        Mail::create($tervalidasi);

        return to_route('surat.index')->with('success', 'Data Surat Dokter berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $surat = Mail::where('uuid', $uuid)->first();

        return view('home.content.report.mail.show', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratDokter',
            'type' => 'suratDokter',
            'surat' => $surat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        $surat = Mail::where('uuid', $uuid)->first();
        $dokter = Dokter::all();

        return view('home.content.report.mail.edit', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratDokter',
            'type' => 'suratDokter',
            'dokter' => $dokter,
            'surat' => $surat,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $request->request->add(['uuid' => $uuid]);
        
        $tervalidasi = $request->validate([
            'nomor_surat' => '',
            'departemen' => '',
            'nama' => '', 
            'nik' => '',
            'umur' => '',
            'jk' => '',
            'pekerjaan' => '',
            'alamat' => '',
            'lama_hari' => '',
            'tanggal_mulai' => '',
            'tanggal_selesai' => '',
            'catatan' => '',
            'lokasi' => '',
            'tanggal' => '',
            'pengirim' => '',
            'uuid' => '',
        ]);


        Mail::where('uuid', $uuid)->update($tervalidasi);

        return to_route('surat.index')->with('success', 'Data Surat Dokter berhasil disunting.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

        //
    }

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
