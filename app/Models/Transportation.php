<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $primaryKey = 'trans_id';

    protected $fillable = [
        'trans_name',
        'trans_img',
        'trans_type',
        'trans_sdesc',
        'trans_ldesc',
        'trans_website',
    ];

    
}
