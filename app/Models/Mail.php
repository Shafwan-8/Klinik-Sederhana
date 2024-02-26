<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid',
        'type_id',
        'nomor_surat',
        'departemen',
        'nama', 
        'nik',
        'umur',
        'jk',
        'pekerjaan',
        'alamat',
        'lama_hari',
        'tanggal_mulai',
        'tanggal_selesai',
        'catatan',
        'lokasi',
        'tanggal',
        'pengirim',
    ];

}
