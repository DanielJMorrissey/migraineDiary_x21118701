<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'stress',
        'low_water_intake',
        'chocolate',
        'cheese',
        'yeast_goods',
        'yoghurt',
        'fruit',
        'nuts',
        'olives',
        'tomato',
        'soy',
        'vinegar',
        'medication',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
