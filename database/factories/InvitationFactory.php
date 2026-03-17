<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' =>User::factory(),
            'account_id'=>Account::factory(),
            'email'=>fake()->email(),
            'token'=>Str::random(60),
        ];
    }
}
