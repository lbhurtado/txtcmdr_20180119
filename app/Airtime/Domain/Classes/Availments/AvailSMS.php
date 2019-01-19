<?php

namespace App\Airtime\Domain\Classes\Availments;

use App\Airtime\Domain\Classes\Availment;

class AvailSMS extends Availment
{
	public function key()
	{
		return 'sms';
	}
}