<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\TaskType
 */
class TaskType
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
     * @var integer $duration
     */
    private $duration;

    /**
     * @var integer $prepare
     */
    private $prepare;

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
     * Set duration
     *
     * @param integer $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set prepare
     *
     * @param integer $prepare
     */
    public function setPrepare($prepare)
    {
        $this->prepare = $prepare;
    }

    /**
     * Get prepare
     *
     * @return integer 
     */
    public function getPrepare()
    {
        return $this->prepare;
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