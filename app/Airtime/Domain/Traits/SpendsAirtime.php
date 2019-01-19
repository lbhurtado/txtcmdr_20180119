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
		if (! $airtime = $action->getAirtime()) {
			throw new Exception("Airtime model for key [{$action->key()}] not found.");
		}

		return tap($this->airtimes(), function ($relation) use ($airtime) {
					$relation->attach($airtime);
				})
				->where('contact_id', '=', $this->id)
				->where('airtime_id', '=', $airtime->id)
				->withPivot('id')
				->orderBy('pivot_created_at', 'desc')
				->first()
				->pivot
				;
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