<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'menu_uz'
            ],
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }


    public function childMenus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function child()
    {
        return $this->childMenus()->where('status','!=', 0);
    }


    public function technology()
    {
        return $this->hasMany(Technology::class);
    }
    
    public function techno()
    {
        return $this->technology()->where('status','!=', 0);
    }
    
    public function what_we_offers()
    {
        return $this->hasMany(WhatWeOffer::class);
    }
    
    public function what_we_offer()
    {
        return $this->what_we_offers()->where('status','!=', 0);
    }
    
    public function parent()
    {
    	return $this->belongsTo(Menu::class, 'parent_id');
    }
    
    public function object()
    {
    	return $this->hasMany(XObject::class, 'menu_id');
    }
}
