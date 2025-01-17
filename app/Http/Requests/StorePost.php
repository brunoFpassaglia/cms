<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            //
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'content'=>'required',
            'image'=>'mimes:jpeg,png|nullable',
            'category_id'=>'required',
            'tags.*'=>'exists:tags,id',
        ];
    }
}
