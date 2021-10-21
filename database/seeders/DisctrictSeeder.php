<?php

namespace Database\Seeders;

use App\Models\Districts;
use Illuminate\Database\Seeder;

class DisctrictSeeder extends Seeder
{
    public function run()
    {
        Districts::factory()->count(10)->create();
    }
}
