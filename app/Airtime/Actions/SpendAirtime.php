<?php

namespace App\Airtime\Actions;

use App\Missive\Domain\Models\SMS;
use App\Airtime\Actions\ActionAbstract;
use App\Airtime\Responders\SpendAirtimeResponder;
use App\Airtime\Domain\Services\SpendAirtimeService;

class SpendAirtime
{
	protected $service;

	protected $responder;

	public static function invoke(SMS $sms, ActionAbstract $action)
	{
		$xxx = app(static::class);

		$pivot = $xxx->service->handle($sms, $action);

		return $xxx->responder->withPivot($pivot)->respond();
	}

	public function __construct(SpendAirtimeService $service, SpendAirtimeResponder $responder)
	{
		$this->service = $service;
		$this->responder = $responder;
	}
}