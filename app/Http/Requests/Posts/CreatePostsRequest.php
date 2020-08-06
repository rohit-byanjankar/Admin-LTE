<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePostsRequest extends FormRequest
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
        return [  //gets the data from form's name
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id'=> 'required',
        ];
    }
}
