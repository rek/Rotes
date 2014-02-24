<?php

namespace REK\RotesBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use REK\RotesBundle\Entity\Category;

class StringToCategoryTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (category) to a string (string).
     *
     * @param  Category|null $category
     * @return string
     */
    public function transform($category)
    {
        if (null === $category) {
            return "";
        }

        return $category->getId();
    }

    /**
     * Transforms a string (string) to an object (category).
     *
     * @param  string $name
     *
     * @return Category|null
     *
     * @throws TransformationFailedException if object (category) is not found.
     */
    public function reverseTransform($name)
    {
        if (!$name) {
            return null;
        }

        $category = $this->om
            ->getRepository('REKRotesBundle:category')
            ->findOneBy(array('id' => $name))
        ;

        if (null === $category) {
            throw new TransformationFailedException(sprintf(
                'A category with name "%s" does not exist!',
                $name
            ));
        }

        return $category;
    }
}