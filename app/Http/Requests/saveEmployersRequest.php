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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'email' => 'required|unique:employers,email',
            'sexe' => 'required|string|max:255',
            'age' => 'required|integer',
            'contact' => 'required|unique:employers,contact',
            'montant_journalier' => 'required|integer'
        ];
    }
}
