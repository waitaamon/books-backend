<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
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
            'title' => $this->title,
            'book' => new BookResource($this->book),
            'url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getFullUrl();
            }),
            'thumb_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getUrl('thumb');
            }),
            'uploaded_on' => $this->created_at
        ];
    }
}
