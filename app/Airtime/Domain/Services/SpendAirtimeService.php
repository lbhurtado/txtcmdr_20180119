<?php

namespace App\Airtime\Domain\Services;

use App\Airtime\Actions\ActionAbstract;
use App\Missive\Domain\Models\{Contact, SMS};
use App\Missive\Domain\Repositories\ContactRepository;

class SpendAirtimeService
{
	protected $sms;

	protected $contacts;

	public function __construct(ContactRepository $contacts)
	{
		$this->contacts = $contacts;
	}

	public function handle(SMS $sms, ActionAbstract $action)
	{
		tap($this->withSMS($sms)->getOrigin(), function ($origin) use ($action, &$airtime) {
			$airtime = $origin->spendAirtime($action);
		});

		return $airtime;
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