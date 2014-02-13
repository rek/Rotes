<?php
// src/REK/RoteBundle/Entity/Rote.php

namespace REK\RoteBundle\Entity;

use REK\RoteBundle\Model\Rote as BaseRote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rote")
 */
class Rote extends BaseRote
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}