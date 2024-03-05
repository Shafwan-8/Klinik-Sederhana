<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idDokter = $this->getIdDokterYangLogin();
        $user = User::latest()->get();
        return view('home.content.pengguna.pengguna', [
            'title' => 'Trika Klinik | Daftar Pengguna',
            'users' => $user,
            'idDokter' => $idDokter,
            'active' => 'pengguna'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idDokter = $this->getIdDokterYangLogin();
        $roles = User::ROLES;
        
        return view('home.content.pengguna.tambah', [
            'title' => 'Trika Klinik | Tambah Pengguna',
            'roles' => $roles,
            'idDokter' => $idDokter,
            'active' => 'pengguna'
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'role' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $namaFile = time().'_'.Str::snake($request->avatar->getClientOriginalName());
            $validatedData['avatar'] = $request->file('avatar')->storeAs('images/avatar', $namaFile, 'public');
        }

        User::create($validatedData);

        return to_route('pengguna.index')->with('success', 'Pengguna Berhasil Ditambahkan!');

        // return view('home.content.pengguna.pengguna')
        //     ->with('success', 'Pengguna Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $idDokter = $this->getIdDokterYangLogin();
        $user = User::find($id);
        $roles = User::ROLES;

        return view('home.content.pengguna.edit', [
            'title' => 'Trika Klinik | Edit Pengguna',
            'user' => $user,
            'idDokter' => $idDokter,
            'roles' => $roles,
            'active' => 'pengguna'
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => '',
        ]);

        $user = User::find($id);
        if (!$request->password) {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);
        } else {
            $user->update($validatedData);
        }

        return to_route('pengguna.index')->with('success', 'Pengguna Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);        
        $user->delete();
        return to_route('pengguna.index')->with('success', 'Pengguna Berhasil Dihapus!');
    }
}
