<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'att_id', 'is_favourite'];

    public function attraction()
    {
        return $this->belongsTo(Attraction::class, 'att_id', 'att_id');
    }
}
