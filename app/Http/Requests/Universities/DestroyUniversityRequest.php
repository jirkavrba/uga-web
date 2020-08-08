<?php

namespace App\Http\Requests\Universities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DestroyUniversityRequest extends FormRequest
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
            // The target university for transferring users cannot be same as the source
            "university_id" => ["required", "exists:universities,id", "not_in:" . $this->university->id]
        ];
    }
}
