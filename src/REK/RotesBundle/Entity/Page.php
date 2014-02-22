<?php

namespace REK\RotesBundle\Entity;

use REK\RotesBundle\Model\Page as BasePage;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Page extends BasePage
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255)
     */
    protected $route;

    /**
     * @var boolean
     *
     * @ORM\Column(name="parentId", type="smallint")
     * @ORM\OneToMany(targetEntity="Page", mappedBy="id")
     */
    protected $parentId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="secure", type="boolean", nullable=true)
     */
    private $secure;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint")
     */
    protected $position;

    /**
     * @ORM\OneToMany(targetEntity="Rote", mappedBy="page")
     */
    protected $rotes;

    public function __construct()
    {
        parent::__construct();

        // doctrine requires the ArrayCollection
        $this->rotes = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Page
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Page
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Page
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add rotes
     *
     * @param \REK\RotesBundle\Entity\Rote $rotes
     * @return Page
     */
    public function addRote(\REK\RotesBundle\Entity\Rote $rotes)
    {
        $this->rotes[] = $rotes;

        return $this;
    }

    /**
     * Remove rotes
     *
     * @param \REK\RotesBundle\Entity\Rote $rotes
     */
    public function removeRote(\REK\RotesBundle\Entity\Rote $rotes)
    {
        $this->rotes->removeElement($rotes);
    }

    /**
     * Get rotes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRotes()
    {
        return $this->rotes;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Page
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set secure
     *
     * @param boolean $secure
     * @return Page
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
    
        return $this;
    }

    /**
     * Get secure
     *
     * @return boolean 
     */
    public function getSecure()
    {
        return $this->secure;
    }
}