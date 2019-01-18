<?php

namespace App\Missive\Responders;

use App\Missive\Domain\Models\SMS;
use App\Missive\Domain\Resources\SMSResource;
use App\App\Responders\{Responder, ResponderInterface};

class ListSMSResponder extends Responder implements ResponderInterface
{
	public function respond()
	{
		return SMSResource::collection($this->response->getData());
		return response()->json($this->response->getData(), $this->response->getStatus());
	}
}
