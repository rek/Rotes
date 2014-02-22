<?php

namespace REK\RotesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Category name must be set")
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @Gedmo\Translatable
     * @Gedmo\Slug(fields={"name"},style="camel", separator="-")
     * @ORM\Column(length=64, unique=true)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint")
     */
    private $position;

    /**
     * @var boolean
     *
     * @ORM\Column(name="secure", type="boolean", nullable=true)
     */
    private $secure;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\OneToMany(targetEntity="Rote", mappedBy="category")
     */
    protected $rotes;

    public function __construct()
    {
        // parent::__construct();

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
     * @return Category
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
     * Set position
     *
     * @param integer $position
     * @return Category
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
     * Set secure
     *
     * @param boolean $secure
     * @return Category
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

    // public function __toString()
    // {
        // return $this->getTitle();
    // }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Category
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Add rotes
     *
     * @param \REK\RotesBundle\Entity\Rote $rotes
     * @return Category
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
}