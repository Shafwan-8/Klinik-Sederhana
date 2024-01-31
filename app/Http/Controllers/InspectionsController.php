<?php

namespace App\Http\Controllers;

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
        $patient = Patient::latest()->get();
        return view('home.content.pemeriksaan.index', [
            'title' => 'Trika Klinik | Daftar Pasien',
            'patients' => $patient,
            'active' => 'pemeriksaan'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $patient1 = Patient::find($id)->latest()->first();
        $patient2 = Patient::find($id)->first();
        $waktu = Carbon::setLocale('id');
        $waktu = Carbon::now()->format('j-M-Y');
        $rekam_medis = $patient2->medical_record_numb;

        
        $inisial = substr($rekam_medis, 0, 4);
        $inisial = strtoupper($inisial);
        $kode = $inisial.'-'.date("y").date("m").date("d");
        // $kode = $kode . str_pad(1, 3, '0', STR_PAD_LEFT);
            
        if ($patient1 !== $rekam_medis) {
            // Ambil nilai terakhir dari angka 001
            $lastNumber = Inspection::where('patient_id', $id)->latest()->first();
            $lastNumber = $lastNumber ? (int)substr($lastNumber->no_registrasi, -3) : 0;
            
            // Tambahkan 1 ke nilai terakhir dari angka 001
            $lastNumber++;
            
            // Buat kode baru dengan menambahkan angka 001 ke kode lama
            $kodeBaru = $kode . str_pad($lastNumber, 3, '0', STR_PAD_LEFT);
        }

        
        // Simpan kode baru ke database
        // Inspection::create([
        //     'no_registrasi' => $kodeBaru 
        // ]);

        return view('home.content.pemeriksaan.tambah', [
            'title' => 'Trika Klinik | Tambah Riwayat Pemeriksaan',
            'patient' => $patient1,
            'kode' => $kodeBaru,
            'waktu' => $waktu,
            'active' => 'pemeriksaan'
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->request->add(['patient_id' => $id]);
        $validatedData = $request->validate([
            'td' => '',
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
            'diagnosa' => '',
            'tindakan' => '',
            'patient_id' => '',
            'no_registrasi' => 'unique:inspections,no_registrasi',
        ]);

        Inspection::create($validatedData);

        return to_route('pemeriksaan.show', $id)->with('success', 'Riwayat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inspection = Inspection::where('patient_id', $id)->latest()->get();
        $patient = Patient::where('id', $id)->first();

        // $regist = Patient::where('medical_record_numb', $patient->medical_record_numb)->first();
        
        // $lastNumber = Patient::where('medical_record_numb', 'like', $inisial . '%')->latest()->first();
        //     if ($lastNumber === null) {
        //         $numberMedic = str_pad(1, 8, '0', STR_PAD_LEFT);
        //     } else {
        //         $lastNumber = (int)substr($lastNumber->medical_record_numb, -3);
        //         $numberMedic = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        //     }
        //         $medical =$kode.$numberMedic;

        return view('home.content.pemeriksaan.pilih', [
            'title' => 'Trika Klinik | Riwayat Pemeriksaan',
            'inspections' => $inspection,
            'patient' => $patient,
            'active' => 'pemeriksaan',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inspection = Inspection::find($id);
        $patient = Patient::find($inspection->patient_id);
        return view('home.content.pemeriksaan.edit', [
            'title' => 'Trika Klinik | Edit Riwayat',
            'patient' => $patient,
            'kode' => $inspection->no_registrasi,
            'inspection' => $inspection,
            'active' => 'pemeriksaan'
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inspection = Inspection::find($id);

        $validatedData = $request->validate([
            'td' => '',
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
            'diagnosa' => '',
            'tindakan' => '',
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
}
