<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function messages(){
        return[
            'content.required'=>'Content nie moze byc puste',
        ];
    }

    public function rules()
    {
        return [
            'content_comment'=>'required|string|max:50'
        ];
    }
}
