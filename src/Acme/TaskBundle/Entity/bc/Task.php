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
     * @var integer $userId
     */
    private $userId;

    /**
     * @var integer $calendarId
     */
    private $calendarId;

    /**
     * @var integer $taskTypeId
     */
    private $taskTypeId;

    /**
     * @var string $task
     */
    private $task;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var integer $startTime
     */
    private $startTime;

    /**
     * @var integer $endTime
     */
    private $endTime;

    /**
     * @var string $location
     */
    private $location;

    /**
     * @var float $lng
     */
    private $lng;

    /**
     * @var float $lat
     */
    private $lat;

    /**
     * @var Acme\TaskBundle\Entity\Notification
     */
    private $notification;
    
    /**
     * @var Acme\TaskBundle\Entity\TaskType
     */
    private $tasktype;
    
    /**
     * @var Acme\TaskBundle\Entity\Calendar
     */
    private $calendar;


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
     * Set taskTypeId
     *
     * @param integer $taskTypeId
     */
    public function setTaskTypeId($taskTypeId)
    {
        $this->taskTypeId = $taskTypeId;
    }

    /**
     * Get taskTypeId
     *
     * @return integer 
     */
    public function getTaskTypeId()
    {
        return $this->taskTypeId;
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
     * Set startTime
     *
     * @param integer $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * Get startTime
     *
     * @return integer 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param integer $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * Get endTime
     *
     * @return integer 
     */
    public function getEndTime()
    {
        return $this->endTime;
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

    /**
     * Set notification
     *
     * @param Acme\TaskBundle\Entity\Notification $notification
     */
    public function setNotification(\Acme\TaskBundle\Entity\Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get notification
     *
     * @return Acme\TaskBundle\Entity\Notification 
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set taskType
     *
     * @param Acme\TaskBundle\Entity\TaskType $taskType
     */
    public function setTaskType(\Acme\TaskBundle\Entity\TaskType $taskType)
    {
        $this->taskType = $taskType;
    }

    /**
     * Get taskType
     *
     * @return Acme\TaskBundle\Entity\TaskType 
     */
    public function getTaskType()
    {
        return $this->taskType;
    }
    
    /**
     * Set calendar
     *
     * @param Acme\TaskBundle\Entity\Calendar $calendar
     */
    public function setCalendar(\Acme\TaskBundle\Entity\Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * Get calendar
     *
     * @return Acme\TaskBundle\Entity\Calendar 
     */
    public function getCalendar()
    {
        return $this->calendar;
    }
    /**
     * @var integer $taskRepeatId
     */
    private $taskRepeatId;


    /**
     * Set taskRepeatId
     *
     * @param integer $taskRepeatId
     */
    public function setTaskRepeatId($taskRepeatId)
    {
        $this->taskRepeatId = $taskRepeatId;
    }

    /**
     * Get taskRepeatId
     *
     * @return integer 
     */
    public function getTaskRepeatId()
    {
        return $this->taskRepeatId;
    }
    /**
     * @var Acme\TaskBundle\Entity\TaskRepeat
     */
    private $taskrepeat;


    /**
     * Set tasktype
     *
     * @param Acme\TaskBundle\Entity\TaskType $tasktype
     */
    public function setTasktype(\Acme\TaskBundle\Entity\TaskType $tasktype)
    {
        $this->tasktype = $tasktype;
    }

    /**
     * Get tasktype
     *
     * @return Acme\TaskBundle\Entity\TaskType 
     */
    public function getTasktype()
    {
        return $this->tasktype;
    }

    /**
     * Set taskrepeat
     *
     * @param Acme\TaskBundle\Entity\TaskRepeat $taskrepeat
     */
    public function setTaskrepeat(\Acme\TaskBundle\Entity\TaskRepeat $taskrepeat)
    {
        $this->taskrepeat = $taskrepeat;
    }

    /**
     * Get taskrepeat
     *
     * @return Acme\TaskBundle\Entity\TaskRepeat 
     */
    public function getTaskrepeat()
    {
        return $this->taskrepeat;
    }
}