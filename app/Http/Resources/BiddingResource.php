<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BiddingResource extends JsonResource
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
            'id'=>$this->id,
            'user'=>isset($this->user) && !empty($this->user) ? new UserResource($this->user) : null,
            'price'=>$this->price,
            'status' => isset($this->biddingStatus) && !empty($this->biddingStatus) ? $this->biddingStatus->name  : null,
        ];
    }
}
