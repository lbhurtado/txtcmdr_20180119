<?php

namespace App\Airtime\Responders;

use App\Airtime\Domain\Models\Airtime;

class ChargeAirtimeResponder
{
	protected $pivot;

	public function respond()
	{
		\Log::info("SpendAirtimeResponder::respond");
		\Log::info($this->pivot);

		return $this->pivot;
	}

	public function withPivot($pivot)
	{
		$this->pivot = $pivot;

		return $this;
	}
}
