<?php

namespace App\Airtime\Domain\Traits;

use Exception;
use App\Airtime\Domain\Models\Airtime;
use App\Airtime\Actions\ActionAbstract;
use App\Airtime\Domain\Formatters\CreditsFormatter;

trait SpendsAirtime
{
	public function spendAirtime(ActionAbstract $action)
	{
		if (! $model = $action->getModel()) {
			throw new Exception("Airtime model for key [{$action->key()}] not found.");
		}

		$this->airtimes()->attach($model);
	}

	public function airtimes()
	{
		return $this->belongsToMany(Airtime::class)->withTimestamps();
	}

	public function charges()
	{
		return (new CreditsFormatter($this->airtimes()->sum('credits')))->shorthand();
	}
}