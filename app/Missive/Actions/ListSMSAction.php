<?php

namespace App\Missive\Actions;

use Illuminate\Http\Request;
use App\Missive\Responders\ListSMSResponder;
use App\Missive\Domain\Services\ListSMSService;

class ListSMSAction
{
	protected $service;

	protected $responder;

	public function __construct(ListSMSService $service, ListSMSResponder $responder)
	{
		$this->service = $service;
		$this->responder = $responder;
	}

	public function __invoke(Request $request)
	{
		$smss = $this->service->handle();

		return $this->responder->withResponse($smss)->respond();
	}
}