<?php

namespace App\Missive\Domain\Traits;

use App\Missive\Domain\Models\Airtime;
use App\Missive\Actions\AvailSMS;
use App\App\Actions\ActionAbstract;
use Exception;
use App\App\Formatters\CreditsFormatter;

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