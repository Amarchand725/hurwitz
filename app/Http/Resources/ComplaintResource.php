<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
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
            'id' => $this->id,
            'complaint_number' => checkIsset($this->uid),
            'subject' => checkIsset($this->subject),
            'location' => checkIsset($this->location),
            'latitude' => checkIsset($this->latitude),
            'longitude' => checkIsset($this->longitude),
            'zip_code' => checkIsset($this->zip_code),
            'phone' => checkIsset($this->phone),
            'description' => checkIsset($this->description),

            'user' => $this->whenLoaded('user', function () {
                return  UserResource::collection($this->user);
            }),
            'category' => $this->whenLoaded('category', function () {
                return  new CategoryResource($this->category);
            }),
            'sub_category' => $this->whenLoaded('sub_category', function () {
                return  new SubCategoryResource($this->sub_category);
            }),
            'country' => $this->whenLoaded('country', function () {
                return  new CountryResource($this->country);
            }),
            'state' => $this->whenLoaded('state', function () {
                return  new StateResource($this->state);
            }),
            'city' => $this->whenLoaded('city', function () {
                return  new CityResource($this->city);
            }),
            'priority' => $this->whenLoaded('priority', function () {
                return  new PriorityResource($this->priority);
            }),
            'status' => isset($this->status) && !empty($this->status ) ? getComplaintStatus($this->status): null,

            'images' => $this->whenLoaded('images', function () {
                return  ComplaintImagesResource::collection($this->images);
            }),
        ];
    }
}
