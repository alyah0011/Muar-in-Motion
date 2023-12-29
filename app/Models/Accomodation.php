<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;

    protected $primaryKey = 'acco_id';

    protected $fillable = [
        'acco_img',
        'acco_types',
        'acco_name',
        'acco_sdesc',
        'acco_ldesc',
        'acco_price_range',
        'acco_website',
        'acco_contact',
        'acco_lat',
        'acco_longi',
        'acco_average_rating', // Add 'average_rating' to the fillable array
    ];

    public function updateAverageRating()
    {
        // Calculate the average rating for the attraction
        $averageRating = $this->reviews()->average('rev_rating');

        // Update the average_rating column in the attractions table
        $this->update(['acco_average_rating' => $averageRating]);
    }

    public function reviews()
    {
        return $this->hasMany(AccoReview::class, 'acco_id', 'acco_id');
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }


}
