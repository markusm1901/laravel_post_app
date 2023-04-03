<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function messages(){
        return[
            'title.required' => 'zapomniales wpisac tytulu',
            'content.required'=>'Content nie moze byc puste',           
        ];
    }
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' =>'required|string|min:5|max:50',
            'content'=>'required|string|',
            // 'author_id'=>'required|exists:users,id',
        ];
    }
}