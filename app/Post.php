<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';
    protected $fillable = [
    	'country', 'coffee_name', 'variety', 'altitude', 'terroir', 'producer', 'harvest_period', 'postharvest_process', 'postharvest_processor', 'roaster', 'country_of_roaster', 'roast_profile', 'flavor'
    ];
}
