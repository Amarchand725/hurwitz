<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorialResource extends JsonResource
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
            'title'=>checkIsset($this->title),   
            'description'=>checkIsset($this->description),   
            'video'=>isset($this->video) && !empty($this->video) ? asset(config('upload_path.tutorials') . $this->video ) : null,   
        ];
    }
}
