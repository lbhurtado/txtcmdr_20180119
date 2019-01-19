<?php

namespace App\Listeners;

use App\Airtime\Actions\ChargeAirtime;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Missive\Domain\Events\{SMSEvent, SMSEvents};
use App\Missive\Domain\Repositories\Eloquent\ContactRepository;

class SMSEventSubscriber
{
    protected $sms;

    protected $contacts;

    public function __construct(ContactRepository $contacts)
    {
        $this->contacts = $contacts;
    }

    public function onSMSCreated(SMSEvent $event)
    {        
        $this->captureSMS($event)
                ->persistContact()
                ->chargeContact();
    }

    public function subscribe($events)
    {
        $events->listen(
            SMSEvents::CREATED, 
            SMSEventSubscriber::class.'@onSMSCreated'
        );
    }

    protected function captureSMS(SMSEvent $event)
    {
        $this->sms = $event->getSMS();

        return $this;
    }

    protected function persistContact()
    {
        $this->contacts->updateOrCreate([
            'mobile' => $this->sms->from
        ]);

        return $this;
    }

    protected function chargeContact()
    {
        ChargeAirtime::invoke($this->sms, 'charge-text');

        return $this;
    }
}
