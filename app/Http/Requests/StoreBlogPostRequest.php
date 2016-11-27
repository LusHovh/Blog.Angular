<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreBlogPostRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'image'=> 'required|mimes:jpeg,bmp,gif,png',
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'content.required'  => 'Content is required',
        ];
    }    
    
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}