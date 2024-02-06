<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'no_ktp',
        'no_hp',
        'sip',
        'alamat',
        'foto',
        'inisial',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function inspection()
    {
        return $this->hasMany(Inspection::class);
    }

    public function patients()
    {
        $data = Patient::where('dokter_id', $this->id)->get();
        return $data;
    }   



    

    // protected $guarded = ['id'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
