<?php

namespace App\Airtime\Domain\Services;

use App\Missive\Domain\Models\{Contact, SMS};
use App\Missive\Domain\Repositories\Eloquent\ContactRepository;

class SpendAirtimeService
{
	protected $sms;

	protected $contacts;

	public function __construct(ContactRepository $contacts)
	{
		$this->contacts = $contacts;
	}

	public function handle(SMS $sms, $availment)
	{
		tap($this->withSMS($sms)->getOrigin(), function ($origin) use ($availment, &$record) {
			$record = $origin->spendAirtime($availment);
		});

		return $record;
	}

	protected function withSMS(SMS $sms)
	{
		$this->sms = $sms;

		return $this;
	}

	protected function getOrigin(): Contact
	{
		$mobile = $this->sms->from;

		return $this->contacts->withMobile($mobile);
	}
}