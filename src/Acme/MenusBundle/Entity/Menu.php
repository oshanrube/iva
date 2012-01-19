<?php

namespace Acme\MenusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\MenusBundle\Entity\Menu
 */
class Menu
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $label
     */
    private $label;
    
    /**
     * @var string $url
     */
    private $url;

    /**
	 * @var integer $parent
     */
    private $parent;

    /**
     * @var text $description
     */
    private $description;

    /**
	 * @var integer $type
     */
    private $type;


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
     * Set label
     *
     * @param string $label
     */
	public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Get label
     *
     * @return string 
     */
	public function getLabel()
    {
        return $this->label;
    }

		/**
     * Set url
     *
     * @param string $url
     */
	public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return url 
     */
	public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * Set parent
     *
	 * @param integer $parent
     */
    public function setParent(\int $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
	 * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
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
     * Set type
     *
     * @param int $type
     */
    public function setType(\int $type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return int 
     */
    public function getType()
    {
        return $this->type;
    }
}