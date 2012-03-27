<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\TaskPriority
 */
class TaskPriority
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $level
     */
    private $level;

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
     * Set level
     *
     * @param integer $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
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
    private $taskspriority;

    public function __construct()
    {
        $this->taskspriority = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add taskspriority
     *
     * @param Acme\TaskBundle\Entity\Task $taskspriority
     */
    public function addTask(\Acme\TaskBundle\Entity\Task $taskspriority)
    {
        $this->taskspriority[] = $taskspriority;
    }

    /**
     * Get taskspriority
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTaskspriority()
    {
        return $this->taskspriority;
    }
    /**
     * @var Acme\TaskBundle\Entity\Task
     */
    private $taskPrioritys;


    /**
     * Get taskPrioritys
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTaskPrioritys()
    {
        return $this->taskPrioritys;
    }
}