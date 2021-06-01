<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trayek extends Model
{
    use HasFactory;
    protected $table = 'trayek';
    protected $fillable = ['nama_trayek'];
}
