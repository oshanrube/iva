<?php

namespace Acme\LearningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\LearningBundle\Entity\LearnUserLocation
 */
class LearnUserLocation
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
     * @var string $title
     */
    private $title;

    /**
     * @var text $description
     */
    private $description;

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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
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