<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "title"=>"required|min:4|max:30",
            "description"=>"required|min:40|max:800",
            "price"=>"required|numeric"
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere minimo 4 caratteri',
            'title.max' => 'Il titolo deve avere massimo 30 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.min' => 'La descrizione deve avere minimo 40 caratteri',
            'description.max' => 'La descrizione deve avere massimo 800 caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
        ];
    }
}
