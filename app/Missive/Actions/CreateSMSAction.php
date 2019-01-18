<?php

namespace App\Missive\Actions;

use Illuminate\Http\Request;
use App\Missive\Responders\CreateSMSResponder;
use App\Missive\Domain\Services\CreateSMSService;

class CreateSMSAction
{
	protected $service;

	protected $responder;

	public function __construct(CreateSMSService $service, CreateSMSResponder $responder)
	{
		$this->service = $service;
		$this->responder = $responder;
	}

	public function __invoke(Request $request)
	{
		$sms = $this->service->handle($request->only('from', 'to', 'message'));

		return $this->responder->withResponse($sms)->respond();
	}
}