<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Language;

class Product extends JsonResource
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
        $description = "description_" . $header;
        $name   = 'name_' . $header;
        $images=[];
        if($this->image != null)
        {
             array_push($images,url($this->image));
        }
       
        if($this->image2 != null)
        {
            array_push($images,url($this->image2));
        }
         if($this->image3 != null)
        {
            array_push($images,url($this->image3));
        }
         if($this->image4 != null)
        {
            array_push($images,url($this->image4));
        }
         if($this->image5 != null)
        {
            array_push($images,url($this->image5));
        }
        return [
            'id'             => $this->id,
            'title'          => $this->$title,
            'description'    => $this->$description,
            'category_name'  => optional($this->category)->$name,
            'region_name'    => optional($this->region)->$name,
            'status'         => $this->status,
            'image'          => $images,
            'english_pdf'    => $this->english_pdf != null ? url($this->english_pdf) : null,
            'arabic_pdf'     => $this->arabic_pdf != null ? url($this->arabic_pdf) : null,
            'created_at'     => $this->created_at
        ];
    }
}
