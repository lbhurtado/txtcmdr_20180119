<?php

namespace App\Airtime\Domain\Eloquent;

use App\Airtime\Domain\Models\Airtime;
use App\Airtime\Domain\Repositories\Eloquent\AirtimeRepository;

abstract class Availment
{
	protected $airtimes;

	abstract public function key();

	public function __construct(AirtimeRepository $airtimes)
	{
		$this->airtimes = $airtimes;
	}

	public function getAirtime(): Airtime
	{
		return $this->airtimes->byKey($this->key());
	}
}