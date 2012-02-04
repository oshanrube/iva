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
     * @var string $task
     */
    private $task;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var integer $datetime
     */
    private $datetime;

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
}