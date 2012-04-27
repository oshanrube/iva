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
     * @var integer $prepare
     */
    private $prepare;

    /**
     * @var integer $travelTime
     */
    private $travelTime;

    /**
     * @var integer $wConditionId
     */
    private $wConditionId;

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
     * @var Acme\WeatherBundle\Entity\WCondition
     */
    private $wcondition;


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
     * Set travelTime
     *
     * @param integer $travelTime
     */
    public function setTravelTime($travelTime)
    {
        $this->travelTime = $travelTime;
    }

    /**
     * Get travelTime
     *
     * @return integer 
     */
    public function getTravelTime()
    {
        return $this->travelTime;
    }

    /**
     * Set wConditionId
     *
     * @param integer $wConditionId
     */
    public function setWConditionId($wConditionId)
    {
        $this->wConditionId = $wConditionId;
    }

    /**
     * Get wConditionId
     *
     * @return integer 
     */
    public function getWConditionId()
    {
        return $this->wConditionId;
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

    /**
     * Set wcondition
     *
     * @param Acme\WeatherBundle\Entity\WCondition $wcondition
     */
    public function setWcondition(\Acme\WeatherBundle\Entity\WCondition $wcondition)
    {
        $this->wcondition = $wcondition;
    }

    /**
     * Get wcondition
     *
     * @return Acme\WeatherBundle\Entity\WCondition 
     */
    public function getWcondition()
    {
        return $this->wcondition;
    }
    /**
     * @var boolean $update
     */
    private $update;

    /**
     * @var boolean $push
     */
    private $push;


    /**
     * Set update
     *
     * @param boolean $update
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    }

    /**
     * Get update
     *
     * @return boolean 
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * Set push
     *
     * @param boolean $push
     */
    public function setPush($push)
    {
        $this->push = $push;
    }

    /**
     * Get push
     *
     * @return boolean 
     */
    public function getPush()
    {
        return $this->push;
    }
    /**
     * @var boolean $updatable
     */
    private $updatable;


    /**
     * Set updatable
     *
     * @param boolean $updatable
     */
    public function setUpdatable($updatable)
    {
        $this->updatable = $updatable;
    }

    /**
     * Get updatable
     *
     * @return boolean 
     */
    public function getUpdatable()
    {
        return $this->updatable;
    }
    /**
     * @var string $callConfirmCode
     */
    private $callConfirmCode;


    /**
     * Set callConfirmCode
     *
     * @param string $callConfirmCode
     */
    public function setCallConfirmCode($callConfirmCode)
    {
        $this->callConfirmCode = $callConfirmCode;
    }

    /**
     * Get callConfirmCode
     *
     * @return string 
     */
    public function getCallConfirmCode()
    {
        return $this->callConfirmCode;
    }
    /**
     * @var boolean $pushConfirm
     */
    private $pushConfirm;


    /**
     * Set pushConfirm
     *
     * @param boolean $pushConfirm
     */
    public function setPushConfirm($pushConfirm)
    {
        $this->pushConfirm = $pushConfirm;
    }

    /**
     * Get pushConfirm
     *
     * @return boolean 
     */
    public function getPushConfirm()
    {
        return $this->pushConfirm;
    }
}