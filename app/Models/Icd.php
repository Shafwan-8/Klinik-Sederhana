<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd extends Model
{
    protected $table = 'icdx';

    use HasFactory;

    protected $guarded = ['icId'];

}
