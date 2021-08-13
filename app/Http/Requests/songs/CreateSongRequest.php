<?php

namespace App\Http\Requests\songs;

use Illuminate\Foundation\Http\FormRequest;

class CreateSongRequest extends FormRequest
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
            'author_id' => ['required'],
            'album_id' => ['required'],
            'song_name_en' => ['required','string'],
            'song_name_mm' => ['required','string'],
            'image' => 'required',
            'is_new' => ['required'],
            'is_popular' => ['required'],
        ];
    }
}
