<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Dokter;
use App\Models\HistoryLogin;

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
        if (auth()->user()->role == 'dokter') {
            $dokter = Dokter::where('user_id', $id)->first();
            $title = 'Trika Klinik | Profile';
            $active = 'profile';
            return view('home.content.profile.index', 
                compact('title', 'active', 'dokter'));

        } else {

            $admin = User::where('id', $id)->first();
            $title = 'Trika Klinik | Profile';
            $active = 'profile';
            return view('home.content.profile.index', 
                compact('title', 'active', 'admin'));

        }
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
        $historyAvatar = HistoryLogin::where('foto', $user->avatar)->first();

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
        
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            $namaFile = time() .'_'. Str::snake($request->avatar->getClientOriginalName());
            $fotoBaru = $request->file('avatar')->storeAs('images/avatar', $namaFile, 'public');
            $user->update(['avatar' => $fotoBaru]);
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

    public function updateAdmin(Request $request, $id) {

        $user = User::findOrFail($id);
        $historyAvatar = HistoryLogin::where('foto', $user->avatar)->first();

        $tervalidasi = $request->validate([
            'name' => 'nullable|string|min:3',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:3', // Tidak wajib memvalidasi password jika tidak diberikan
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->update($tervalidasi);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            $namaFile = time() .'_'. Str::snake($request->avatar->getClientOriginalName());
            $fotoBaru = $request->file('avatar')->storeAs('images/avatar', $namaFile, 'public');
            $user->update(['avatar' => $fotoBaru]);
        }

        if ($request->password) {
            $user->update($request->validate([
                'name' => 'nullable|string|min:3',
                'email' => 'email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:3' // Tidak wajib memvalidasi password jika tidak diberikan
            ]));
        }else {
            $user->update($request->validate([
                'name' => 'nullable|string|min:3',
                'email' => 'email|dns|unique:users,email,' . $user->id,
            ]));
        }
        

        return redirect()->back()->with('success', 'Profile berhasil disunting');
    }
}
