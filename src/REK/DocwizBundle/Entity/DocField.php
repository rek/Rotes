<?php

namespace REK\DocwizBundle\Entity;

use REK\DocwizBundle\Model\DocField as BaseDocField;
use Doctrine\ORM\Mapping as ORM;

/**
 * Docfield
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="REK\DocwizBundle\Entity\DocfieldRepository")
 */
class DocField extends BaseDocField {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    protected $text;
}
