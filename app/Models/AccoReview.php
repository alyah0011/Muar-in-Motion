<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccoReview extends Model
{
    use HasFactory;

    protected $fillable = ['rev_rating', 'rev_comment'];

    public function accommodation()
    {
        return $this->belongsTo(Accomodation::class, 'acco_id', 'acco_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
