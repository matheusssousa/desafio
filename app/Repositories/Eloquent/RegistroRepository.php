<?php

namespace App\Repositories\Eloquent;

use App\Models\Registro;
use Illuminate\Support\Facades\Storage;

class RegistroRepository extends BaseRepository
{
    public function __construct(Registro $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes)
    {
        if (isset($attributes['anexo'])) {
            $filePath = $attributes['anexo']->store('anexos');
            $attributes['anexo'] = $filePath;
        }
        return parent::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $registro = $this->model->findOrFail($id);
        if (isset($attributes['anexo'])) {
            if ($registro->anexo) {
                Storage::delete($registro->anexo);
            }
            $filePath = $attributes['anexo']->store('anexos');
            $attributes['anexo'] = $filePath;
        }
        return parent::update($id, $attributes);
    }
}
