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
        'kondisi',
        'lama_hari',
        'tanggal_mulai',
        'tanggal_selesai',
        'catatan',
        'lokasi',
        'tanggal',
        'pengirim',
    ];

    public const KONDISI= [
        'tidak buta warna ' => 'Buta Warna',
        'buta warna parsial' => 'Buta Warna Parsial',
        'buta warna total' => 'Buta Warna Total',
        
    ];

}
