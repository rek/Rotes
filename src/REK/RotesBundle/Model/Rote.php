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
use Symfony\Component\Validator\Constraints as Assert;

/**
 */
abstract class Rote implements RoteInterface
{

    protected $id;

    /**
     * @var string
     */
    protected $message;

    /**
     * @Assert\Type(type="REK\RotesBundle\Entity\Page")
     */
    protected $page;

    public function __construct()
    {
    }

    public function getReverseMessage()
    {
        return strrev($this->message);
    }

}