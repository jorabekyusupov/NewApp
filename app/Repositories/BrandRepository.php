<?php

namespace App\Repositories;

use App\Models\Brands;

class BrandRepository extends Repository
{
    public function __construct(Brands $brands)
    {
        $this->model = $brands;
    }

}
