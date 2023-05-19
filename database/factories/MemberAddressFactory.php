<?php

namespace Database\Factories;

use App\Models\MemberAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = MemberAddress::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('da_DK');

        return [
            'member_id'   => null,
            'street_name' => $faker->streetName,
            'zip_code'    => $faker->postcode,
            'city'        => $faker->city,
        ];
    }
}
