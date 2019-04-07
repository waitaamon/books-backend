<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'book_id' => $this->book_id,
            'title' => $this->title,
            'is_live' => $this->is_live,
            'order' => $this->order,
            'sub_title' => $this->sub_title,
            'slug' => $this->slug,
            'body' => $this->body,
            'created_at' => $this->created_at
        ];
    }
}
