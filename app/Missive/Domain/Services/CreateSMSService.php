<?php

namespace App\Missive\Domain\Services;

use App\Airtime\Actions\AvailSMS;
use App\App\Domain\ServiceInterface;
use App\Airtime\Domain\Models\Airtime;
use App\Missive\Domain\Repositories\Eloquent\SMSRepository;
use App\App\Domain\Payloads\{GenericPayload, ValidationPayload};

class CreateSMSService implements ServiceInterface
{
	protected $smss;

	public function __construct(SMSRepository $smss)
	{
		$this->smss = $smss;
	}

	public function handle($data = [])
	{
		if (($validator = $this->validate($data))->fails()) {
			return new ValidationPayload($validator->getMessageBag());
		}

		$attributes = array_only($data, ['from', 'to', 'message']);

		$sms = $this->smss->create($attributes)->load(['origin']);

		return new GenericPayload($sms);
	}

	protected function validate($data)
	{
		return validator($data, [
			'from' => 'required',
			'to' => 'required'
		]);
	}
}