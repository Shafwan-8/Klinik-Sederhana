<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $guarded = [];

    public $incrementing = false;

    public $primaryKey = 'id';

    public const methodPayment = [
        'Umum (Karyawan)' => 'Umum (Karyawan)',
        'Umum (Masyarakat)' => 'Umum (Masyarakat)',
        'Umum' => 'Umum',
        'BPJS' => 'BPJS',
    ];
}
