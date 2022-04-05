<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_name_en',
        'partner_name_lith',
        'partner_slug_en',
        'partner_slug_lith',
        'partner_image',
    ];
}
