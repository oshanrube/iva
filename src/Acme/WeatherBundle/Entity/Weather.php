<?php

namespace Acme\WeatherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\WeatherBundle\Entity\Weather
 */
class Weather
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $datetime
     */
    private $datetime;

    /**
     * @var string $location
     */
    private $location;

    /**
     * @var string $condition_id
     */
    private $condition_id;


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
     * Set datetime
     *
     * @param integer $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * Get datetime
     *
     * @return integer 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set condition_id
     *
     * @param string $conditionId
     */
    public function setConditionId($conditionId)
    {
        $this->condition_id = $conditionId;
    }

    /**
     * Get condition_id
     *
     * @return string 
     */
    public function getConditionId()
    {
        return $this->condition_id;
    }
    /**
     * @var Acme\WeatherBundle\Entity\WCondition
     */
    private $wcondition;


    /**
     * Set wcondition
     *
     * @param Acme\WeatherBundle\Entity\WCondition $wcondition
     */
    public function setWcondition(\Acme\WeatherBundle\Entity\WCondition $wcondition)
    {
        $this->wcondition = $wcondition;
    }

    /**
     * Get wcondition
     *
     * @return Acme\WeatherBundle\Entity\WCondition 
     */
    public function getWcondition()
    {
        return $this->wcondition;
    }
}