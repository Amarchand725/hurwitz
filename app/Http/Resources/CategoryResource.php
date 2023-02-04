<?php

namespace App\Http\Resources;

use App\Models\SubCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'description'=>checkIsset($this->description),
            'image'=>asset(config('upload_path.category').$this->image),
            'sub_categories'=>$this->whenLoaded('sub_categories',function(){
                return  SubCategoryResource::collection($this->sub_categories);
            }),
            'created_at'=>formatted_date($this->created_at),
        ];
    }
}

