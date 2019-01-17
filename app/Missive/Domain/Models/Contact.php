<?php

namespace App\Missive\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'mobile',
    	'name',
    ];
}
