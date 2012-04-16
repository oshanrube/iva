<?php
namespace Acme\NotificationsBundle\Library\Twilio\Rest;
class Calls
    extends ListResource
{

    public static function isApplicationSid($value)
    {
        return strlen($value) == 34
            && !(strpos($value, "AP") === false);
    }

    public function create($from, $to, $url, array $params = array())
    {

        $params["To"] = $to;
        $params["From"] = $from;

        if (self::isApplicationSid($url))
            $params["ApplicationSid"] = $url;
        else
            $params["Url"] = $url;

        return parent::_create($params);
    }
}
