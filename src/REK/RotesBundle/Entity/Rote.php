<?php

namespace REK\RotesBundle\Entity;

use REK\RotesBundle\Model\Rote as BaseRote;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="rotes")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set category
     *
     * @param \REK\RotesBundle\Entity\Category $category
     * @return Rote
     */
    public function setCategory(\REK\RotesBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \REK\RotesBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Rote
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Rote
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }
}