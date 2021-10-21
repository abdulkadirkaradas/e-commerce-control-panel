<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Districts;
use App\Models\Quarters;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuartersFactory extends Factory
{
    protected $model = Quarters::class;

    public function definition()
    {
        return [
            "name" => Str::random(10),
            "district_id" => Districts::factory()->create()->id,
        ];
    }
}
