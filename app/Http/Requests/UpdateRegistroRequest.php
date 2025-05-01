<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegistroRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:0|max:120',
            'cpf' => 'required|string|max:11|cpf|unique:registros,cpf,' . $this->route('registro'),
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'ensino_medio' => 'boolean',
            'sexo' => 'required|string|in:M,F',
            'salario' => 'required|numeric|min:0',
            'anexo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }
}
