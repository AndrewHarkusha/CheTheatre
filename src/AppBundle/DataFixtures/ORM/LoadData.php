<?php

namespace AppBundle\DataFixtures\ORM;

use Application\Sonata\MediaBundle\Entity\Media;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;

class LoadData extends DataFixtureLoader
{
    protected function getFixtures()
    {
        return array(
            __DIR__.'/fixturesGalleryHasMedia_uk.yml',
            __DIR__.'/fixturesEmployee_uk.yml',
            __DIR__.'/fixturesPerformance_uk.yml',
            __DIR__.'/fixturesRole_uk.yml',
            __DIR__.'/fixturesTag_uk.yml',
            __DIR__.'/fixturesPost_uk.yml',
            __DIR__.'/fixturesHistory_uk.yml',
            __DIR__.'/fixturesPerformanceEvent_uk.yml',
            __DIR__.'/fixturesEmployeeTranslation_en.yml',
            __DIR__.'/fixturesPerformanceTranslation_en.yml',
            __DIR__.'/fixturesRoleTranslation_en.yml',
            __DIR__.'/fixturesPostTranslation_en.yml',
            __DIR__.'/fixturesHistoryTranslation_en.yml',
            __DIR__.'/fixturesTagTranslation_en.yml',
            __DIR__.'/fixturesGalleryHasMediaTranslation_en.yml',
        );
    }

    public function getMedia($name, $context = 'default')
    {
        $media = new Media();

        $media->setBinaryContent(__DIR__.'/../data/'.$name);
        $media->setContext($context);
        $media->setProviderName('sonata.media.provider.image');

        $this->container->get('sonata.media.manager.media')->save($media, $andFlush = true);

        return $media;
    }
}
