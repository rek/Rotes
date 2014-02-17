<?php

/*
 * This file is part of the Rotes
 *
 */

namespace REK\DocwizBundle\Model;

/**
 * @author rek <rekarnar@gmail.com>
 */
interface DocInterface
{
    /**
     * Sets the doc name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    public function getName();

    /**
     * Sets the doc field.
     *
     * @param string $field
     *
     * @return self
     */
    public function setField($field);

    public function getField();

}