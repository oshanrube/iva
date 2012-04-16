<?php
namespace Acme\NotificationsBundle\Library\Twilio\Rest;
class Call
    extends InstanceResource
{
    public function hangup()
    {
        $this->update('Status', 'completed');
    }

    protected function init()
    {
        $this->setupSubresources(
            'notifications',
            'recordings'
        );
    }
}
