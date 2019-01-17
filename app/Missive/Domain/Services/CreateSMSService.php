<?php

namespace App\Missive\Domain\Services;

use App\App\Domain\ServiceInterface;
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
		return tap($this->smss->create(array_only($data, ['from', 'to', 'message'])), function ($sms) {
			$this->contacts->create(['mobile' => $sms->from]);	
			$this->contacts->create(['mobile' => $sms->to]);			
		})->load(['origin', 'destination']);
	}
}