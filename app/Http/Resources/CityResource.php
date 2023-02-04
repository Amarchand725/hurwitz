<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            // 'latitude'=>checkIsset($this->latitude),
            // 'longitude'=>checkIsset($this->longitude),
            // 'country'=> $this->whenLoaded('country', function () {
            //     return new CountryResource($this->country);
            // }),
            // 'state'=> $this->whenLoaded('state', function () {
            //     return new StateResource($this->state);
            // }),
        ];
    }
}
