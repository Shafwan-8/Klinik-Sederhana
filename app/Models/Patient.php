<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patient";

    protected $fillable = [
        'nik_numb',
        'name',
        'jk',
        'date_birth',
        'address',
        'hp_numb',
        'bpjs_numb',
        'img_ktp',
        'email',
        'pekerjaan',
        'medicalrecord_numb',
        'img'
    ]
}
