<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'country' => $this->country,
            'coffee_name' => $this->coffee_name,
            'variety' => $this->variety,
            'altitude' => $this->altitude,
            'terroir' => $this->terroir,
            'producer' => $this->producer,
            'harvest_period' => $this->harvest_period,
            'postharvest_process' => $this->postharvest_process,
            'postharvest_processor' => $this->postharvest_processor,
            'roaster' => $this->roaster,
            'country_of_roaster' => $this->country_of_roaster,
            'roast_profile' => $this->roast_profile,
            'flavor' => $this->flavor,
        ];
    }
}
