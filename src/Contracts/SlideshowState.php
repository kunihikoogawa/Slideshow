<?php
/**
 * Contains the SlideshowState enum interface.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-07
 *
 */


namespace Vanilo\Slideshow\Contracts;

interface Slideshowtate
{
    /**
     * Returns whether the state represents an active state
     *
     * @return boolean
     */
    public function isActive();

    /**
     * Returns an array of states that represent an active product state
     *
     * @return array
     */
    public static function getActiveStates();
}
