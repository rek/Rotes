<?php

/*
 * This file is part of the Rotes
 *
 */

namespace REK\RotesBundle\Model;

/**
 * @author rek <rekarnar@gmail.com>
 */
interface RoteInterface
{
    /**
     * Sets the username.
     *
     * @param string $username
     *
     * @return self
     */
    public function setMessage($message);

    public function getMessage();

}