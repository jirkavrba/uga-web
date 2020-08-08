<?php

namespace App\Http\Requests\Universities;

use App\University;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUniversityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "unique:universities,name," . $this->university->id, "string"],
            "color" => ["required", "regex:/^#[0-9A-Fa-f]{6}$/"],
        ];
    }
}
