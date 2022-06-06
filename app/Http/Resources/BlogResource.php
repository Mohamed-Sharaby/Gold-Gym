<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => __($this->type),
            'title' => $this->title,
            'body' => strip_tags($this->body),
            'description' => Str::limit(strip_tags($this->body),200),
            'image' => $this->image,
            'photos' => MediaResource::collection($this->getMedia('photos')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
