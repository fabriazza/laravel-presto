<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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
            "name"=>"required|min:4|max:20",
            "mail"=>"required|email:rfc",
            "message"=>"required|min:20|max:400"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve avere minimo 4 caratteri',
            'name.max' => 'Il nome deve avere massimo 20 caratteri',
            'message.required' => 'Il messaggio è obbligatorio',
            'message.min' => 'Il messaggio deve avere minimo 20 caratteri',
            'message.max' => 'Il messaggio deve avere massimo 400 caratteri',
            'mail.required' => 'La mail è obbligatoria',
        ];
    }
}
