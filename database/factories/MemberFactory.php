<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('da_DK');

        return [
            'first_name'            => $faker->firstName,
            'last_name'             => $faker->lastName,
            'email'                 => $faker->unique()->safeEmail,
            'phone_number'          => $faker->phoneNumber,
            'type'                  => $faker->randomElement(['primary', 'secondary', 'external']),
            'is_board'              => 0,
            'is_company'            => 0,
            'last_reminder_sent_at' => now(),
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Member $member) {
            # Let's add an address
            $member->address()->save(MemberAddressFactory::new()->make());

            # Now the sub fee
            $numSubscriptions = rand(1, 4);
            $subscriptionState = $member->is_company ? 'company' : $member->type;

            for ($i = 0; $i < $numSubscriptions; $i++) {

                $member->subscriptions()->save(
                    SubscriptionFactory::new()
                        ->$subscriptionState()
                        ->state([
                            'pay_date' => now()->addYears($i),
                            'end_date' => now()->addYears($i + 1),
                        ])
                        ->make()
                );
            }
        });
    }
}
