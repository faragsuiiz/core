<?php

namespace AlahramGroup\SharedModels;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AlahramGroup\SharedModels\Skeleton\SkeletonClass
 */
class SharedModelsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shared-models';
    }
}
