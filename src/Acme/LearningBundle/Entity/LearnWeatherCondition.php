<?php

namespace Acme\LearningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\LearningBundle\Entity\LearnWeatherCondition
 */
class LearnWeatherCondition
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $userId
     */
    private $userId;

    /**
     * @var integer $wConditionId
     */
    private $wConditionId;

    /**
     * @var text $city
     */
    private $city;

    /**
     * @var float $lng
     */
    private $lng;

    /**
     * @var float $lat
     */
    private $lat;


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
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set wConditionId
     *
     * @param integer $wConditionId
     */
    public function setWConditionId($wConditionId)
    {
        $this->wConditionId = $wConditionId;
    }

    /**
     * Get wConditionId
     *
     * @return integer 
     */
    public function getWConditionId()
    {
        return $this->wConditionId;
    }

    /**
     * Set city
     *
     * @param text $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return text 
     */
    public function getCity()
    {
        return $this->city;
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
}