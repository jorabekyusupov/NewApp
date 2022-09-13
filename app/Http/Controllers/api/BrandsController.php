<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brands;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function __construct(BrandService $service)
    {
        $this->service = $service;
        $this->perPage = 20;
    }

    public function index()
    {
        return $this->service->getPaginate(['*'],$this->perPage);
    }


    public function show($id)
    {
        $model = $this->service->getFind($id);
        if ($model){
            return $this->service->responseWithData('Product found', $model);
        }
        return $this->service->responseWithData('Product not found', [], 404);
    }
    public function store(BrandCreateRequest $brandCreateRequest)
    {
        $model = $this->service->create($brandCreateRequest->validated());
        if ($model){
            return $this->responseWithData(__('response.success'), $model);
        }
        return $this->responseWithMessage('unsuccessful', __('response.unsuccessful'), 400);
    }

    public function update($id, BrandUpdateRequest $brandUpdateRequest)
    {
        $model = $this->service->update($id, $brandUpdateRequest->validated());
        if ($model){
            return $this->responseWithData(__('response.success'), $model);
        }
        return $this->responseWithMessage('unsuccessful', __('response.update_unsuccessful'), 404);
    }

    public function destroy($id)
    {
        $model = $this->service->delete($id);
        if ($model){
            return $this->responseWithMessage('success', __('response.success'));
        }
        return $this->responseWithMessage('unsuccessful', __('response.delete_unsuccessful'), 404);
    }
}
