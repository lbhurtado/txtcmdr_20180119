<?php

namespace App\Airtime\Domain\Repositories\Eloquent;

use App\Airtime\Domain\Models\Airtime;

class AirtimeRepository
{
    public function byKey($key) 
    {
    	return Airtime::where('key', $key)->firstOrFail();
    }
}