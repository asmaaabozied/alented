<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Packages;

class Subscription extends JsonResource
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
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
            'price'       => $this->price,
            'package'     => new Packages($this->package)
        ];
    }
}
