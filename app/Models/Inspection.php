<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tindakan_lainnya' => 'json',
        'diagnosa_lainnya' => 'json',
    ];

    // protected $dates = ['start_date', 'end_date', 'show_at', 'hide_at', 'created_at', 'updated_at'];
    // public function user()
    // {
    //     return $this->belongsTo(Dokter::class, 'user_id','id');
    // }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    
}
