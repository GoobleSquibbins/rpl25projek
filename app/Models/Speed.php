<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speed extends Model
{
    use HasFactory;

    protected $table = 'speed';
    protected $primaryKey = 'speed_id';
    protected $fillable = [
        'name',
        'duration_hours',
        'price',
    ];
}
