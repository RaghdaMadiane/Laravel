<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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


            'title' => ['required',
             'min:3' ,
             'unique:posts,user_id,'],
            'description' => ['required', 'min:10'],
            'user_id' => ['exists:users,id']
        ];
    }
    public function messages()
    {
        return [
            'description.min'=>'please enter a description more than 10 char',
            'title.min' => 'please enter  a title more than 3 char',
        ];
    }
}
