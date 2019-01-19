<?php

namespace App\Missive\Domain\Services;

use App\Airtime\Actions\AvailSMS;
use App\App\Domain\ServiceInterface;
use App\Airtime\Domain\Models\Airtime;
use App\App\Domain\Payloads\{GenericPayload, ValidationPayload};
use App\Missive\Domain\Repositories\{SMSRepository, ContactRepository};

class CreateSMSService implements ServiceInterface
{
	protected $smss;

	protected $contacts;

	public function __construct(SMSRepository $smss, ContactRepository $contacts)
	{
		$this->smss = $smss;
		$this->contacts = $contacts;
	}

	public function handle($data = [])
	{
		if (($validator = $this->validate($data))->fails()) {
			return new ValidationPayload($validator->getMessageBag());
		}

		$sms = tap($this->smss->create(array_only($data, ['from', 'to', 'message'])), function ($sms) {
					$contact = $this->contacts->create(['mobile' => $sms->from]);
				})
				->load(['origin'])
				;

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