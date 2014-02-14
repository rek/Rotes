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

}