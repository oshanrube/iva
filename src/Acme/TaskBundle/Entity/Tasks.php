<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\Tasks
 */
class Tasks
{
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}