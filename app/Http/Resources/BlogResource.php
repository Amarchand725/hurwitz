<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'title'=>checkIsset(ucfirst($this->title)),
            'short_description'=>checkIsset($this->short_description),
            'long_description'=>checkIsset($this->long_description),
            'main_image'=>asset('public/images/blogs/'.$this->main_image),
            'featured_image'=>asset('public/images/blogs/'.$this->featured_image),
            // 'slug'=>checkIsset($this->slug),
            // 'status'=>checkIsset($this->status),
            'created_at'=>formatted_date($this->created_at),
        ];
    }
}
