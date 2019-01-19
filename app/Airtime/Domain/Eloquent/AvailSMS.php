<?php

namespace App\Airtime\Domain\Eloquent;

class AvailSMS extends Availment
{
	public function key()
	{
		return 'sms';
	}
}