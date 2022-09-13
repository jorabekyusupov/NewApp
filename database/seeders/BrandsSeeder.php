<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    public function run()
    {
        Brands::factory()->count(10)->create();
    }
}
