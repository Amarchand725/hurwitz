<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'PDF' => asset('public/images/books/' . $this->ebook),
            'sample_audio' => $this->sample_audio ? asset('public/images/books/' . $this->sample_audio) : null,
            'prices' => [
                'paper_back' => checkIsset(number_format($this->paper_back_price, 2)),
                'ebook' => checkIsset(number_format($this->ebook_price, 2)),
                'audio_book' => checkIsset(number_format($this->audio_book_price, 2)),
            ],
            'url' =>  isset($this->urls) && !empty($this->urls) && $this->urls->count() > 0 ?  BookUrlResource::collection($this->urls) : null,
            'OrderTypes' => [
                '1' => ['id'=>1,'IsAvailable'=> getTypeStatus($this->id,1), 'title'=>'Amazon'],
                '2' => ['id'=>2,'IsAvailable'=> ($this->ebook)? true:false,'title'=>'E-Book'],
                '3' =>['id'=>3,'IsAvailable'=>($this->paper_back_price)? true:false,'title'=>'Paper Back'],
                '4' =>['id'=>4,'IsAvailable'=> ($this->audio_book_price)? true:false,'title'=>'Audio Book'],
                '5' =>['id'=>5,'IsAvailable'=> getTypeStatus($this->id,5),'title'=>'Google Book'],
                '6' =>['id'=>6,'IsAvailable'=> getTypeStatus($this->id,6),'title'=>'Kindle Book'],
                '7' =>['id'=>7,'IsAvailable'=>  getTypeStatus($this->id,7),'title'=>'Burns & Noble'],
                '8' =>['id'=>8,'IsAvailable'=>   getTypeStatus($this->id,8),'title'=>'LULU'],
            ],
            'audios' => isset($this->audios) && !empty($this->audios) && $this->audios->count() > 0 ?  BookaudioResource::collection($this->audios) : null,
            'images' => [
                'front' => asset('public/images/books/' . $this->front_image),
                'back' => asset('public/images/books/' . $this->back_image),

            ],
            'created_at' => formatted_date($this->created_at),
        ];
    }
}
