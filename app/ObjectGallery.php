<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ObjectGallery extends Model
{
    use Sluggable;
    public function sluggable(): array
    {
	    return [
	        'slug' => [
	        	'source' => 'title_uz'
	        ]
	    ];
    }
    public function getRouteKeyName()
    {
	    return 'slug';
    }
	public function object()
	{
		return $this->belongsTo(XObject::class, 'object_id');
	}
	
	public function parent()
	{
		return $this->belongsTo(XObject::class, 'object_id');
	}
}
