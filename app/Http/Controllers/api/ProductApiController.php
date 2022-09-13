<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;

class ProductApiController extends Controller
{
    public function __construct(ProductService $service)
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
    public function store(ProductCreateRequest $productCreateRequest)
    {
        $model = $this->service->create($productCreateRequest->validated());
        if ($model){
            return $this->responseWithData(__('response.success'), $model);
        }
        return $this->responseWithMessage('unsuccessful', __('response.unsuccessful'), 400);
    }

    public function update($id, ProductUpdateRequest $productUpdateRequest)
    {
        $model = $this->service->update($id, $productUpdateRequest->validated());
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

    public function getAppleProducts()
    {
        return $this->responseWithData('success', $this->service->getAppleProducts());
    }
}
