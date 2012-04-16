<?php
namespace AcmeotificationsBundleibrarywilioest;
class Conference
    extends InstanceResource
{
    protected function init()
    {
        $this->setupSubresources(
            'participants'
        );
    }
}
