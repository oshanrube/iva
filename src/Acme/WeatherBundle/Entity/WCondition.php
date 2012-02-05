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
     * @var string $condition
     */
    private $condition;


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
     * Set condition
     *
     * @param string $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    /**
     * Get condition
     *
     * @return string 
     */
    public function getCondition()
    {
        return $this->condition;
    }
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Acme\WeatherBundle\Entity\Weather
     */
    private $weather;

    public function __construct()
    {
        $this->weather = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var string $icon
     */
    private $icon;


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
     * @var float $criticality
     */
    private $criticality;


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
}