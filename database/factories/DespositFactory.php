<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Desposit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Desposit>
 */
class DespositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'receiver_account_id' => Account::factory(),
            'sender_id' => User::factory(),
            'amount' => fake()->randomFloat(),
        ];
    }
}
