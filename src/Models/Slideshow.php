<?php
/**
 * Contains the Slideshow class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-07
 *
 */

namespace Vanilo\Slideshow\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;
use Vanilo\Slideshows\Contracts\Slideshow as SlideshowContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slideshow extends Model implements SlideshowContract
{
    use CastsEnums, Sluggable, SluggableScopeHelpers;
	use SoftDeletes;

    protected $table = 'slideshows';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $enums = [
        'state' => 'SlideshowStateProxy@enumClass'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return $this->getSlugKeyName();
    }

    /**
     * @inheritdoc
     */
    public function isActive()
    {
        return $this->state->isActive();
    }

    /**
     * @return bool
     */
    public function getIsActiveAttribute()
    {
        return $this->isActive();
    }

    public function title()
    {
        return isset($this->ext_title) ? $this->ext_title : $this->name;
    }

    /**
     * @return string
     */
    public function getTitleAttribute()
    {
        return $this->title();
    }

    /**
     * Scope for returning the products with active state
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActives($query)
    {
        return $query->whereIn(
            'state',
            SlideshowStateProxy::getActiveStates()
        );
    }
}
