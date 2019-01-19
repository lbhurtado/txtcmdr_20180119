<?php

namespace App\Airtime\Actions;

use App\Airtime\Domain\Models\Airtime;

abstract class ActionAbstract
{
	abstract public function key();

	public function getModel()
	{
		return Airtime::where('key', $this->key())->first();
	}

	public function getAirtime(): Airtime
	{
		return Airtime::where('key', $this->key())->first();
	}
}