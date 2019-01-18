<?php

namespace App\Missive\Responders;

use App\Missive\Domain\Models\SMS;
use App\Missive\Domain\Resources\SMSResource;
use App\App\Domain\Payloads\ValidationPayload;
use App\App\Responders\{Responder, ResponderInterface};

class CreateSMSResponder extends Responder implements ResponderInterface
{
	public function respond()
	{
		if ($this->response instanceof ValidationPayload) {
			return response()->json($this->response->getData(), $this->response->getStatus());
		}

		return (new SMSResource($this->response->getData()))
			->response()
			->setStatusCode($this->response->getStatus());
	}
}
