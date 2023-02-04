<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>isset($this->title) && !empty($this->title) ? ucfirst($this->title) :  null,
            'description'=>isset($this->description) && !empty($this->description) ? ucfirst($this->description) :  null,
            'image'=>isset($this->image) && !empty($this->image) ?  asset(config('upload_path.announcements') . $this->image ) :  null,
            'time'=>$this->created_at->diffForHumans(),
        
            

        ];
    }
}
