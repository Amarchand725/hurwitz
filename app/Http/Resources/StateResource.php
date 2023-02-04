<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>checkIsset($this->id),
            'name'=>checkIsset($this->name),
            'shipping_charges'=>checkIsset($this->price),
            // 'latitude'=>checkIsset($this->latitude),
            // 'longitude'=>checkIsset($this->longitude),
            // 'total_cities'=>getCitiesCount(checkIsset($this->id)),
            // 'country'=> $this->whenLoaded('country', function () {
            //     return new CountryResource($this->country);
            // }),
        ];
    }
}
