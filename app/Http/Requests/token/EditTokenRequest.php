<?php

namespace App\Http\Requests\token;

use Illuminate\Foundation\Http\FormRequest;

class EditTokenRequest extends FormRequest
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
        return [
            'token' => "required|string|min:32|max:32"
        ];
    }
}
