<?php

/*
 * This file is part of Rotes
 *
 * It holds the business logic for this object
 *
 */

namespace REK\RotesBundle\Model;

// use Doctrine\Common\Collections\Collection;
// use Doctrine\Common\Collections\ArrayCollection;

/**
 */
abstract class Page
{

    protected $id;

    /**
     * @var string
     */
    protected $name;

    public function __construct()
    {
    }

    // public function __toString() {
        // return $this->name;
    // }
}