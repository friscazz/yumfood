<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'Dish';
    public function vendor()
    {
        return $this->morphToMany('App\Vendor', 'taggable');
    }
}
