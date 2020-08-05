<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "min:3"],
            "email" => ["required", "unique:users", "email"],
            "password" => ["required", "min:6", "confirmed"],
            "university_id" => ["required", "exists:universities"],
        ];
    }
}
