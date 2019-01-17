<?php

namespace App\Missive\Domain\Repositories;

use App\Missive\Domain\Models\SMS;

class SMSRepository
{
	public function create($data)
	{
		return SMS::create($data);
	}
}