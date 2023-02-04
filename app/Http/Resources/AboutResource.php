<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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
            'short_description' => checkIsset($this->short_description),
            'description' => checkIsset($this->description),
            'image' => isset($this->image) && !empty($this->image) ? asset(config('upload_path.about_us') . $this->image) : null,
            'video' => isset($this->video) && !empty($this->video) ? asset(config('upload_path.about_us') . $this->video) : null,
            'image_2' => isset($this->image_2) && !empty($this->image_2) ? asset(config('upload_path.about_us') . $this->image_2) : null,
            'image_3' => isset($this->image_3) && !empty($this->image_3) ? asset(config('upload_path.about_us') . $this->image_3) : null,
            'qoute' => checkIsset($this->qoute),
            //   'Accordion' => new AboutAccordionResource(AboutAccordion::all()),
        ];
    }
}
