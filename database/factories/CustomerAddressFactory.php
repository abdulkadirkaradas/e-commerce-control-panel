<?php

namespace Database\Factories;

use App\Models\CustomerAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;
use Illuminate\Support\Str;

class CustomerAddressFactory extends Factory
{
    protected $model = CustomerAddress::class;

    public function definition()
    {
        return [
            'province' => Str::random(10),
            'district' => Str::random(10),
            'quarter' => Str::random(10),
            'street' => Str::random(10),
        ];
    }
}
