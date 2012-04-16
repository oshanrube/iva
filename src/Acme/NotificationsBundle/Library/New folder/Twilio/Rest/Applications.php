<?php
namespace Acme\NotificationsBundle\Library\Twilio\Rest;
use Acme\NotificationsBundle\Library\Twilio\ListResource;
class Applications
    extends ListResource
{
    public function create($name, array $params = array())
    {
        return parent::_create(array(
            'FriendlyName' => $name
        ) + $params);
    }
}
