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
     * -@Assert\Type(type="REK\RotesBundle\Entity\Category")
     */
    // protected $category;

    public function __construct()
    {
    }

    public function getReverseMessage()
    {
        return strrev($this->message);
    }

    /**
    * NOT USED. using findByOne instead in controller
    */
    public function getMostRecent()
    {
        return $em->getRepository('REK\RotesBundle\Entity\Rote')
            ->createQueryBuilder('p')
            // ->useResultCache(true, 360)
            ->orderBy('p.updated_at', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }
}