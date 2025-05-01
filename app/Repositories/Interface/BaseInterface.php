<?php

namespace App\Repositories\Interface;

interface BaseInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
    public function restore($id);
    public function forceDelete($id);
}