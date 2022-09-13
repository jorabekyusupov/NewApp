<?php

namespace App\Services;

use App\Repositories\BrandRepository;

class BrandService extends Service
{
    public function __construct(BrandRepository $brandRepository)
    {
        $this->repository = $brandRepository;
    }
}
