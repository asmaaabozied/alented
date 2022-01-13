<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Language;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header = Language::getLanguage();

        $name = 'name_' . $header;
        return [
            'id'    => $this->id,
            'name'  => $this->$name,
            'image' => url($this->image)
        ];
    }
}
