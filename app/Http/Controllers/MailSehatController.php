<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MailSehatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        

        $listSurat = Mail::where('type_id', 2)->get();

        return view('home.content.report.mail.index', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratSehat',
            'type' => 'suratSehat',
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
            'active' => 'suratSehat',
            'type' => 'suratSehat',
            'dokter' => $dokter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $request->request->add(['uuid' => $uuid, 'type_id' => 2]);
        
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
        ]);

        Mail::create($tervalidasi);

        return to_route('keterangan-sehat.index')->with('success', 'Data Surat sehat berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $surat = Mail::where('uuid', $uuid)->first();

        return view('home.content.report.mail.show', [
            'title' => 'Trika Klinik | Surat',
            'active' => 'suratSehat',
            'type' => 'suratSehat',
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
            'active' => 'suratSehat',
            'type' => 'suratSehat',
            'dokter' => $dokter,
            'surat' => $surat,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $request->request->add(['uuid' => $uuid, 'type_id' => 2]);
        
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
        ]);


        Mail::where('uuid', $uuid)->update($tervalidasi);

        return to_route('keterangan-sehat.index')->with('success', 'Data Surat Dokter berhasil disunting.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
