<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AppointmentResource extends JsonResource
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
            'day_name' =>$this->day->format('D'),
            'day_date' => $this->day->format('Y-m-d'),
            'from' => $this->from->format('h:i:s a'),
            'to' => $this->to->format('h:i:s a'),
            'day_status' => $this->day_status,
        ];
    }
}
