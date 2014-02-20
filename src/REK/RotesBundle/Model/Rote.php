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
abstract class Rote implements RoteInterface
{

    protected $id;

    /**
     * @var string
     */
    protected $message;

    public function __construct()
    {
    }

    public function getReverseMessage()
    {
        return strrev($this->message);
    }

}