<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveDepartementsRequest extends FormRequest
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
            'nom_dep' => 'required|unique:departements,nom_dep',
            'responsable_dep' => 'required'
        ];
    }
    public function message(){
        return [
            'nom.required' => 'Le nom du département est obligatoire',
            'nom.required' => 'Le nom  du département existe déjà'
        ];
    }
}
