<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = "pricings";
    protected $fillable = ['price_title', 'price_desc', 'price', 'price_feature1', 'price_feature2', 'price_feature3', 'price_feature4', 'price_feature5'];
}
