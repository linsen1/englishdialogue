<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDialogueVideos extends FormRequest
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

            'video_mp3_url' => 'required',//
            'video_time'=>'required',
            'dialogue_base_id'=>'required',
            'video_englishChinese_words'=>'required'
        ];
    }
}
