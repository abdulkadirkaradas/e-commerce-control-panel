<?php

namespace Database\Seeders;

use App\Models\Provinces;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        Provinces::factory()->count(10)->create();
    }
}
