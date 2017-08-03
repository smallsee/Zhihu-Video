<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title'=> 'required|max:191|unique:videos',
            'thumb'=> 'required|max:191',
            'address'=> 'required|max:191',
            'language'=> 'required|max:191',
            'episodes'=> 'required|max:191',
            'abstract'=> 'required',
            'version'=> 'required|max:191',
            'akira'=> 'required|max:191',
            'topic'=> 'required|max:191',
        ];
    }
}
