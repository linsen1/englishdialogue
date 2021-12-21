<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditClassBase extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class_name'=>'bail|required|min:2|max:30',
            'class_order'=>'required',
            'class_type'=>'required'
        ];
    }
}
