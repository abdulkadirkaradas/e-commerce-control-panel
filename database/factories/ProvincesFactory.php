<?php

namespace Database\Factories;

use Faker;
use App\Models\Model;
use App\Models\Provinces;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvincesFactory extends Factory
{
    protected $model = Provinces::class;

    public function definition()
    {
        return [
            "name" => Str::random(10),
            "zip_code" => rand(10000, 99999),
            "plate_code" => rand(1, 99),
        ];
    }
}
