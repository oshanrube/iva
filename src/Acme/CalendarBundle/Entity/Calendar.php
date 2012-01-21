<?php

namespace Acme\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\CalendarBundle\Entity\Calendar
 */
class Calendar
{
    /**
     * @var integer $id
     */
    private $id;

    /**
    * @var boolean $enabled
    */
    private $enabled;
    
    /**
     * @var string $title
     */
    private $title;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Get enabled
     *
     * @return integer 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set enabled
     *
     * @param string $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
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
}