<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getIdDokterYangLogin(){

        // Ambil ID pengguna yang login
        $userId = Auth::id();

        // Temukan dokter yang terkait dengan pengguna yang login
        $doctor = Dokter::where('user_id', $userId)->first();

        // Periksa apakah dokter ditemukan
        if ($doctor) {
            // Ambil ID dokter yang terkait
            $idDokter = $doctor->id;
            return $idDokter;
        } else {
            // Tindakan yang sesuai jika pengguna yang login bukan dokter
            return null;
        }
    }
}
