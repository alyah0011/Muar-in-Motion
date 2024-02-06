<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'eve_id';

    protected $fillable = [
        'eve_img',
        'eve_name',
        'eve_cat',
        'eve_sdesc',
        'eve_ldesc',
        'eve_date',
        'eve_time',
        'eve_lati',
        'eve_longi',
        'eve_address',
        'eve_contact',
    ];
    
    use HasFactory;
}
