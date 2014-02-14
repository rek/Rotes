<?php

namespace REK\RotesBundle\Entity;

use REK\RotesBundle\Model\Rote as BaseRote;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rote
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rote extends BaseRote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    protected $message;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}
