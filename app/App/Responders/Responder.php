<?php

namespace App\App\Responders;

use App\App\Domain\Payloads\{GenericPayload, ValidationPayload};

abstract class Responder
{
	protected $response;

	protected $status = 200;
	
	public function withResponse($response)
	{
		$this->response = $response;

		if ($this->response instanceof ValidationPayload) {
			$this->status = 422;
		}

		return $this;
	}
}