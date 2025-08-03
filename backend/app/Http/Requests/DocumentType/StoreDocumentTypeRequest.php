<?php

namespace App\Http\Requests\DocumentType;

use App\Models\DocumentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDocumentTypeRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('document_types', 'name')->whereNull('deleted_at'), // Ignora los eliminados
            ],
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'El tipo de documento ya está registrado.',
        ];
    }

}
