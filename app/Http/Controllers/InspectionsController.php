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
            'active' => 'pengguna'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $patient = Patient::find($id);
        return view('home.content.pemeriksaan.tambah', [
            'title' => 'Trika Klinik | Tambah Riwayat Pemeriksaan',
            'patient' => $patient,
            'active' => 'Riwayat'
            
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
            'deha' => '',
            'tb' => '',
            'bb' => '',
            'subjektif' => '',
            'objektif' => '',
            'assesment' => '',
            'plan' => '',
            'diagnosa' => '',
            'tindakan' => '',
            'patient_id' => '',
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
        $patient = Patient::find($id);
        return view('home.content.pemeriksaan.pilih', [
            'title' => 'Trika Klinik | Riwayat Pemeriksaan',
            'inspections' => $inspection,
            'patient' => $patient,
            'active' => 'pengguna',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inspection = Inspection::find($id);
        $patient = Patient::find($id);
        return view('home.content.pemeriksaan.edit', [
            'title' => 'Trika Klinik | Edit Riwayat',
            'patient' => $patient,
            'inspection' => $inspection,
            'active' => 'pengguna'
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
            'deha' => '',
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
        
        return to_route('pemeriksaan.index')->with('success', 'Riwayat Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inspection = Inspection::find($id);        
        $inspection->delete();
        return to_route('pemeriksaan.index')->with('success', 'Riwayat Berhasil Dihapus!');
    }
}
