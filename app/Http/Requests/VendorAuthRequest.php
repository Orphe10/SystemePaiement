<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorAuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:vendors,email',
            'password' => 'required|min:4'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom de la boutique est requis',
            'email.required' => 'Le mail est requis',
            'email.email' => 'Le email n\'est pas correct',
            'email.unique' => 'Ce mail existe déjà dans la table',
            'password.required' => 'Le password est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caracteres',
        ];
    }
}
