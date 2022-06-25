<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    /*
    protected  $fillable = [
        'category_name',
        'order_number',
        'category_status',
        'added_on',
    ];
    */
    //protected $primaryKey = 'id';

    public function getPackageRelation()
    {
        //return $this->belongsToMany('App\Models\Packages', 'package_categories');
        return $this->belongsToMany('App\Models\Packages', 'package_categories', 'category_id', 'id');
    }
    public function getQuantityCategoryRelation()
    {
        return $this->hasOne('App\Models\Quantity', 'category_id', 'id');
    }
    public function getQuantityCategoryRelation2()
    {
        return $this->hasOne('App\Models\Quantity', 'category_id', 'id');
    }
}
