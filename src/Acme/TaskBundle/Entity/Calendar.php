<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\Calendar
 */
class Calendar
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var boolean $enabled
     */
    private $enabled;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var integer $ownerId
     */
    private $ownerId;

    /**
     * @var string $privacyType
     */
    private $privacyType;

    /**
     * @var Acme\TaskBundle\Entity\Task
     */
    private $task;

    public function __construct()
    {
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
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
     * Set ownerId
     *
     * @param integer $ownerId
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * Get ownerId
     *
     * @return integer 
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set privacyType
     *
     * @param string $privacyType
     */
    public function setPrivacyType($privacyType)
    {
        $this->privacyType = $privacyType;
    }

    /**
     * Get privacyType
     *
     * @return string 
     */
    public function getPrivacyType()
    {
        return $this->privacyType;
    }

    /**
     * Add task
     *
     * @param Acme\TaskBundle\Entity\Task $task
     */
    public function addTask(\Acme\TaskBundle\Entity\Task $task)
    {
        $this->task[] = $task;
    }

    /**
     * Get task
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTask()
    {
        return $this->task;
    }
}