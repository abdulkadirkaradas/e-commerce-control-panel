<?php

namespace Database\Factories;

use Faker;
use App\Models\Model;
use App\Models\Provinces;
use App\Models\Districts;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictsFactory extends Factory
{
    protected $model = Districts::class;

    public function definition()
    {
        return [
            "name" => Str::random(10),
            "province_id" => Provinces::factory()->create()->id,
        ];
    }
}
