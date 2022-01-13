<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Language;

class News extends JsonResource
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

        $title  = 'title_' . $header;
        return [
            'id'                   => $this->id,
            'title'                => $this->$title,
            'display_option'       => $this->displayoption_text,
        ];
    }
}
