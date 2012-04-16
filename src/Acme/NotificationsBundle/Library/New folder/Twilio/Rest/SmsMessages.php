<?php
namespace AcmeotificationsBundleibrarywilioest;
class SmsMessages
    extends ListResource
{
    public function getSchema()
    {
        return array(
            'class' => 'class SmsMessages',
            'basename' => 'SMS/Messages',
            'instance' => 'class SmsMessage',
            'list' => 'sms_messages',
        );
    }

    function create($from, $to, $body, array $params = array())
    {
        return parent::_create(array(
            'From' => $from,
            'To' => $to,
            'Body' => $body
        ) + $params);
    }
}
