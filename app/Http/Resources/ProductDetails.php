<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Language;

class ProductDetails extends JsonResource
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
            'user_id'        => $this->user_id,
            'title'          => $this->$title,
            'title_en'       => $this->title_en,
            'title_ar'       => $this->title_ar,
            'description'    => $this->$description,
            'description_en' => $this->description_en,
            'description_ar' => $this->description_ar,
            'category_name'  => optional($this->category)->$name,
            'category_id'    => $this->category_id,
            'region_name'    => optional($this->region)->$name,
            'region_id'      => $this->region_id,
            'status'         => $this->status,
            'images'         => $images,
            'english_pdf'    => $this->english_pdf != null ? url($this->english_pdf) : null,
            'arabic_pdf'     => $this->arabic_pdf != null ? url($this->arabic_pdf) : null,
            'created_at'     =>$this->created_at
        ];
    }
}
