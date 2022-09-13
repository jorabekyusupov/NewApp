<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class Service
{
    protected object $repository;

    public function responseWithData($message, $data, $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function getConditionPaginate($query, $columns = ['*'], $perPage = 10)
    {
       return $this->repository->findWhere($query, $columns, $perPage);
    }

    public function getPaginate($columns = ['*'], $perPage = 10)
    {
        return $this->repository->getPaginate($columns, $perPage);
    }

    public function getQuery()
    {
        return $this->repository->query();
    }

    public function getFind($id, $columns = ['*'])
    {
        return $this->repository->find($id, $columns);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->getFind($id);
        if ($model){
            return $this->repository->update($id, $data);
        }
        return false;
    }

    public function delete($id)
    {
        $model = $this->getFind($id);
        if ($model){
            return $this->repository->delete($id);
        }
        return false;

    }
}
