<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroRequest extends FormRequest
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
            'cpf' => 'required|string|max:11|unique:registros,cpf|cpf',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'ensino_medio' => 'boolean',
            'sexo' => 'required|string|in:Masculino,Feminino,Outros',
            'salario' => 'required|numeric|min:0',
            'anexo' => 'required|mimes:pdf,jpg,jpeg,png|max:2048', 
        ];
    }
}
