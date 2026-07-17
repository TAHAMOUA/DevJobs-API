<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOffreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'titre' => 'sometimes|string|max:255',

            'description' => 'sometimes|string',

            'type_contrat' => 'sometimes|in:CDI,CDD,Stage,Freelance',
        ];
    }
}