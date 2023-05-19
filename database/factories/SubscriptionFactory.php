<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'member_id' => null,
            'amount' => 0,
            'pay_date' => now(),
            'end_date' => now()->addYear(),
        ];
    }

    /**
     * Indicate that the model's amount is for a company.
     */
    public function company(): static
    {
        return $this->state([
            'amount' => 300,
        ]);
    }

    /**
     * Indicate that the model's amount is for primary.
     */
    public function primary(): static
    {
        return $this->state([
            'amount' => 150,
        ]);
    }

    /**
     * Indicate that the model's amount is for others.
     */
    public function secondary(): static
    {
        return $this->state([
            'amount' => 100,
        ]);
    }

    /**
     * Indicate that the model's amount is for others.
     */
    public function external(): static
    {
        return $this->state([
            'amount' => 100,
        ]);
    }
}
