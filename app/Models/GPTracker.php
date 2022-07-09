<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'gp',
        'medication',
        'advice'
    ];
}
