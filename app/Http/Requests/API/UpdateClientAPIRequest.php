<?php

namespace App\Http\Requests\API;

use App\Models\User;
use InfyOm\Generator\Request\APIRequest;
usE Auth;

class UpdateClientAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = User::$client_update_rules;
        $rules['email'] .= '|unique:users,email,' . Auth::user()->id . ',id,role_id,2';
        $rules['phone_number'] .= '|unique:users,phone_number,' . Auth::user()->id . ',id,role_id,2';
        
        return $rules;
    }
}
