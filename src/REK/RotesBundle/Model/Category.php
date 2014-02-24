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
abstract class Category
{

    protected $position;

    public function __construct()
    {
        $this->position = 50;
    }


    // public function __toString()
    // {
        // return $this->getName();
    // }

}