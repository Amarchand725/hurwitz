<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => checkIsset(ucfirst($this->title)),
            'short_description' => checkIsset($this->short_description),
            'long_description' => checkIsset($this->long_description),
            'prices' => [
                'initial' => checkIsset(number_format($this->initial_price, 2)),
                'final' => checkIsset(number_format($this->final_price, 2)),
            ],
            'images' => [
                'main' => asset(config('upload_path.products') . $this->main_image),
                'featured' => asset(config('upload_path.products') . $this->featured_image),
            ],
            'open_for_auction' => isset($this->open_for_auction) && !empty($this->open_for_auction) && $this->open_for_auction == 1 ? true : false,
            'created_at' => formatted_date($this->created_at),
        ];
    }
}
