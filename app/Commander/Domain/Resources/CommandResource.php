<?php

namespace App\Commander\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandResource extends JsonResource
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
            'mobile' => $this->mobile,
            'keyword' => $this->keyword,
            'arguments' => $this->arguments,
        ];
    }
}
