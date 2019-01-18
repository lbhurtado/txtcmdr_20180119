<?php

namespace App\Missive\Domain\Repositories;

use App\Missive\Domain\Models\Airtime;

class AirtimeRepository
{
	public function create($data, $credits = null)
	{
		return Airtime::updateOrCreate(
			array_only($data, 'key'), 
			array_merge($data, [
				'credits' => $credits
			])
		);
	}
}