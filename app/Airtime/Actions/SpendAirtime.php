<?php

namespace App\Airtime\Actions;

use App\Missive\Domain\Models\SMS;
use App\Airtime\Responders\SpendAirtimeResponder;
use App\Airtime\Domain\Services\SpendAirtimeService;

class SpendAirtime
{
	protected $service;

	protected $responder;

	protected $airtime_contact;

	public static function invoke(SMS $sms, $availment)
	{
		$action = tap(app(static::class), function ($action) use ($sms, $availment) {
			$action->airtime_contact = $action->service->handle($sms, $availment);
		})
		;

		return $action->responder->withPivot($action->airtime_contact)->respond();
	}

	public function __construct(SpendAirtimeService $service, SpendAirtimeResponder $responder)
	{
		$this->service = $service;
		$this->responder = $responder;
	}
}