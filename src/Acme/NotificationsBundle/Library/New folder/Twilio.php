<?php
namespace Acme\NotificationsBundle\Library;

use Acme\NotificationsBundle\Library\Twilio\CachingDataProxy;
use Acme\NotificationsBundle\Library\Twilio\TinyHttp;
use Acme\NotificationsBundle\Library\Twilio\Capability;
use Acme\NotificationsBundle\Library\Twilio\DataProxy;
use Acme\NotificationsBundle\Library\Twilio\PartialApplicationHelper;
use Acme\NotificationsBundle\Library\Twilio\Page;
use Acme\NotificationsBundle\Library\Twilio\ArrayDataProxy;
use Acme\NotificationsBundle\Library\Twilio\InstanceResource;
use Acme\NotificationsBundle\Library\Twilio\AutoPagingIterator;
use Acme\NotificationsBundle\Library\Twilio\RequestValidator;
use Acme\NotificationsBundle\Library\Twilio\Twiml;
use Acme\NotificationsBundle\Library\Twilio\Resource;
use Acme\NotificationsBundle\Library\Twilio\ListResource;
use Acme\NotificationsBundle\Library\Twilio\RestException;
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
 * Twilio API client interface.
 *
 * @category Services
 * @package  Twilio
 * @author   Neuman Vong <neuman@twilio.com>
 * @license  http://creativecommons.org/licenses/MIT/ MIT
 * @link     http://pear.php.net/package/Twilio
 */
class Twilio extends Resource
{
    const USER_AGENT = 'twilio-php/3.2.2';

    protected $http;
    protected $version;

    /**
     * Constructor.
     *
     * @param string               $sid      Account SID
     * @param string               $token    Account auth token
     * @param string               $version  API version
     * @param Http $_http    A HTTP client
     */
    public function __construct(
        $sid,
        $token,
        $version = '2010-04-01',
        TinyHttp $_http = null
    ) {
        $this->version = $version;
        if (null === $_http) {
            $_http = new TinyHttp(
                "https://api.twilio.com",
                array("curlopts" => array(CURLOPT_USERAGENT => self::USER_AGENT))
            );
        }
        $_http->authenticate($sid, $token);
        $this->http = $_http;
        $this->accounts = new Accounts($this);
        $this->account = $this->accounts->get($sid);
    }

    /**
     * GET the resource at the specified path.
     *
     * @param string $path   Path to the resource
     * @param array  $params Query string parameters
     *
     * @return object The object representation of the resource
     */
    public function retrieveData($path, array $params = array())
    {
        $path = "/$this->version/$path.json";
        return empty($params)
            ? $this->_processResponse($this->http->get($path))
            : $this->_processResponse(
                $this->http->get("$path?" . http_build_query($params, '', '&'))
            );
    }

    /**
     * DELETE the resource at the specified path.
     *
     * @param string $path   Path to the resource
     * @param array  $params Query string parameters
     *
     * @return object The object representation of the resource
     */
    public function deleteData($path, array $params = array())
    {
        $path = "/$this->version/$path.json";
        return empty($params)
            ? $this->_processResponse($this->http->delete($path))
            : $this->_processResponse(
                $this->http->delete("$path?" . http_build_query($params, '', '&'))
            );
    }

    /**
     * POST to the resource at the specified path.
     *
     * @param string $path   Path to the resource
     * @param array  $params Query string parameters
     *
     * @return object The object representation of the resource
     */
    public function createData($path, array $params = array())
    {
        $path = "/$this->version/$path.json";
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        return empty($params)
            ? $this->_processResponse($this->http->post($path, $headers))
            : $this->_processResponse(
                $this->http->post(
                    $path,
                    $headers,
                    http_build_query($params, '', '&')
                )
            );
    }

    /**
     * Convert the JSON encoded resource into a PHP object.
     *
     * @param array $response 3-tuple containing status, headers, and body
     *
     * @return object PHP object decoded from JSON
     */
    private function _processResponse($response)
    {
        list($status, $headers, $body) = $response;
        if ($status == 204) {
            return TRUE;
        }
        if (empty($headers['Content-Type'])) {
            throw new DomainException('Response header is missing Content-Type');
        }
        switch ($headers['Content-Type']) {
        case 'application/json':
            return $this->_processJsonResponse($status, $headers, $body);
            break;
        case 'text/xml':
            return $this->_processXmlResponse($status, $headers, $body);
            break;
        }
        throw new DomainException(
            'Unexpected content type: ' . $headers['Content-Type']);
    }

    private function _processJsonResponse($status, $headers, $body) {
        $decoded = json_decode($body);
        if (200 <= $status && $status < 300) {
            return $decoded;
        }
        throw new RestException(
            (int)$decoded->status,
            $decoded->message,
            isset($decoded->code) ? $decoded->code : null,
            isset($decoded->more_info) ? $decoded->more_info : null
        );
    }

    private function _processXmlResponse($status, $headers, $body) {
        $decoded = simplexml_load_string($body);
        throw new RestException(
            (int)$decoded->Status,
            (string)$decoded->Message,
            (string)$decoded->Code,
            (string)$decoded->MoreInfo
        );
    }
}
