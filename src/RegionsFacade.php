<?php

namespace Mortezaa97\Regions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezaa97\Regions\Skeleton\SkeletonClass
 */
class RegionsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'regions';
    }
}
