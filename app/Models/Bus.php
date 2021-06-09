<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = "bus";
    protected $fillable = ['id_trayek', 'kapasitas', 'total_penumpang', 'status', 'cam_address'];
}
