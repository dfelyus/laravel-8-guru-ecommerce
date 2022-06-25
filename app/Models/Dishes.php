<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;
    /*
    protected  $fillable = [
        'dish_name',
        'dish_detail',
        'dish_image',
        'dish_status',
        'added_on',
        'full_price',
        'half_price',
    ];
    */
    //protected $primaryKey = 'id';

    public function packages()
    {
        return $this->belongsToMany('App\Models\Packages', 'package_dishes');
    }
    public function getQuantityDishRelation()
    {
        return $this->hasOne('App\Models\Quantity', 'dish_id', 'id');
    }
    public function getQuantityDishRelation2()
    {
        return $this->hasMany('App\Models\Quantity', 'dish_id', 'id');
    }

    public function getCategoryRelation()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }
}
