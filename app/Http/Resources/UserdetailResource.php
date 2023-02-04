<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserdetailResource extends JsonResource
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
            'country' =>  $this->country->id ?? null,
            'state' =>  $this->state->id ?? null,
            'city' =>  $this->city->id ?? null,
            'postal_code' =>  checkIsset($this->postal_code),
        ];
    }
}
