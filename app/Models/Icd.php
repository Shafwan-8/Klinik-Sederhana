<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd extends Model
{
    use HasFactory;

    protected $table = 'icdx';
    protected $primaryKey = 'icId';
    public $incrementing = false;

    protected $guarded = [''];

    public $timestamps = false;
}
