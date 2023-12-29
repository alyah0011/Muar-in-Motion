<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $primaryKey = 'homepage_id';

    protected $fillable = [
        'website_title',
        'website_desc',
        'banner_img',
        'history_img',
        'history_desc',
        // Add other fields here
    ];
}
