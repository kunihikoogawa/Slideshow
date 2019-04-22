<?php
/**
 * Contains the SlideshowState enum class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-07
 *
 */


namespace Vanilo\Slideshow\Models;

use Konekt\Enum\Enum;
use Vanilo\Slideshow\Contracts\SlideshowState as SlideshowStateContract;

class SlideshowState extends Enum implements SlideshowStateContract
{
    const __default = self::DRAFT;

    const DRAFT       = 'draft';
    const INACTIVE    = 'inactive';
    const ACTIVE      = 'active';
    const UNAVAILABLE = 'unavailable';
    const RETIRED     = 'retired';

    protected static $activeStates = [self::ACTIVE];

    /**
     * @inheritdoc
     */
    public function isActive()
    {
        return in_array($this->value, static::$activeStates);
    }

    /**
     * @inheritdoc
     */
    public static function getActiveStates()
    {
        return static::$activeStates;
    }
}
