<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Language;

class Packages extends JsonResource
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
        $subscriped = false;

        $user = auth('api')->user();
        if($user != null){
            if($user->Subscribtion != null){
                if($user->Subscribtion->package->id == $this->id){
                    $subscriped = true;
                }
            }
        }

        return [
            'id'                   => $this->id,
            'title'                => $this->$title,
            'duration'             => $this->duration_text,
            'ads_number'           => $this->ads_number,
            'ads_url_number'       => $this->ads_url_number,
            'ad_charater_number'   => $this->ad_charater_number,
            'price'                => $this->price,
            'offer'                => $this->offer,
            'subscriped'           => $subscriped 
        ];
    }
}
