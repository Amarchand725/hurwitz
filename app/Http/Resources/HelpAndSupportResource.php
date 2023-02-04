<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HelpAndSupportResource extends JsonResource
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
            'title' => checkIsset($this->title),
            'description' => checkIsset($this->description),
            'image' => isset($this->image) && !empty($this->image) ? asset(config('upload_path.helps') . $this->image) : null,
        ];
    }
}
