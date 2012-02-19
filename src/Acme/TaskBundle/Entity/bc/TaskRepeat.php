<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\TaskRepeat
 */
class TaskRepeat
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
     * @var text $description
     */
    private $description;


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
     * @var Acme\TaskBundle\Entity\Task
     */
    private $task;

    public function __construct()
    {
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
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