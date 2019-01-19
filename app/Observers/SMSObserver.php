<?php

namespace App\Observers;

use App\Missive\Domain\Models\SMS;
use App\Missive\Domain\Events\{SMSEvent, SMSEvents};

class SMSObserver
{
    public function created(SMS $sms)
    {
        event(SMSEvents::CREATED, new SMSEvent($sms));
    }
}
