<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('da_DK');

        return [
            'member_id'         => null,
            'name'              => $faker->name,
            'email'             => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password'          => '$2y$10$fW2LcEClTiBNFaLunhwiUeolBu.fdnW5QrOWqteoSDzugg.xCiwCu', // password
            'remember_token'    => Str::random(10),
            'type'              => 'supporter',
        ];
    }

    /**
     * Indicate that the model should be a developer.
     */
    public function developer(): static
    {
        return $this->state([
            'type'  => 'super admin',
            'email' => 'cgs@pairy.dk',
            'name'  => 'Christian Skydt',
            'password' => '$2y$10$C1KMi0X7AQwZHfWEP3RPpuoPL.b.M9NGIGwkR2GJ5q0kp1Er.gPwi'
        ]);
    }

    /**
     * Indicate that the model should be a super admin.
     */
    public function superAdmin(): static
    {
        return $this->state([
            'type' => 'super admin',
        ]);
    }

    /**
     * Indicate that the model should be an admin.
     */
    public function admin(): static
    {
        return $this->state([
            'type' => 'admin',
        ]);
    }

    /**
     * Indicate that the model should be a supporter with member data.
     */
    public function supporter(): static
    {
        return $this->state([
            'type'      => 'supporter',
            'member_id' => function () {
                return Member::factory()->state(['is_company' => false])->create()->id;
            },
        ]);
    }

    /**
     * Indicate that the model should be a supporter with member data.
     */
    public function supporterCompany(): static
    {
        return $this->state([
            'type'      => 'supporter',
            'member_id' => function () {
                return Member::factory()->state(['is_company' => true])->create()->id;
            },
        ]);
    }
}
