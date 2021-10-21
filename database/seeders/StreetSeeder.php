<?php

namespace Database\Seeders;

use App\Models\Streets;
use Illuminate\Database\Seeder;

class StreetSeeder extends Seeder
{
    public function run()
    {
        Streets::factory()->count(10)->create();
    }
}
