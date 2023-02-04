<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookUrlResource extends JsonResource
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
               'orderType_id'=> $this->orderType ?? null,
            'orderType'=>getOrderType(isset($this->orderType) && !empty($this->orderType)? $this->orderType : 0) ,// checkIsset($this->orderType)
            'url'=>checkIsset(ucfirst($this->url)),
        ];
    }
}
