<?php
namespace AcmeotificationsBundleibrarywilioest;
class AvailablePhoneNumbers
    extends ListResource
{
    public function getLocal($country)
    {
        $curried = new PartialApplicationHelper();
        $curried->set(
            'getList',
            array($this, 'getList'),
            array($country, 'Local')
        );
        return $curried;
    }
    public function getTollFree($country)
    {
        $curried = new PartialApplicationHelper();
        $curried->set(
            'getList',
            array($this, 'getList'),
            array($country, 'TollFree')
        );
        return $curried;
    }
    public function getList($country, $type, array $params = array())
    {
        return $this->retrieveData("$country/$type", $params);
    }
}
