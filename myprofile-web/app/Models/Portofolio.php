<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portfolios'; //

    protected $fillable = [
        'title',
        'description',
        'image',
        'github_link'
    ];
}
