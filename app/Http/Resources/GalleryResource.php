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
            'uuid' => $this->uuid,
            'url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getFullUrl();
            }),
            'thumbnail' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getUrl('thumbnail');
            }),
            'uploaded_on' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
