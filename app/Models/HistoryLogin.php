<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLogin extends Model
{
    use HasFactory;

    protected $table = 'history_login';

    protected $guarded = ['id'];
}