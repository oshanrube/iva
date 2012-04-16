<?php
namespace AcmeotificationsBundleibrarywilioest;
class OutgoingCallerIds
    extends ListResource
{
    public function create($phoneNumber, array $params = array())
    {
        return parent::_create(array(
            'PhoneNumber' => $phoneNumber,
        ) + $params);
    }
}
