<?php

namespace Database\Seeders;

use App\Models\Quarters;
use Illuminate\Database\Seeder;

class QuarterSeeder extends Seeder
{
    public function run()
    {
        Quarters::factory()->count(10)->create();
    }
}
