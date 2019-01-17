<?php

namespace App\Missive\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable = [
    	'from',
    	'to',
    	'message',
    ];

    public function origin()
    {
    	return $this->hasOne(Contact::class, 'mobile', 'from');
    }

    public function destination()
    {
    	return $this->hasOne(Contact::class, 'mobile', 'to');
    }
}
