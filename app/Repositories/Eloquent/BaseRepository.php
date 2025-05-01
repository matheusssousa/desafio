<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($request = null, $perPage = 15)
    {
        return $this->model->search($request)->paginate($perPage);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $model = $this->getById($id);
        $model->update($attributes);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->getById($id);
        $model->delete();

        return $model;
    }

    public function restore($id)
    {
        $model = $this->model->withTrashed()->findOrFail($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id)
    {
        $model = $this->model->withTrashed()->findOrFail($id);
        $model->forceDelete();

        return $model;
    }
}