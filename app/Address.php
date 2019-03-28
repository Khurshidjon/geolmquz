<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address_uz',
        'address_ru',
        'address_en',
	    'email',
	    'phone',
	    'status',
    ];
}
