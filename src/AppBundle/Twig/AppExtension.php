<?php

namespace AppBundle\Twig;

use Doctrine\ORM\EntityManager;

class AppExtension extends \Twig_Extension
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('allTagsAsString', array($this, 'allTagsAsString')),
        );
    }

    /**
     * @return string
     */
    public function allTagsAsString()
    {
        $tagsAsString = '';

        foreach ($this->allTags() as $tag) {
            $tagsAsString .= sprintf('"%s",', $tag->getTitle());
        }

        return trim($tagsAsString, ',');
    }

    /**
     * @return \AppBundle\Entity\Tag[]|array
     */
    protected function allTags()
    {
        return $this->em->getRepository('AppBundle:Tag')->findAll();
    }

    public function getName()
    {
        return 'app_extension';
    }
}
