<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'lp_id';

    protected $fillable = ['lp_id', 'lp_name', 'lp_img', 'lp_type', 'lp_sdesc', 'lp_ldesc', 'lp_price', 'lp_lat', 'lp_longi', 'lp_address', 'lp_contact', 'lp_website'];
}
