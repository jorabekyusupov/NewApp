<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService extends Service
{
    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function create($data)
    {

    }

    public function getAppleProducts()
    {
       return $this->getQuery()->where('name', 'like', '%a%')->get();
    }
}
