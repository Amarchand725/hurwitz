<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuctionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'auction' => isset($this->auction) && !empty($this->auction) ? getAuctionDataWithProduct($this->auction) : null,
            'biddings' => isset($this->auction->biddings) && !empty($this->auction->biddings) ? BiddingResource::collection($this->auction->biddings) : null,
        ];
    }
}
