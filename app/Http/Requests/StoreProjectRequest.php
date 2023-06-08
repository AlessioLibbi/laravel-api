<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:50', Rule::unique('projects')->ignore($this->project)],
            'description' => 'nullable|string',
            'type_id' => ['nullable', 'exists:types,id'],
            'technology_id' => ['nullable', 'exists:thecnology,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Inserisci il titolo per avanzare con le modifiche',
            'title.min' => 'Il titolo deve essere minimo di 3 caratteri',
            'title.max' => 'Il titolo deve essere massimo di 50 caratteri',
            'title.unique' => 'Il titolo deve essere diverso da altri gia esistenti',
        ];
    }
}
