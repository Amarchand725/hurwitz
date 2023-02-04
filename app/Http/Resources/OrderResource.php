<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_id' => isset($this->order_id) && !empty($this->order_id) ? $this->order_id : null,
            'order_status' => isset($this->order_status->name) && !empty($this->order_status->name) ? $this->order_status->name : "Pending",
                       'order_type' => isset($this->order_type->title) && !empty($this->order_type->title) ? $this->order_type->title : null,
            'payment_id' => isset($this->payment_id) && !empty($this->payment_id) ? $this->payment_id : null,
            'provider' => isset($this->provider) && !empty($this->provider) ? $this->provider : null,
            'user' => isset($this->user) && !empty($this->user) ? new UserResource($this->user) : null,
            'book' => isset($this->book) && !empty($this->book) ? new BookResource($this->book) : null,
            'country' => isset($this->country) && !empty($this->country) ? new CountryResource($this->country) : null,
            'state' => isset($this->state) && !empty($this->country) ? new StateResource($this->state) : null,
            'city' => isset($this->city) && !empty($this->country) ? new CityResource($this->city) : null,
            'address' => isset($this->address) && !empty($this->address) ? $this->address : 0,
            'shipping_charges' => isset($this->shipping_charges) && !empty($this->shipping_charges) ? $this->shipping_charges : 0,
            'sub_total' => isset($this->sub_total) && !empty($this->sub_total) ? $this->sub_total : 0,
            'grand_total' => isset($this->grand_total) && !empty($this->grand_total) ? $this->grand_total : 0,
        ];
    }
}
