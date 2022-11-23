<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaq extends FormRequest
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
     * @return array<string, mixed>
     */

        public function rules()
    {
        return [
            'ask_ar' => 'required|string' ,
            'ask_en'=>'required|string',
            'answer_ar' => 'required|string' ,
            'answer_en'=>'required|string',
        ];
    }


}
