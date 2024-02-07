<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icd;

class MasterIcdxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Trika Klinik | Master ICDX';
        $active = 'icdx';
        $icd = Icd::orderBy('icId', 'desc')->paginate(10)->withQueryString();
        $dataIcdx = $icd;
        return view('home.content.master.icdx.index', compact('dataIcdx','title','active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Trika Klinik | Master ICDX';
        $active = 'icdx';
        return view('home.content.master.icdx.create', compact('title','active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $icdxData = $request->validate([
            'icId' => 'required|unique:icdx',
            "icJenisPenyakit" => 'nullable',
            "icNamaLokal" => 'nullable',
            "icDTD" => 'nullable',
            "icSebabSakit" => 'nullable',
        ]);


        Icd::create($icdxData);
    
        return to_route('icdx.index')->with('success', 'Data ICDX berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $icId)
    {
        $icdx = Icd::where('icId', $icId)->firstOrFail();
        $title = 'Sunting ICDX';
        $active = 'icdx';
        return view('home.content.master.icdx.edit', compact('title', 'icdx', 'active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $icId)
    {
        $icdx = Icd::where('icId', $icId)->firstOrFail();
    
        $icdxData = $request->validate([
            "icJenisPenyakit" => 'nullable',
            "icNamaLokal" => 'nullable',
            "icDTD" => 'nullable',
            "icSebabSakit" => 'nullable',
        ]);

        
        $icdx->update([
            "icJenisPenyakit" => $request->icJenisPenyakit,
            "icNamaLokal" => $request->icNamaLokal,
            "icDTD" => $request->icDTD,
            "icSebabSakit" => $request->icSebabSakit,
        ]);
        
        return to_route('icdx.index')->with('success', 'Data ICDX berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $icId)
    {
        $icdx = Icd::findOrFail($icId);

        $icdx->delete();

        return redirect()->back()->with('success', 'Data pasien berhasil dihapus');
    }
}
