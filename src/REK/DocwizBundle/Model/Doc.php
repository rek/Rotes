<?php

/*
 * This file is part of Docwiz
 *
 * It holds the business logic for this object
 * It is mapped to ORM via its entity
 */

namespace REK\DocwizBundle\Model;

// use Doctrine\Common\Collections\Collection;
// use Doctrine\Common\Collections\ArrayCollection;

/**
 */
abstract class Doc implements DocInterface
{

    protected $id;

    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $name;

    public function __construct()
    {
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
     * Set name
     *
     * @param string $name
     * @return Doc
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
     * Set field
     *
     * @param string $field
     * @return Doc
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

}