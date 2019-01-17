<?php

namespace App\Missive\Responders;

use App\Missive\Domain\Models\SMS;
use App\App\Responders\ResponderInterface;

class CreateSMSResponder implements ResponderInterface
{
	public function respond($data)
	{
		return response()->json($data, 200);
	}
}
