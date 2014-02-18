<?php

/*
 * This file is part of Docwiz
 *
 * It holds the business logic for this object
 * This is mapped to ORM via its entity
 */

namespace REK\DocwizBundle\Model;

// use Doctrine\Common\Collections\Collection;
// use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 */
abstract class DocField
{

    protected $id;

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
     * @return Docfield
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
     * Set text
     *
     * @param string $text
     * @return Docfield
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }


    public function __toString() {
        return $this->name;
    }
}