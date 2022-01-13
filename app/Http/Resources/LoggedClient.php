<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Subscription;

class LoggedClient extends JsonResource
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
            'token'             => $this->token,
            'phone_number'      => $this->phone_number,
            'firebase_token'    => $this->firebase_token,
            'social_login'      => $this->social_login,
            'subscribed'        => new Subscription($this->Subscribtion)
        ];
    }
}
