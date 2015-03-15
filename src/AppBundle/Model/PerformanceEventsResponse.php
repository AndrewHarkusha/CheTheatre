<?php

namespace AppBundle\Model;

use AppBundle\Entity\Performance;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class PerformanceEventsResponse
 * @package AppBundle\Model
 * @ExclusionPolicy("all")
 */
class PerformanceEventsResponse
{
    /**
     * @var Performance[]
     *
     * @Type("array<AppBundle\Entity\PerformanceEvent>")
     * @Expose
     */
    protected $performanceEvents;

    /**
     * @var int
     *
     * @Type("integer")
     * @Accessor(getter="getCount")
     * @Expose
     */
    protected $count;

    /**
     * @var int
     *
     * @Type("integer")
     * @Expose
     */
    protected $totalCount;

    /**
     * @return Performance[]
     */
    public function getPerformanceEvents()
    {
        return $this->performanceEvents;
    }

    /**
     * @param  mixed $performanceEvents
     * @return $this
     */
    public function setPerformanceEvents($performanceEvents)
    {
        $this->performanceEvents = $performanceEvents;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->getPerformanceEvents());
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param $totalCount
     * @return PerformanceEventsResponse
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;

        return $this;
    }
}
