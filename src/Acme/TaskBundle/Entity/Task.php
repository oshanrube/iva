<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\Task
 */
class Task
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $calendarId
     */
    private $calendarId;

    /**
     * @var string $task
     */
    private $task;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var integer $dueDate
     */
    private $dueDate;


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
     * Set calendarId
     *
     * @param integer $calendarId
     */
    public function setCalendarId($calendarId)
    {
        $this->calendarId = $calendarId;
    }

    /**
     * Get calendarId
     *
     * @return integer 
     */
    public function getCalendarId()
    {
        return $this->calendarId;
    }

    /**
     * Set task
     *
     * @param string $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * Get task
     *
     * @return string 
     */
    public function getTask()
    {
        return $this->task;
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
     * Set dueDate
     *
     * @param integer $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * Get dueDate
     *
     * @return integer 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }
}