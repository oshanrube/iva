<?php
namespace Acme\NotificationsBundle\Library\Twilio;
use Acme\NotificationsBundle\Library\Twilio\Rest\Call;
use Acme\NotificationsBundle\Library\Twilio\Rest\Sandbox;
use Acme\NotificationsBundle\Library\Twilio\Rest\Applications;
use Acme\NotificationsBundle\Library\Twilio\Rest\Application;
use Acme\NotificationsBundle\Library\Twilio\Rest\Conferences;
use Acme\NotificationsBundle\Library\Twilio\Rest\OutgoingCallerIds;
use Acme\NotificationsBundle\Library\Twilio\Rest\SmsMessages;
use Acme\NotificationsBundle\Library\Twilio\Rest\Transcriptions;
use Acme\NotificationsBundle\Library\Twilio\Rest\Recording;
use Acme\NotificationsBundle\Library\Twilio\Rest\IncomingPhoneNumber;
use Acme\NotificationsBundle\Library\Twilio\Rest\Participant;
use Acme\NotificationsBundle\Library\Twilio\Rest\Account;
use Acme\NotificationsBundle\Library\Twilio\Rest\IncomingPhoneNumbers;
use Acme\NotificationsBundle\Library\Twilio\Rest\ShortCodes;
use Acme\NotificationsBundle\Library\Twilio\Rest\AvailablePhoneNumber;
use Acme\NotificationsBundle\Library\Twilio\Rest\Conference;
use Acme\NotificationsBundle\Library\Twilio\Rest\SmsMessage;
use Acme\NotificationsBundle\Library\Twilio\Rest\Calls;
use Acme\NotificationsBundle\Library\Twilio\Rest\Accounts;
use Acme\NotificationsBundle\Library\Twilio\Rest\OutgoingCallerId;
use Acme\NotificationsBundle\Library\Twilio\Rest\AvailablePhoneNumbers;
use Acme\NotificationsBundle\Library\Twilio\Rest\e;
use Acme\NotificationsBundle\Library\Twilio\Rest\Participants;
use Acme\NotificationsBundle\Library\Twilio\Rest\Notifications;
use Acme\NotificationsBundle\Library\Twilio\Rest\Transcription;
use Acme\NotificationsBundle\Library\Twilio\Rest\Recordings;
use Acme\NotificationsBundle\Library\Twilio\Rest\Notification;
/**
 * Abstraction of a Twilio resource.
 *
 * @category Services
 * @package  Twilio
 * @author   Neuman Vong <neuman@twilio.com>
 * @license  http://creativecommons.org/licenses/MIT/ MIT
 * @link     http://pear.php.net/package/Twilio
 */ 
abstract class Resource
    implements DataProxy
{
    protected $name;
    protected $proxy;
    protected $subresources;

    public function __construct(DataProxy $proxy)
    {
        $this->subresources = array();
        $this->proxy = $proxy;
        $this->name = get_class($this);
        $this->init();
    }

    protected function init()
    {
        // Left empty for derived classes to implement
    }

    public function retrieveData($path, array $params = array())
    {
        return $this->proxy->retrieveData($path, $params);
    }

    public function deleteData($path, array $params = array())
    {
        return $this->proxy->deleteData($path, $params);
    }

    public function createData($path, array $params = array())
    {
        return $this->proxy->createData($path, $params);
    }

    public function getSubresources($name = null)
    {
        if (isset($name)) {
            return isset($this->subresources[$name])
                ? $this->subresources[$name]
                : null;
        }
        return $this->subresources;
    }

    public function addSubresource($name, Resource $res)
    {
        $this->subresources[$name] = $res;
    }

    protected function setupSubresources()
    {
        foreach (func_get_args() as $name) {
            $constantized = ucfirst(Resource::camelize($name));
            $type = $constantized;
            echo $name;exit();
            $this->addSubresource($name, new $type($this));
        }
    }

    public static function decamelize($word)
    {
        return preg_replace(
            '/(^|[a-z])([A-Z])/e',
            'strtolower(strlen("\\1") ? "\\1_\\2" : "\\2")',
            $word
        );
    }

    public static function camelize($word)
    {
        return preg_replace('/(^|_)([a-z])/e', 'strtoupper("\\2")', $word);
    }
}

