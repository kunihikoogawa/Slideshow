<?php
/**
 * Contains the ModuleServiceProvider class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-07
 *
 */


namespace Vanilo\Slideshow\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use Vanilo\Slideshow\Models\Slideshow;
use Vanilo\Slideshow\Models\SlideshowState;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Slideshow::class
    ];

    protected $enums = [
        SlideshowState::class
    ];
}
