<?php

namespace App\Missive\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use App\Airtime\Domain\Traits\SpendsAirtime;

class Contact extends Model
{
	use SpendsAirtime;

    protected $fillable = [
    	'mobile',
    	'name',
    ];
}
