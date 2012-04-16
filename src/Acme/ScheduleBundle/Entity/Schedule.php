<?php

namespace Acme\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\ScheduleBundle\Entity\Schedule
 */
class Schedule
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $datetime
     */
    private $datetime;

    /**
     * @var string $command
     */
    private $command;


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
     * Set command
     *
     * @param string $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * Get command
     *
     * @return string 
     */
    public function getCommand()
    {
        return $this->command;
    }
    /**
     * @var string $arguments
     */
    private $arguments;


    /**
     * Set arguments
     *
     * @param string $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * Get arguments
     *
     * @return string 
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}