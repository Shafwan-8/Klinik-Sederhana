<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
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
        
        $user = User::latest()->get();
        return view('home.content.pemeriksaan.index', [
            'title' => 'Trika Klinik | Daftar Pengguna',
            'users' => $user,
            'active' => 'pengguna'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.content.pemeriksaan.tambah', [
            'title' => 'Trika Klinik | Tambah Riwayat Pemeriksaan',
            'active' => 'Riwayat'
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inspection $inspection)
    {
        $user = User::latest()->get();
        $inspection = Inspection::latest()->get();
        return view('home.content.pemeriksaan.pilih', [
            'title' => 'Trika Klinik | Riwayat Pemeriksaan',
            'inspections' => $inspection,
            'active' => 'pengguna',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
