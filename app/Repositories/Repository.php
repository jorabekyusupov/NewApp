<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository
{
    protected Model $model;

    public function query()
    {
        return $this->model->query();
    }

    public function getPaginate($columns = ['*'], $perPage = 10)
    {
        return $this->query()->paginate($perPage, $columns);
    }
    public function findWhere(array $where, $columns = ['*'], $perPage = 10)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
        return $this->model->paginate($perPage, $columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->query()->find($id, $columns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }



}
