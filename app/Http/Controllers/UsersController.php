<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->get();
        return view('home.content.pengguna.pengguna', [
            'title' => 'Daftar Pengguna',
            'users' => $user
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = User::ROLES;
        
        return view('home.content.pengguna.tambah', [
            'title' => 'Tambah Pengguna',
            'roles' => $roles,
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
        ]);

        User::create($validatedData);

        return to_route('user.index')->with('success', 'Pengguna Berhasil Ditambahkan!');

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
        $user = User::find($id);
        $roles = User::ROLES;

        return view('home.content.pengguna.edit', [
            'title' => 'Edit Pengguna',
            'user' => $user,
            'roles' => $roles,
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

        return to_route('user.index')->with('success', 'Pengguna Berhasil Diubah!');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);        
        $user->delete();
        return to_route('user.index')->with('success', 'Pengguna Berhasil Dihapus!');
    }
}
