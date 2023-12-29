<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $primaryKey = 'att_id';

    protected $fillable = [
        'att_img',
        'att_cat',
        'att_name',
        'att_sdesc',
        'att_ldesc',
        'att_website',
        'att_contact',
        'att_lat',
        'att_longi',
        'average_rating', // Add 'average_rating' to the fillable array
    ];

    protected $appends = ['reviews_count'];

    public function updateAverageRating()
    {
        // Calculate the average rating for the attraction
        $averageRating = $this->reviews()->average('rev_rating');

        // Update the average_rating column in the attractions table
        $this->update(['average_rating' => $averageRating]);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'att_id', 'att_id');
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'att_id', 'att_id');
    }

    
}
