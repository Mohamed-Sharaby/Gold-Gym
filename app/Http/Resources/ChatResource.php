<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            'user'=>new SenderResource($this->user),
            'last_update'=>$this->updated_at->toDateTimeString(),
            'last_message'=>new MessageResource($this->messages()->latest()->first()),
        ];
    }
}
