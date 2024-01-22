<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Dokter';
        $dokters = Dokter::latest()->get();
        return view('home.content.dokter.index', compact('dokters', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $title = 'Tambah Dokter';
        return view('home.content.dokter.create', compact('users', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dokterData = $request->validate([
            'nama' => 'required|string',
            'no_ktp' => 'required|string|unique:dokter',
            'no_hp' => 'required|numeric',
            'sip' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'nullable|exists:users,id',
        ]);
    
        // Pilih user berdasarkan user_id yang dikirimkan dalam request
        $user = User::find($dokterData['user_id']);
    
        if (!$user) {
            return redirect()->route('dokter.create')->with('error', 'User not found.');
        }
    
        // Jika file foto diunggah, simpan dengan nama yang unik
        if ($request->hasFile('foto')) {
            $namaFile = time().'_'.Str::snake($request->foto->getClientOriginalName());
            $dokterData['foto'] = $request->file('foto')->storeAs('images/dokter', $namaFile, 'public');
        }
    
        // Hubungkan user dengan dokter dan simpan
        $dokters = $user->dokter()->create($dokterData);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        return view('home.content.dokter.show', [
            'title' => 'Detail Dokter',
            'dokter' => $dokter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $dokter = Dokter::findOrFail($id);
        $title = 'Sunting Dokter';
        return view('home.content.dokter.edit', compact('users', 'title', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return to_route('dokter.index')->with('error', 'Data dokter tidak ditemukan');
        }
        $tervalidasi = $request->validate([
            'nama' => 'required|string',
            'no_ktp' => 'required|string|unique:dokter',
            'no_hp' => 'required|numeric',
            'sip' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $dokter->update($tervalidasi);

        if ($request->hasFile('foto')) {
            if ($dokter->foto) {
                Storage::disk('public')->delete($dokter->foto);
            }
            
            $namaFile = time().'_'.Str::snake($request->foto->getClientOriginalName());
            $fotoBaru = $request->file('foto')->storeAs('images/dokter', $namaFile, 'public');
            $dokter->update(['foto' => $fotoBaru]);
        }
        
        return to_route('dokter.index')->with('success', 'Data dokter berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);

        if ($dokter->foto) {
            Storage::disk('public')->delete($dokter->foto);
        }

        $dokter->delete();

        return redirect()->back()->with('success', 'Data dokter berhasil dihapus');
    }
}
