<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Language;

class InformativeData extends JsonResource
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

        $attribute = "";
        $content   = "";

        if(isset($this->about_en)){
            $about = "about_" . $header;
            $attribute = "about";
            $content   = $this->$about;
        }

        if(isset($this->our_mission_en)){
            $terms = "our_mission_" . $header;
            $attribute = "our_mission";
            $content   = $this->$terms;
        }

        if(isset($this->privecy_policy_en)){
            $privacy = "privecy_policy_" . $header;
            $attribute = "privecy_policy";
            $content   = $this->$privacy;
        }

        if(isset($this->terms_conditions_en)){
            $terms_conditions = "terms_conditions_" . $header;
            $attribute = "terms_conditions";
            $content   = $this->$terms_conditions;
        }

        if(isset($this->facebook_link)){
            return [
                'instgrem_link'   => $this->instgram_link,
                'whatsapp_link'    => $this->whatsapp_link,
                'facebook_link'   => $this->facebook_link,
                'twitter_link'    => $this->twitter_link
            ];
        }

        if(isset($this->contact_email)){
            return [
                'email'    => $this->contact_email,
                'phone'    => $this->phone_number,
            ];
        }

        return [
            $attribute   => $content,
            'english_pdf'    => $this->english_pdf != null ? url($this->english_pdf) : null,
            'arabic_pdf'     => $this->arabic_pdf != null ? url($this->arabic_pdf) : null
        ];
    }
}
