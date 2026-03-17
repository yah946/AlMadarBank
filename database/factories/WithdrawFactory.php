<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Withdraw>
 */
class WithdrawFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::factory(),
            'user_id' => User::factory(),
            'amount' => fake()->randomFloat(),
        ];
    }
}
