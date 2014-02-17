<?php

namespace REK\DocwizBundle\Entity;

use REK\DocwizBundle\Model\Doc as BaseDoc;
use Doctrine\ORM\Mapping as ORM;

/**
 * Doc
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Doc extends BaseDoc
{
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
     * @ORM\Column(name="name", type="text")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="text")
     */
    protected $field;

    public function __construct()
    {
        parent::__construct();
    }

}