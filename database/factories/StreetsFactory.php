<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Quarters;
use App\Models\Streets;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StreetsFactory extends Factory
{
    protected $model = Streets::class;

    public function definition()
    {
        return [
            "name" => Str::random(10),
            "quarter_id" => Quarters::factory()->create()->id,
        ];
    }
}
