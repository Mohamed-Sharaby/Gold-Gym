<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ServiceResource extends JsonResource
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
            'name' => $this->name,
            'body' => strip_tags($this->description),
            'description' => Str::limit(strip_tags($this->description), 200),
            'terms' => strip_tags($this->terms),
            'image' => $this->image,
            'price' => (string)$this->price,
            'discount' => (string)$this->discount ,
            'price_after_discount' => (string)($this->price * $this->discount / 100),
            'photos' => MediaResource::collection(collect()->merge($this->getMedia('photos'))->merge($this->offerImages())),
            'appointments' => AppointmentResource::collection($this->appointments),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
