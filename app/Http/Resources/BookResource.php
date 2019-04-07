<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'slug' => $this->slug,
            'author' => $this->author,
            'publisher' => $this->publisher,
            'description' =>$this->description,
            'featured' =>$this->featured,
            'is_live' => $this->is_live,
            'created_at' => $this->created_at,
            'published_on' => $this->created_at->format('Y-m-d H:i:s'),
            'user' => new UserResource($this->user),
            'language' => new LanguageResource($this->language),
            'topics' => TopicResource::collection($this->topics),
            'genres' => GenreResource::collection($this->genres),
            'chapters' => ChapterResource::collection($this->chapters),
            'image_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getFullUrl();
            }),
            'thumbnail_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getUrl('thumbnail');
            }),
            'banner_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getUrl('banner');
            }),
            'post_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getUrl('post');
            }),
        ];
    }
}
