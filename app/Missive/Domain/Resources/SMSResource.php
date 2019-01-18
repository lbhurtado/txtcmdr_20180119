<?php

namespace App\Missive\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SMSResource extends JsonResource
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
            'from' => $this->from,
            'to' => $this->to,
            'message' => $this->message,
        ];
    }
}
