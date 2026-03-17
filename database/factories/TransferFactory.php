<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_account_id' => Account::factory(),
            'receiver_account_id' => Account::factory(),
            // 'sender_id' => User::factory(),
            'amount' => fake()->randomFloat(),
        ];
    }
}
