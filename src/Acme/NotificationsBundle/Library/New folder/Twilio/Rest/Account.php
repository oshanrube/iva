<?php
namespace Acme\NotificationsBundle\Library\Twilio\Rest;
use Acme\NotificationsBundle\Library\Twilio\InstanceResource;
class Account
    extends InstanceResource
{
    protected function init()
    {
        $this->setupSubresources(
            'applications',
            'available_phone_numbers',
            'outgoing_caller_ids',
            'calls',
            'conferences',
            'incoming_phone_numbers',
            'notifications',
            'outgoing_callerids',
            'recordings',
            'sms_messages',
            'transcriptions'
        );

        $this->sandbox = new Sandbox(
            new CachingDataProxy('Sandbox', $this)
        );
    }
}
