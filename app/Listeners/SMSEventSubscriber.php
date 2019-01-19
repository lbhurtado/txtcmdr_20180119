<?php

namespace App\Listeners;

use App\Airtime\Actions\AvailSMS;
use App\Airtime\Actions\SpendAirtime;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Missive\Domain\Events\{SMSEvent, SMSEvents};

class SMSEventSubscriber
{
    public function __construct()
    {
        //
    }

    public function onSMSCreated(SMSEvent $event)
    {
        $sms = $event->getSMS();

        \Log::info($sms);

        SpendAirtime::invoke($sms, new AvailSMS());
    }

    public function subscribe($events)
    {
        $events->listen(
            SMSEvents::CREATED, 
            SMSEventSubscriber::class.'@onSMSCreated'
        );
    }  
}
