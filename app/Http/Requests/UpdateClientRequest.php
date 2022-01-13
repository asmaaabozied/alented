<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateClientRequest extends FormRequest
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
        $rules['email'] .= '|unique:users,email,' . $this->route("client") . ',id,role_id,2';
        $rules['phone_number'] .= '|unique:users,phone_number,' . $this->route("client") . ',id,role_id,2';
        unset($rules['password']);
        unset($rules['image']);
        return $rules;
    }
}
