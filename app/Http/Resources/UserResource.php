<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' =>  checkIsset($this->name),
            'email' =>  checkIsset($this->email),
            'phone' =>  checkIsset($this->phone),
            'userdetails' => checkIsset( new UserdetailResource($this->userdetail)),
            'token' => checkIsset($this->remember_token),
            'created_at' => $this->created_at->format('M, j Y H:i A'),
        ];
    }
}
