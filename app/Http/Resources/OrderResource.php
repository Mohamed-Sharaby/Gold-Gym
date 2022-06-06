<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'service' => new ServiceResource($this->service),
            'appointment' => new AppointmentResource($this->appointment),
            'no_of_persons' => $this->no_of_persons,
            'finished_at' => $this->finished_at,
            'status' => $this->status,
            'price' => (string)$this->price,
            'tax'=>(string)$this->tax,
            'total' => (string)$this->total,
            'discount' => (string)$this->discount,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
