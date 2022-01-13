<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Subscription;

class Client extends JsonResource
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
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'image'             => $this->image != null ? url($this->image) : null,
            'trade_license'     => $this->trade_license != null ? url($this->trade_license) : null,
            'identity_proof'       => $this->identity_proof != null ? url($this->identity_proof) : null,
            'phone_number'      => $this->phone_number,
            'firebase_token'    => $this->firebase_token,
            'social_login'      => $this->social_login,
            'subscribed'        => new Subscription($this->Subscribtion)
        ];
    }
}
