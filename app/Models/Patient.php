<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";

    protected $fillable = [
        'nik_numb',
        'name',
        'gender',
        'date_birth',
        'address',
        'hp_numb',
        'bpjs_numb',
        'img_ktp',
        'email',
        'job',
        'img',
        'medical_record_numb',
    ];

    public function getDateBirthAttribute()
    {
        return Carbon::parse($this->attributes['date_birth'])
                ->translatedFormat('d F Y');
    }

}
