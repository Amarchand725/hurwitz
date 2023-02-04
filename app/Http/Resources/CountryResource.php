<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'id' => checkIsset($this->id),
            'name' => checkIsset($this->name),
            // 'region'=>checkIsset($this->region),
            // 'sub_region'=>checkIsset($this->subregion),
        // 'currency_name'=>checkIsset($this->currency_name),
        // 'currency_symbol'=>checkIsset($this->currency),
            // 'capital'=>checkIsset($this->capital),
            // 'latitude'=>checkIsset($this->latitude),
            // 'longitude'=>checkIsset($this->longitude),
            // 'total_states'=>getStatesCount(checkIsset($this->id)),
            // 'total_cities'=>getCitiesCount(checkIsset($this->id)),
            // 'state'=> $this->whenLoaded('state', function () {
            //     return new StateResource($this->state);
            // }),
            // 'city'=> $this->whenLoaded('city', function () {
            //     return new CityResource($this->city);
            // }),
        ];
    }
}
