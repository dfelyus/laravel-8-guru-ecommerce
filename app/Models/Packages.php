<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;


    public function dishes()
    {
        return $this->belongsToMany('App\Models\Dishes', 'package_dishes')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Categories', 'package_categories')->withTimestamps();
    }

    public function getDisheRelation()
    {
        return $this->hasMany('App\Models\Dishes', 'dish_id', 'package_id');
    }


    public function getCategoryRelation()
    {
        return $this->belongsToMany('App\Models\Categories', 'package_categories', 'package_id', 'category_id');
    }
}
