<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormBlogRequest extends FormRequest
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
            'title' =>'required|max:225',
            'summary' => 'required|max:500',
            'summary_img' => 'mimes:jpg,png|max:10000',
            'content' => 'required',
            'source' => 'required',
            'created' => 'required',
        ];
    }

    public function messages()
    {
        $messages = [
            'title.required' => 'Not empty !',
            'title.max' => 'Please choose wisely !',
            'summary.required' => 'Not empty !',
            'summary.max' => 'Please choose wisely !',
            'summary_img.mimes' => 'Not empty !',
            'summary_img.max' => 'file size is too large !',
            'source.required' => 'Not empty !',
            'created.required' => 'Not empty !',
        ];
        return $messages;
        
    }
}
