<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;


    public function getOffersRelationDishes()
    {
        return $this->hasOne('App\Models\Dishes', 'id', 'dish_id');
    }
}
