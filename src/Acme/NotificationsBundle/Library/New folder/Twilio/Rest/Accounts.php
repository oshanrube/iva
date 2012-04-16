<?php
namespace Acme\NotificationsBundle\Library\Twilio\Rest;

use Acme\NotificationsBundle\Library\Twilio\ListResource;

class Accounts
    extends ListResource
{
    public function create(array $params = array())
    {
        return parent::_create($params);
    }
}
