<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveEmployersRequest extends FormRequest
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
            'departement_id' => 'required|integer',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'postnom' => 'required|string',
            'email' => 'required|unique:employers,email',
            'sexe' => 'required|string',
            'age' => 'required|integer',
            'contact' => 'required|unique:employers,contact',
            'montant_journalier' => 'required|integer'
        ];
    }

    public function message(){
        return [
            'email.required' => 'l\'email est requis',
            'email.unique' => 'l\'email est unique'
        ];
    }
}
