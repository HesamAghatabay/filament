<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alarm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'alarm',
        'description',
        'remindes'
    ];
    protected $casts = [
        'alarm' => 'datetime',
        'remindes' => 'datetime',
        'description' => 'array', // فقط اگر json نگهش داشتی
    ];
}
