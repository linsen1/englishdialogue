<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDialogueWords extends FormRequest
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
            'words_text' => 'bail|required|min:2|max:1000',
            'words_pic' => 'required',//
            'words_audio' => 'required',
            'words_order' => 'required',
            'words_is_translate' => 'required',
            'dialogue_base_id'=>'required'
        ];
    }
}
