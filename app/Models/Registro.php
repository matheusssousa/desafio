<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Registro extends Model
{
    /** @use HasFactory<\Database\Factories\RegistroFactory> */
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['nome', 'idade', 'cpf', 'cidade', 'estado', 'rua', 'bairro', 'ensino_medio', 'sexo', 'salario', 'anexo'];

    protected $casts = [
        'ensino_medio' => 'boolean',
        'salario' => 'decimal:2',
    ];

    public function scopeSearch(Builder $query, $request)
    {
        if ($request) {
            if (isset($request->status)) {
                if ($request->status === 'Ambos') {
                    $query->withTrashed();
                } elseif ($request->status === 'Excluído') {
                    $query->onlyTrashed();
                }
            }
    
            $query->where(function (Builder $query) use ($request) {
                $query->when($request->nome, fn(Builder $query, $nome) => $query->where('nome', 'like', '%' . $nome . '%'))
                    ->when($request->cpf, fn(Builder $query, $cpf) => $query->orWhere('cpf', 'like', '%' . $cpf . '%'))
                    ->when($request->sexo, fn(Builder $query, $sexo) => $query->orWhere('sexo', $sexo));
            });
        }
    
        return $query;
    }
}
