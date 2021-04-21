<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class articleRequest extends FormRequest
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
            'reference' => 'bail|required|between:0,20|string',
            'designation' => 'bail|required|between:0,30|alpha_num',
            'prixunitaire' => 'bail|required|numeric',
            'quantiteenstock' => 'bail|required|numeric'
            
           
        ];
    }
}
