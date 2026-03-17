<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => Type::factory(),
            'rib'=>'088'.'1234567891234567890'.'24', //088 19digits 24
            'solde'=>fake()->randomNumber(),
            'withdraw_limit'=>2,
            'price_limit'=>10000
        ];
    }
}
