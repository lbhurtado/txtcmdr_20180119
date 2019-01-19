<?php

namespace App\Airtime\Domain\Classes;

class AvailSMS extends Availment
{
	public function key()
	{
		return 'sms';
	}
}