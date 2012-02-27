<?php

namespace Acme\WeatherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\WeatherBundle\Entity\WCondition
 */
class WCondition
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $icon
     */
    private $icon;

    /**
     * @var float $criticality
     */
    private $criticality;

    /**
     * @var Acme\WeatherBundle\Entity\Weather
     */
    private $weather;

    /**
     * @var Acme\TaskBundle\Entity\Notification
     */
    private $wcondition;

    public function __construct()
    {
        $this->weather = new \Doctrine\Common\Collections\ArrayCollection();
    $this->wcondition = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set icon
     *
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set criticality
     *
     * @param float $criticality
     */
    public function setCriticality($criticality)
    {
        $this->criticality = $criticality;
    }

    /**
     * Get criticality
     *
     * @return float 
     */
    public function getCriticality()
    {
        return $this->criticality;
    }

    /**
     * Add weather
     *
     * @param Acme\WeatherBundle\Entity\Weather $weather
     */
    public function addWeather(\Acme\WeatherBundle\Entity\Weather $weather)
    {
        $this->weather[] = $weather;
    }

    /**
     * Get weather
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * Add wcondition
     *
     * @param Acme\TaskBundle\Entity\Notification $wcondition
     */
    public function addNotification(\Acme\TaskBundle\Entity\Notification $wcondition)
    {
        $this->wcondition[] = $wcondition;
    }

    /**
     * Get wcondition
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getWcondition()
    {
        return $this->wcondition;
    }
}