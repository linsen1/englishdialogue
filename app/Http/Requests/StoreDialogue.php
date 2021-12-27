<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class StoreDialogue extends FormRequest
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
            'dialogue_title' => 'bail|required|min:2|max:30',
            'dialogue_pic' => 'required',//
            'dialogue_home_pic' => 'required',//
            'dialogue_order' => 'required',
            'dialogue_sentence_count' => 'required',
            'class_base_id' => 'required'
        ];
    }
}
