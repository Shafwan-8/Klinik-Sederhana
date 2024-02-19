<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Icd;
use App\Models\Inspection;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InspectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idDokter = $this->getIdDokterYangLogin();
        if(auth()->user()->dokter->first() && auth()->user()->role == 'dokter') {   // dokter yang lagi login saja bisa akses
            $dokter = auth()->user()->dokter->first();
            $inisial = $dokter->inisial;
            $patients = Patient::where('medical_record_numb', 'like', $inisial . '%')->latest()->get();
        } else {     
            $patients = Patient::latest()->get(); // bukan dokter yang bisa akses, ya admin lah yang bisa akses
        }

        return view('home.content.pemeriksaan.index', [
            'title' => 'Trika Klinik | Daftar Pasien',
            'patients' => $patients,
            'idDokter' => $idDokter,
            'active' => 'pemeriksaan'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $idDokter = $this->getIdDokterYangLogin();
        // $inisial = Dokter::find($id)->latest()->first();
        $patient = Patient::where('id' ,$id)->latest()->first();
        $waktu = Carbon::setLocale('id');
        $waktu = Carbon::now()->format('j-M-Y');
        $dokter = auth()->user()->dokter->first();
        if (!$dokter){
            return redirect()->back()->with('error', 'Anda belum buat akun dokter, Silahkan hubungi admin bila ingin membuat akun dokter.');
        }
        $inisial = $dokter->inisial;
        $inisial = strtoupper($inisial);
        $kode = $inisial.'-'.date("y").date("m").date("d");
        $lastNumber = Inspection::where('no_registrasi', 'like', $inisial . '%')->latest()->first();
        if ($lastNumber === null) {     
            $no_regis = str_pad(1, 3, '0', STR_PAD_LEFT);   // jika dokter belum buat riwayat pasien
        } else {
            $lastNumber = (int)substr($lastNumber->no_registrasi, -3);   // bila dokter sudah pernah buat riwayat pasien
            $no_regis = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }
            $kode = $kode . $no_regis;
        
        return view('home.content.pemeriksaan.tambah', [
            'title' => 'Trika Klinik | Tambah Riwayat Pemeriksaan',
            'patient' => $patient,
            'kode' => $kode,
            'waktu' => $waktu,
            'idDokter' => $idDokter,
            'active' => 'pemeriksaan'
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $data_lainnya = ($request->tindakan_lainnya);
        $diagnosa_lainnya = ($request->diagnosa_lainnya);
        // foreach ($request->tindakan_lainnya as $key => $value) {
            // $data_lainnya[] = $value;
            
            $request->request->add(['patient_id' => $id, 
                                    'no_registrasi' => $request->no_registrasi, 
                                    'tindakan_lainnya' => json_encode($data_lainnya), 
                                    'diagnosa_lainnya' => json_encode($diagnosa_lainnya)]);

            $validatedData = $request->validate([
                'td' => 'required',
                'suhu' => '',
                'nadi' => '',
                'so2' => '',
                'pernafasan' => '',
                'detail' => '',
                'tb' => '',
                'bb' => '',
                'subjektif' => '',
                'objektif' => '',
                'assesment' => '',
                'plan' => '',
                'diagnosa' => 'required',
                'diagnosa_lainnya' => '',
                'tindakan' => '',
                'harga_tindakan' => '',
                'tindakan_lainnya' => '',
                'patient_id' => '',
                'no_registrasi' => '',
            ]);
            
        // }

        Inspection::create($validatedData);

        return to_route('pemeriksaan.show', $id)->with('success', 'Riwayat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $idDokter = $this->getIdDokterYangLogin();
        $surat = Inspection::MAIL;
        $inspection = Inspection::where('patient_id', $id)->latest()->get();
        $patient = Patient::where('id', $id)->first();

        return view('home.content.pemeriksaan.pilih', [
            'title' => 'Trika Klinik | Riwayat Pemeriksaan',
            'inspections' => $inspection,
            'patient' => $patient,
            'idDokter' => $idDokter,
            'mails' => $surat,
            'active' => 'pemeriksaan',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $idDokter = $this->getIdDokterYangLogin();
        $inspection = Inspection::find($id);
        $patient = Patient::find($inspection->patient_id);
        return view('home.content.pemeriksaan.edit', [
            'title' => 'Trika Klinik | Edit Riwayat',
            'patient' => $patient,
            'kode' => $inspection->no_registrasi,
            'inspection' => $inspection,
            'idDokter' => $idDokter,
            'active' => 'pemeriksaan'
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inspection = Inspection::find($id);

        $data_lainnya = ($request->tindakan_lainnya);
        $diagnosa_lainnya = ($request->diagnosa_lainnya);

        $request->request->add(['patient_id' => $inspection->patient_id, 
                                'no_registrasi' => $request->no_registrasi, 
                                'tindakan_lainnya' => json_encode($data_lainnya), 
                                'diagnosa_lainnya' => json_encode($diagnosa_lainnya),
                                'no_registrasi' => $inspection->no_registrasi
                            ]);

        $validatedData = $request->validate([
            'td' => 'required',
            'suhu' => '',
            'nadi' => '',
            'so2' => '',
            'pernafasan' => '',
            'detail' => '',
            'tb' => '',
            'bb' => '',
            'subjektif' => '',
            'objektif' => '',
            'assesment' => '',
            'plan' => '',
            'diagnosa' => 'required',
            'diagnosa_lainnya' => '',
            'tindakan' => '',
            'harga_tindakan' => '',
            'tindakan_lainnya' => '',
            'patient_id' => '',
            'no_registrasi' => '',
        ]);

        
        
        $inspection->update($validatedData);
        
        return to_route('pemeriksaan.show', $inspection->patient_id)->with('success', 'Riwayat Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inspection = Inspection::find($id);        
        $inspection->delete();
        return redirect()->back()->with('success', 'Riwayat Berhasil Dihapus!');
    }

    public function detail(string $id) 
    {
        $idDokter = $this->getIdDokterYangLogin();
        $inspection = Inspection::find($id);

        $diagnosa_lainnya = json_decode($inspection->diagnosa_lainnya);
        $layanan_lainnya = json_decode($inspection->tindakan_lainnya);

        $patient = Patient::find($inspection->patient_id);
        return view('home.content.pemeriksaan.detail', [
            'title' => 'Trika Klinik | Detail Riwayat',
            'patient' => $patient,
            'kode' => $inspection->no_registrasi,
            'inspection' => $inspection,
            'diagnosa_lainnya' => $diagnosa_lainnya,
            'layanan_lainnya' => $layanan_lainnya,
            'idDokter' => $idDokter,
            'active' => 'pemeriksaan'
        ]);

    }

}
