<?php

namespace App\Missive\Domain\Services;

use App\App\Domain\ServiceInterface;
use App\App\Domain\Payloads\{GenericPayload, ValidationPayload};
use App\Missive\Domain\Repositories\SMSRepository;

class ListSMSService implements ServiceInterface
{
	protected $smss;

	public function __construct(SMSRepository $smss)
	{
		$this->smss = $smss;
	}

	public function handle($data = [])
	{
		return new GenericPayload($this->smss->all());
	}
}