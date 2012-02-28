<?php

namespace Acme\LearningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\LearningBundle\Entity\LearnTravel
 */
class LearnTravel
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
     * @var text $route
     */
    private $route;


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
     * Set route
     *
     * @param text $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * Get route
     *
     * @return text 
     */
    public function getRoute()
    {
        return $this->route;
    }
}