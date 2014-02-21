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

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="rotes")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    protected $page;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getPage()
    {
        return $this->page;
    }

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
     * Set message
     *
     * @param string $message
     * @return Rote
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set page
     *
     * @param \REK\RotesBundle\Entity\Page $page
     * @return Rote
     */
    public function setPage(\REK\RotesBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }
}