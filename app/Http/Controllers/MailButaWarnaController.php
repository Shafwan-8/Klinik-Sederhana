<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MailButaWarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listSurat = Mail::where('type_id', 3)->get();

        return view('home.content.report.mail.index', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratButaWarna',
            'type' => 'suratButaWarna',
            'surat' => $listSurat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokter = Dokter::all();
        $kondisi = Mail::KONDISI;

        return view('home.content.report.mail.create', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratButaWarna',
            'type' => 'suratButaWarna',
            'kondisi' => $kondisi,
            'dokter' => $dokter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $request->request->add(['uuid' => $uuid, 'type_id' => 3]);
        
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
            'type_id' => '',
            'kondisi' => '',
        ]);

        Mail::create($tervalidasi);

        return to_route('keterangan-buta-warna.index')->with('success', 'Data surat buta warna berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $surat = Mail::where('uuid', $uuid)->first();

        return view('home.content.report.mail.show', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratButaWarna',
            'type' => 'suratButaWarna',
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
        $kondisi = Mail::KONDISI;

        return view('home.content.report.mail.edit', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratButaWarna',
            'type' => 'suratButaWarna',
            'kondisi' => $kondisi,
            'dokter' => $dokter,
            'surat' => $surat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $request->request->add(['uuid' => $uuid, 'type_id' => 3]);
        
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
            'type_id' => '',
            'kondisi' => '',
        ]);

        Mail::where('uuid', $uuid)->update($tervalidasi);

        return to_route('keterangan-buta-warna.index')->with('success', 'Data Surat buta warna berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
