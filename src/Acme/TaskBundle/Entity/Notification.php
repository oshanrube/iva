<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\Notification
 */
class Notification
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $taskId
     */
    private $taskId;

    /**
     * @var integer $datetime
     */
    private $datetime;

    /**
     * @var boolean $notified
     */
    private $notified;

    /**
     * @var boolean $snooze
     */
    private $snooze;

    /**
     * @var boolean $email
     */
    private $email;

    /**
     * @var boolean $sms
     */
    private $sms;

    /**
     * @var boolean $voicecall
     */
    private $voicecall;

    /**
     * @var Acme\TaskBundle\Entity\Task
     */
    private $task;


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
     * Set taskId
     *
     * @param integer $taskId
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
    }

    /**
     * Get taskId
     *
     * @return integer 
     */
    public function getTaskId()
    {
        return $this->taskId;
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
     * Set notified
     *
     * @param boolean $notified
     */
    public function setNotified($notified)
    {
        $this->notified = $notified;
    }

    /**
     * Get notified
     *
     * @return boolean 
     */
    public function getNotified()
    {
        return $this->notified;
    }

    /**
     * Set snooze
     *
     * @param boolean $snooze
     */
    public function setSnooze($snooze)
    {
        $this->snooze = $snooze;
    }

    /**
     * Get snooze
     *
     * @return boolean 
     */
    public function getSnooze()
    {
        return $this->snooze;
    }

    /**
     * Set email
     *
     * @param boolean $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return boolean 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sms
     *
     * @param boolean $sms
     */
    public function setSms($sms)
    {
        $this->sms = $sms;
    }

    /**
     * Get sms
     *
     * @return boolean 
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * Set voicecall
     *
     * @param boolean $voicecall
     */
    public function setVoicecall($voicecall)
    {
        $this->voicecall = $voicecall;
    }

    /**
     * Get voicecall
     *
     * @return boolean 
     */
    public function getVoicecall()
    {
        return $this->voicecall;
    }

    /**
     * Set task
     *
     * @param Acme\TaskBundle\Entity\Task $task
     */
    public function setTask(\Acme\TaskBundle\Entity\Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get task
     *
     * @return Acme\TaskBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }
}