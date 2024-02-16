<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Dokter;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $idDokter = $this->getIdDokterYangLogin();
        $dokter = Dokter::where('id', $id)->first();
        // dd($dokter);
        $title = 'Trika Klinik | Profile';
        $active = 'profile';
        return view('home.content.profile.index', 
                compact('title', 'active', 'idDokter', 'dokter'));
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
        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);

        $tervalidasi = $request->validate([
            'no_ktp' => 'numeric',
            'no_hp' => 'numeric',
            'sip' => 'numeric',
            'alamat' => 'string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $dokter->update($tervalidasi);
        $user->update($request->validate([
            'email' => 'email|unique:users,email',
            'password' => ''
        ]));
        

        if ($request->hasFile('foto')) {
            if ($dokter->foto) {
                Storage::disk('public')->delete($dokter->foto);
            }
            
            $namaFile = time() .'_'. Str::snake($request->foto->getClientOriginalName());
            $fotoBaru = $request->file('foto')->storeAs('images/dokter', $namaFile, 'public');
            $dokter->update(['foto' => $fotoBaru]);
        }
        
        return redirect()->back()->with('success', 'Profile berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
