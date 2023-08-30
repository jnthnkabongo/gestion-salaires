<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveAdmins extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Le nom de l\'administrateur est obligatoire',
            'email.required' => 'L\'e-mail est obligatoire',
            'email.unique' => 'Cette adresse e-mail est lié à un compte',
            'email.email' => 'L\'e-mail n\'est pas valide',
        ];
    }
}
