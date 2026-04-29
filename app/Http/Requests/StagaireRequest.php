<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StagaireRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|between:2,50', 
            'prenom' => 'required|between:2,50',
            'email' => 'required|email|unique:login,email', 
            'telephone' => 'required|regex:/^0[6-7][0-9]{8}$/',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
