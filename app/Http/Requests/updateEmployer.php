<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEmployer extends FormRequest
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
            'departement_id' => 'required',
            'nom' => 'required',
            'postnom' => 'required',
            'prenom' => 'required',
            'email' => 'required|unique:employers,email',
            'sexe' => 'required',
            'age' => 'required',
            'contact' => 'required',
            'montant_journalier' => 'required'
        ];
    }
}
