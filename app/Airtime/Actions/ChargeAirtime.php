<?php

namespace App\Airtime\Actions;

use App\Missive\Domain\Models\SMS;
use App\Airtime\Responders\ChargeAirtimeResponder;
use App\Airtime\Domain\Services\ChargeAirtimeService;

class ChargeAirtime
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

	public function __construct(ChargeAirtimeService $service, ChargeAirtimeResponder $responder)
	{
		$this->service = $service;
		$this->responder = $responder;
	}
}