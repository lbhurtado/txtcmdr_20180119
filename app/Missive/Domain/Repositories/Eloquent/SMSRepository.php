<?php

namespace App\Missive\Domain\Repositories\Eloquent;

use App\Missive\Domain\Models\SMS;

class SMSRepository
{
	public function all()
	{
		return SMS::get();
	}

	public function create($data)
	{
		return SMS::create($data);
	}
}