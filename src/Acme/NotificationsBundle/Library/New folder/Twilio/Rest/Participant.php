<?php
namespace AcmeotificationsBundleibrarywilioest;
class Participant
    extends InstanceResource
{
    public function mute()
    {
        $this->update('Muted', 'true');
    }
}
