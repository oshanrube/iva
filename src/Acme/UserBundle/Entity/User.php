<?php
// src/Acme/UserBundle/Entity/User.php

namespace Acme\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length="255")
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="The name is too short.", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="The name is too long.", groups={"Registration", "Profile"})
     */
    protected $name;
    
    /**
     * @ORM\Column(type="float")
     */
    private $avgspeed;
    
    /**
     * @ORM\Column(type="string",length="255", nullable=true)
     */
    private $fbToken;
    
    /**
     * @ORM\Column(type="string",length="25", nullable=true)
     */
    private $loginType;
    
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lng;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lat;
    /**
     * @ORM\Column(type="string",length="16", nullable=true)
     */
    private $deviceId;
    /**
     * @ORM\Column(type="integer",length="11", nullable=true)
     */
    private $phoneNum;
    /**
     * @ORM\Column(type="integer",length="11", nullable=true)
     */
    private $backupPhoneNum;

	public function __construct()
	{
		parent::__construct();
		// your own logic
	}
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	public function getDeviceId() {
		return $this->deviceId;
	}
	
	public function setDeviceId($deviceId) {
		$this->deviceId = $deviceId;
	}
	public function getPhoneNum() {
		return $this->phoneNum;
	}
	public function setPhoneNum($phoneNum) {
		$this->phoneNum = $phoneNum;
	}
	public function getBackupPhoneNum() {
		return $this->backupPhoneNum;
	}
	public function setBackupPhoneNum($backupPhoneNum) {
		$this->backupPhoneNum = $backupPhoneNum;
	}
	/**
     * Set lng
     *
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * Get lng
     *
     * @return float 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set lat
     *
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set avgspeed
     *
     * @param float $avgspeed
     */
    public function setAvgspeed($avgspeed)
    {
        $this->avgspeed = $avgspeed;
    }

    /**
     * Get avgspeed
     *
     * @return float 
     */
    public function getAvgspeed()
    {
    	if($this->avgspeed == 0){return 60;}
        return $this->avgspeed;
    }
    /**
     * Set fbToken
     *
     * @param string $fbToken
     */
    public function setFbToken($fbToken)
    {
        $this->fbToken = $fbToken;
    }

    /**
     * Get fbToken
     *
     * @return string 
     */
    public function getFbToken()
    {
        return $this->fbToken;
    }
    /**
     * Set loginType
     *
     * @param string $loginType
     */
    public function setLoginType($loginType)
    {
        $this->loginType = $loginType;
    }

    /**
     * Get loginType
     *
     * @return string 
     */
    public function getLoginType()
    {
        return $this->loginType;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}